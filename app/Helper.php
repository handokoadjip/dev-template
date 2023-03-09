<?php

use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Permission CRUD
 */
function PermissionMenu()
{
    $menu = Menus::where('menu_nama', 'Sidebar')
        ->first()
        ->menuItems()
        ->where('menu_item_tautan', '=', '/' . request()->path())
        ->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)
        ->get();

    return $menu;
}

/**
 * Permission Action Button
 *
 * @param $url
 *
 */
function PermissionAction($permission)
{
    $routesUuid = collect(explode('/', parse_url($permission, PHP_URL_PATH)));
    $routes = $routesUuid->filter(function ($route) {
        return !Str::isUuid($route);
    });

    try {
        $action = Menus::where('menu_nama', 'Sidebar')
            ->first()
            ->menuItems()
            ->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)
            ->whereRelation('aksis', 'aksi_tautan', '=', $routes->implode('/', ','))
            ->first()
            ->aksis
            ->first()
            ->grups
            ->count();
    } catch (\Throwable $th) {
        $action = 0;
    }

    if ($action) return true;
    return false;
}
