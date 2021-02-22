<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

class UsersController extends Controller
{

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('SuperAdmin.Profile.index', ['data' => $user]);
    }

    public function editprofile($id)
    {
        $user = User::findOrFail($id);
        return view('SuperAdmin.Profile.edit', ['data' => $user]);
    }

    public function updateprofile(Request $request, $id)
    {
        $file = $request->file('gambar');
        $pass = $request->password;

        $user = User::findOrFail($id);

        switch (true) {

            case ($file == null && $pass == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($file == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->password = bcrypt($request->password);

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($pass == null):
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            default:
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->password = bcrypt($request->password);
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/user/'.$id.'/profile'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }
                break;

        }
    }

    public function index()
    {
        return view('SuperAdmin.Settings.index');
    }

    public function view()
    {
        $users = User::all();
        return view('SuperAdmin.Users.index', ['data' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Roles::all();
        return view('SuperAdmin.Users.edit', ['data' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $roles_id = $request->roles_id;
        $file = $request->file('gambar');
        $pass = $request->password;

        $user = User::findOrFail($id);

        switch (true) {

            case ($file == null && $pass == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($file == null):
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            case ($pass == null):
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }

                break;

            default:
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'profile_pictures';
                $file->move($tujuan_upload,$nama_file);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $role = Roles::findOrFail($roles_id);
                $user->syncRoles($role->name);
                $user->roles_id = $roles_id;
                $user->photo = $nama_file;

                $process = $user->save();
                if ($process) {
                    return redirect(url('/dapur/super/view'))->with('updated','Data Berhasil Disimpan');
                } else {
                    return back()->with('error','Data Gagal Disimpan');
                }
                break;

        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $process = $user->delete();

        if ($process) {
            return redirect(url('/dapur/super/view'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('error','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $user = User::findOrFail($id);
        $user->is_active = $request->is_active;

        $process = $user->save();
    }

}
