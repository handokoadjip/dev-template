<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\GrupRequest;
use App\Models\Grup;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use DataTables;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Grup::select('grup_id', 'grup_nama', 'grup_deskripsi');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = "<div class='text-center'>";
                    if ($data->grup_id <> 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f') {
                        if (PermissionMenu()[0]->grups[0]->pivot->grup_menu_item_ubah == 'ya') $btn .= "<a class='btn btn-sm btn-primary w-100 mb-1 waitme' href='" . route('grup.edit', $data->grup_id) . "'><i class='fas fa-edit'></i></a>";
                        if (PermissionMenu()[0]->grups[0]->pivot->grup_menu_item_hapus == 'ya') $btn .= "<button type='button' class='btn btn-sm btn-danger w-100 mb-1 destroy' id='" . route('grup.destroy', $data->grup_id) . "'><i class='fa fa-trash destroy' id='" . route('grup.destroy', $data->grup_id) . "'></i></button>";
                    }
                    if (PermissionAction(route('grup.permissionCreate', $data->grup_id))) $btn .= "<a class='btn btn-sm btn-success w-100 mb-1 waitme' href='" . route('grup.permissionCreate', $data->grup_id) . "'>Hak Akses</a>";
                    if ($btn == "<div class='text-center'>") $btn .= '-';
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get()
        ];

        return view('backoffice.grup.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get()
        ];

        return view('backoffice.grup.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupRequest $request)
    {
        $data = $request->all();

        Grup::create($data);
        return redirect()->route('grup.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grup $grup)
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'grup' => $grup
        ];

        return view('backoffice.grup.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupRequest $request, Grup $grup)
    {
        $data = $request->all();

        Grup::findOrFail($grup->grup_id)
            ->update($data);

        return redirect()->route('grup.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grup::destroy($id);

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permissionCreate(Grup $grup)
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'grup' => $grup,
            'grupMenuItems' =>  @Menus::where('menu_nama', 'Sidebar')->first()->menuItems ?? [],
            'grupUnitKerjas' =>  @UnitKerja::all() ?? []
        ];

        return view('backoffice.grup.permission', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function permissionSync(Request $request, Grup $grup)
    {
        $dataMenu = [];
        $dataAksi = [];
        $dataUnitKerja = [];
        foreach (@$request->grup_menu_item ?? [] as $key => $grup_menu_item) {
            $dataMenu[$grup_menu_item] = [
                'grup_menu_item_id' => Str::uuid(),
                'grup_menu_item_tambah' => @$request->grup_menu_crud[(int)$key]['tambah'] ?? 'tidak',
                'grup_menu_item_ubah' => @$request->grup_menu_crud[(int)$key]['ubah'] ?? 'tidak',
                'grup_menu_item_hapus' => @$request->grup_menu_crud[(int)$key]['hapus'] ?? 'tidak',
            ];
        }

        foreach (@$request->grup_aksi ?? [] as $key => $grup_aksi) {
            $dataAksi[$grup_aksi] = [
                'grup_aksi_id' => Str::uuid(),
                'grup_aksi_grup_id' => $grup->grup_id,
            ];
        }

        // foreach (@$request->grup_unit_kerja ?? [] as $key => $grup_unit_kerja) {
        //     $dataUnitKerja[$grup_unit_kerja] = [
        //         'grup_unit_kerja_id' => Str::uuid(),
        //         'grup_unit_kerja_grup_id' => $grup->grup_id,
        //     ];
        // }

        $grup = Grup::findOrFail($grup->grup_id);
        $grup->menuItems()->sync($dataMenu);
        $grup->aksis()->sync($dataAksi);
        $grup->unitKerjas()->sync($dataUnitKerja);

        return redirect()->route('grup.permissionCreate', $grup->grup_id)->with('success', 'Data berhasil ditambahkan!');
    }
}
