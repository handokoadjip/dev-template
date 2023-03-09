<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\PenggunaRequest;
use App\Models\Grup;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('grups')->select('pengguna_id', 'pengguna_nik', 'pengguna_nama', 'pengguna_email', 'pengguna_telp')
                ->where('pengguna_id', '<>', '1d711ed8-2873-4e45-b57c-2e9ce87bb50a');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = "<div class='text-center'>";
                    if (PermissionAction(route('pengguna.show', $data->pengguna_id))) $btn .= "<a class='btn btn-sm btn-info text-white w-100 mb-1 waitme' href='" . route('pengguna.show', $data->pengguna_id) . "'><i class='fas fa-eye'></i></a>";
                    if (PermissionMenu()[0]->grups[0]->pivot->grup_menu_item_ubah == 'ya') $btn .= "<a class='btn btn-sm btn-primary w-100 mb-1 waitme' href='" . route('pengguna.edit', $data->pengguna_id) . "'><i class='fas fa-edit'></i></a>";
                    if (PermissionMenu()[0]->grups[0]->pivot->grup_menu_item_hapus == 'ya') $btn .= "<button type='submit' class='btn btn-sm btn-danger w-100 mb-1 destroy' id='" . route('pengguna.destroy', $data->pengguna_id) . "'><i class='fa fa-trash destroy' id='" . route('pengguna.destroy', $data->pengguna_id) . "'></i></button>";
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

        return view('backoffice.pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'grups' => Grup::where('grup_id', '<>', '854272fd-b56f-483e-b089-ecfce38a8b4b')->pluck('grup_nama', 'grup_id'),
            'unitKerjas' => UnitKerja::pluck('unit_kerja_nama', 'unit_kerja_id'),
            'penggunaUnitKerjas' =>  @UnitKerja::all() ?? []
        ];

        return view('backoffice.pengguna.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaRequest $request)
    {
        $data = $request->all();
        $data['pengguna_password'] = Hash::make($data['pengguna_password']);

        $pengguna = User::create($data);

        $dataUnitKerja = [];
        foreach (@$request->pengguna_unit_kerja ?? [] as $key => $pengguna_unit_kerja) {
            $dataUnitKerja[$pengguna_unit_kerja] = [
                'pengguna_unit_kerja_id' => Str::uuid(),
                'pengguna_unit_kerja_pengguna_id' => $pengguna->pengguna_id,
            ];
        }

        $pengguna->grups()->sync([$data['grup_id'] => ['pengguna_grup_id' => Str::uuid()]]);
        $pengguna->unitKerjas()->sync($dataUnitKerja);

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'pengguna' => $pengguna,
        ];

        return view('backoffice.pengguna.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'grups' => Grup::where('grup_id', '<>', '854272fd-b56f-483e-b089-ecfce38a8b4b')->pluck('grup_nama', 'grup_id'),
            'unitKerjas' => UnitKerja::pluck('unit_kerja_nama', 'unit_kerja_id'),
            'penggunaUnitKerjas' =>  @UnitKerja::all() ?? [],
            'pengguna' => $pengguna,
        ];

        return view('backoffice.pengguna.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaRequest $request, User $pengguna)
    {
        $data = $request->all();
        $data['pengguna_password'] = Hash::make($data['pengguna_password']);
        if ($data['pengguna_password'] == '') unset($data['pengguna_password']);

        $pengguna = User::findOrFail($pengguna->pengguna_id);
        $pengguna->update($data);

        $dataUnitKerja = [];
        foreach (@$request->pengguna_unit_kerja ?? [] as $key => $pengguna_unit_kerja) {
            $dataUnitKerja[$pengguna_unit_kerja] = [
                'pengguna_unit_kerja_id' => Str::uuid(),
                'pengguna_unit_kerja_pengguna_id' => $pengguna->pengguna_id,
            ];
        }

        $pengguna->grups()->sync([$data['grup_id'] => ['pengguna_grup_id' => Str::uuid()]]);
        $pengguna->unitKerjas()->sync($dataUnitKerja);

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
