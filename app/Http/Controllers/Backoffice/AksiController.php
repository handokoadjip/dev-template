<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\AksiRequest;
use App\Models\Aksi;
use App\Models\Grup;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;

class AksiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($menu_id, $grup_id)
    {
        $menu_item = MenuItems::findOrFail($menu_id);
        $grup = Grup::findOrFail($grup_id);

        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'menu_item' => $menu_item,
            'grup' => $grup,
        ];

        return view('backoffice.aksi.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AksiRequest $request)
    {
        $data = $request->all();

        Aksi::create($data);
        return redirect()->route('grup.permissionCreate', $data['grup_id'])->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aksi $aksi, $menu_id, $grup_id)
    {
        $menu_item = MenuItems::findOrFail($menu_id);
        $grup = Grup::findOrFail($grup_id);

        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'grup' => $grup,
            'menu_item' => $menu_item,
            'aksi' => $aksi
        ];

        return view('backoffice.aksi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AksiRequest $request, Aksi $aksi)
    {
        $data = $request->all();

        Aksi::findOrFail($aksi->aksi_id)
            ->update($data);

        return redirect()->route('grup.permissionCreate', $data['grup_id'])->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $grup_id)
    {
        Aksi::destroy($id);

        return redirect()->route('grup.permissionCreate', $grup_id)->with('success', 'Data berhasil dihapus!');
    }
}
