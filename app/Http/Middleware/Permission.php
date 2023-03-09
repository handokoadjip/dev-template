<?php

namespace App\Http\Middleware;

use Closure;
use Harimayco\Menu\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = explode('/', request()->path());
        $routes = collect($url)->filter(function ($route) {
            return !Str::isUuid($route) && !in_array($route, ['create', 'edit']);
        });

        $menu = Menus::where('menu_nama', 'Sidebar')
            ->first()
            ->menuItems()
            ->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)
            ->where('menu_item_tautan', '=', '/' . $routes->implode('/', ','))
            ->get();

        try {
            $action = Menus::where('menu_nama', 'Sidebar')
                ->first()
                ->menuItems()
                ->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)
                ->whereRelation('aksis', 'aksi_tautan', '=', '/' . $routes->implode('/', ','))
                ->first()
                ->aksis
                ->first()
                ->grups
                ->count();
        } catch (\Throwable $th) {
            $action = 0;
        }

        if ($menu && end($url) == 'create' && $menu[0]->grups[0]->pivot->grup_menu_item_tambah == 'tidak') return abort(404);
        if ($menu && end($url) == 'create' && $menu[0]->grups[0]->pivot->grup_menu_item_ubah == 'tidak') return abort(404);
        if ($menu || $action) return $next($request);
        return abort(404);
    }
}
