<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function view()
    {
        $roles = Roles::all();
        return view('SuperAdmin.Roles.index', ['data' => $roles]);
    }

    public function add()
    {
        return view('SuperAdmin.Roles.create');
    }

    public function create(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect(url('/dapur/super/roles'))->with('created','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $roles = Roles::findOrFail($id);
        return view('SuperAdmin.Roles.edit', ['data' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $role = Roles::findOrFail($id);
        $role->name = $request->name;
        $process = $role->save();

        if ($process) {
            return redirect(url('/dapur/super/roles'))->with('updated','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function delete($id)
    {
        $role = Roles::find($id);
        $process = $role->delete();

        if ($process) {
            return redirect(url('/dapur/super/roles'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('warning','Data Gagal Dihapus');
        }
    }

}
