<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\UnitKerjaRequest;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use DataTables;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UnitKerja::select('unit_kerja_id', 'unit_kerja_nama', 'unit_kerja_deskripsi');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = "<div class='text-center'>";
                    if (PermissionMenu()[0]->grups[0]->pivot->grup_menu_item_ubah == 'ya') $btn .= "<a class='btn btn-sm btn-primary w-100 mb-1 waitme' href='" . route('unit-kerja.edit', $data->unit_kerja_id) . "'><i class='fas fa-edit'></i></a>";
                    if (PermissionMenu()[0]->grups[0]->pivot->grup_menu_item_hapus == 'ya') $btn .= "<button type='submit' class='btn btn-sm btn-danger w-100 mb-1 destroy' id='" . route('unit-kerja.destroy', $data->unit_kerja_id) . "'><i class='fa fa-trash destroy' id='" . route('unit-kerja.destroy', $data->unit_kerja_id) . "'></i></button>";
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

        return view('backoffice.unit_kerja.index', compact('data'));
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

        return view('backoffice.unit_kerja.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitKerjaRequest $request)
    {
        $data = $request->all();

        UnitKerja::create($data);
        return redirect()->route('unit-kerja.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitKerja $unit_kerja)
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'unit_kerja' => $unit_kerja
        ];

        return view('backoffice.unit_kerja.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitKerjaRequest $request, UnitKerja $unit_kerja)
    {
        $data = $request->all();

        UnitKerja::findOrFail($unit_kerja->unit_kerja_id)
            ->update($data);

        return redirect()->route('unit-kerja.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UnitKerja::destroy($id);

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
