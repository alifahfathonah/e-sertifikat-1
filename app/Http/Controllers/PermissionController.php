<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissions;
use Spatie\Permission\Models\Permission;
use App\Models\Roles;
use Spatie\Permission\Models\Role;
use App\Models\Menu;
use App\Models\RoleToPermission;
use Illuminate\Support\Str;


class PermissionController extends Controller
{
    public function view()
    {
        $permissions = Permission::all();
        
        foreach ($permissions as $data) {
            $permissions_name[] = Str::before($data->name, ':');
            $permission_name = array_unique($permissions_name);
        }

        $role = Roles::all();
        $roles = $role->intersect(Roles::whereIn('name', $permission_name)->get());        
        
        return view('SuperAdmin.Permission.index', ['permis' => $permissions, 'rol' => $roles]);
    }

    public function add()
    {
        $menus = Menu::all();
        $roles = Roles::all();
        return view('SuperAdmin.Permission.create', ['data' => $menus, 'role' => $roles]);
    }

    public function create(Request $request)
    {
        $role = Role::findOrFail($request->role_id);

        foreach($request->permission as $data)
        {
            $get_menu = Str::between($data, '/', '/');
            $menu_id = Menu::where('name', $get_menu)->first();
            Permission::create([
                'name' => $role->name.':'.$data,
                'menu_id' => $menu_id->id
            ]);
        }

        foreach($request->permission as $data)
        {
            $role->givePermissionTo($role->name.':'.$data);
        }

        return redirect(url('/dapur/super/permission'))->with('created','Data Berhasil Disimpan');
    }

    public function show($id)
    {
        $roles = Roles::findOrFail($id);

        $get_permission_id = RoleToPermission::where('role_id', $id)->get();
        foreach ($get_permission_id as $g) {
            $permission_id[] = $g->permission_id;
        }

        $permissions = Permissions::find($permission_id);
        foreach ($permissions as $p) {
            $get_menu_id[] = $p->menu_id;
        }
        $menu_id = array_unique($get_menu_id);

        $menus = Menu::all();

        return view('SuperAdmin.Permission.view', ['data' => $menus, 'value' => $permissions, 'role' => $roles]);
    }

    public function edit($id)
    {
        $roles = Roles::findOrFail($id);

        $menus = Menu::all();
        return view('SuperAdmin.Permission.edit', ['data' => $menus, 'role' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $get_permission_id = RoleToPermission::where('role_id', $id)->get();

        foreach($get_permission_id as $data)
        {
            $permission_id[] = $data->permission_id;
        }

        $permission_replace = Permissions::destroy($permission_id);

        foreach($request->permission as $data)
        {
            $get_menu = Str::between($data, '/', '/');
            $menu_id = Menu::where('name', $get_menu)->first();
            Permission::create([
                'name' => $role->name.':'.$data,
                'menu_id' => $menu_id->id
            ]);
        }

        foreach($request->permission as $data)
        {
            $role->givePermissionTo($role->name.':'.$data);
        }

        return redirect(url('/dapur/super/permission'))->with('updated','Data Berhasil Disimpan');
        
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $get_permission_id = RoleToPermission::where('role_id', $id)->get();

        foreach($get_permission_id as $data)
        {
            $permission_id[] = $data->permission_id;
        }

        $permission_delete = Permissions::destroy($permission_id);

        if ($permission_delete) {
            return redirect(url('/dapur/super/permission'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('warning','Data Gagal Dihapus');
        }
    }
}
