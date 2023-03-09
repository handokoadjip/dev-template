<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileRequest;
use App\Models\User;
use Harimayco\Menu\Models\Menus;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

        return view('auth.profile', compact('data'));
    }

    public function update(ProfileRequest $request, User $profile)
    {
        $data = $request->all();

        User::findOrFail($profile->pengguna_id)
            ->update($data);

        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }
}
