<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function view()
    {
        $menus = Menu::all();
        return view('SuperAdmin.Menu.index', ['data' => $menus]);
    }

    public function add()
    {
        $menus = Menu::where('type', 'parent')->get();
        return view('SuperAdmin.Menu.create', ['data' => $menus]);
    }

    public function create(Request $request)
    {
        $create = new Menu;
        $create->name = $request->name;
        $create->uri = $request->uri;
        $create->type = $request->type;
        $create->parent_id = $request->parent_id;
        $create->is_active = $request->is_active;

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        if($file == null){
            $nama_file = "";
            $create->icon = $nama_file;
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'menus_icon';
            $file->move($tujuan_upload,$nama_file);
            $create->icon = $nama_file;
        }

        $create->save();
        return redirect(url('/dapur/super/menu'))->with('created','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $menus = Menu::findOrFail($id);
        return view('SuperAdmin.Menu.edit', ['data' => $menus]);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('gambar');

        $menus = Menu::findOrFail($id);

        if($file == null){
            $menus->name = $request->name;
            $menus->uri = $request->uri;
            $menus->is_active = $request->is_active;
            $process = $menus->save();
            if ($process) {
                return redirect(url('/dapur/super/menu'))->with('updated','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'menus_icon';
            $file->move($tujuan_upload,$nama_file);
            $menus->name = $request->name;
            $menus->uri = $request->uri;
            $menus->is_active = $request->is_active;
            $menus->icon = $nama_file;
            $process = $menus->save();
            if ($process) {
                return redirect(url('/dapur/super/menu'))->with('updated','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }

    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        $process = $menu->delete();

        if ($process) {
            return redirect(url('/dapur/super/menu'))->with('deleted','Data Berhasil Dihapus');
        } else {
            return back()->with('warning','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $menus = Menu::findOrFail($id);
        $menus->is_active = $request->is_active;

        $process = $menus->save();
    }
}
