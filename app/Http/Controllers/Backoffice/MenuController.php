<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get()
        ];

        return view('backoffice.menu.index', compact('data'));
    }
}
