<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'title' => 'Kelola Menu - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('kelola_menu', $data);
    }

    public function get_all_menus(Request $request)
    {

        if ($request->ajax()) {
            $data = Menu::all();
            return datatables()->of($data)
                ->addColumn('action', function (Menu $menu) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

    }

    public function update_status($id)
    {

        // dd($id);

        // $data = [];

        $menu = Menu::where('value', $id)->first();

        if ($menu->status == 1) {

            $data = [
                'status' => 0,
            ];

        } else {

            $data = [
                'status' => 1,
            ];
        }

        Menu::where('value', $id)->update($data);
        // $menu->update($data);

        return redirect()->back();

    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('assets/img/menu'), $imageName);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'gambar' => $imageName,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
        ]);

        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function delete($id)
    {

        $data = Menu::where('value', $id)->first();

        if (file_exists(public_path('assets/img/menu/' . $data->gambar))) {
            unlink(public_path('assets/img/menu/' . $data->gambar));
        }

        Menu::where('value', $id)->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function update(Request $request)
    {

        $menu = Menu::where('value', $request->id)->first();

        $data = [
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
        ];

        if ($request->hasFile('gambar')) {

            if (file_exists(public_path('assets/img/menu/' . $menu->gambar))) {
                unlink(public_path('assets/img/menu/' . $menu->gambar));
            }

            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('assets/img/menu'), $imageName);
            $data['gambar'] = $imageName;
        }

        Menu::where('value', $request->id)->update($data);

        return redirect()->back()->with(['success' => 'Data Menu Berhasil Diupdate!']);

    }

    public function kalkulator_menu()
    {

        $data = [
            'title' => 'Kalkulator Menu - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('kalkulator_menu', $data);
    }

    public function get_all_menu()
    {
        $menus = Menu::where('status', 1)->get(); // Mengambil semua data dari tabel 'whitelists' menggunakan model

        // Menggunakan helper response() untuk mengembalikan data dalam format JSON
        return response()->json($menus);
    }

}
