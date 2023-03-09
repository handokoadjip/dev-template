<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = [
            'menus' => Menus::where('menu_nama', 'Sidebar')->first()->items()->whereRelation('grups', 'grup_menu_item_grup_id', '=', Auth::user()->grups[0]->grup_id)->get(),
            'profile' => Auth::user()
        ];

        return view('auth.change-password', compact('data'));
    }

    public function update(ChangePasswordRequest $request)
    {
        $data = $request->all();
        $pengguna = Auth::user();


        if (!Hash::check($request->pengguna_password_lama, $pengguna->pengguna_password)) return redirect()->back()->with('error', "Password Lama tidak valid!");
        if (strcmp($request->pengguna_password_lama, $request->pengguna_password_baru) == 0) return redirect()->back()->with("error", "Password Baru tidak boleh sama dengan Password Lama!");

        User::findOrFail($pengguna->pengguna_id)
            ->update(['pengguna_password' => Hash::make($request->pengguna_password_baru)]);

        return back()->with('success', "Data berhasil diubah!");
    }
}
