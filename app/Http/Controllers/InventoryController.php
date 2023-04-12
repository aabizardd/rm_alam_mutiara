<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use DataTables;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

        $data = [
            'title' => 'Kelola Inventori - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('kelola_inventori', $data);
    }

    public function get_all_inventories(Request $request)
    {

        if ($request->ajax()) {
            $data = Inventory::all();
            return datatables()->of($data)
                ->addColumn('action', function (Inventory $inventory) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

    }

    public function store(Request $req)
    {
        // $validator = Validator::make($req->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'unique:users'],
        //     'role' => ['required', 'string'],
        //     'password' => ['required', 'string'],
        //     'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        // ]);

        // // dd($req->name);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $imageName = time() . '.' . $req->gambar_bahan->extension();
        $req->gambar_bahan->move(public_path('assets/img/bahan'), $imageName);

        Inventory::create([
            'nama_bahan' => $req->nama_barang,
            'gambar_bahan' => $imageName,
            'stok_bahan' => $req->stok,
            'satuan_bahan' => $req->satuan_bahan,
        ]);

        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function update_status($id)
    {

        // dd($id);
        $inventory = Inventory::find($id);

        // $data = [];

        if ($inventory->status_bahan == 1) {

            $data = [
                'status_bahan' => 0,
            ];

        } else {

            $data = [
                'status_bahan' => 1,
            ];
        }

        $inventory->update($data);

        return redirect()->back()->with(['success' => 'Status Inventori Berhasil Diupdate!']);

    }

    public function delete($id)
    {

        $data = Inventory::find($id);

        if (file_exists(public_path('assets/img/bahan/' . $data->gambar_bahan))) {
            unlink(public_path('assets/img/bahan/' . $data->gambar_bahan));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function update(Request $request)
    {

        $inventory = Inventory::findOrFail($request->id);

        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => 'required|unique:users,username,' . $user->id,
        //     'role' => 'required|string',
        //     'password' => ['nullable', 'string', 'min:8'],
        //     'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        // ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $data = [
            'nama_bahan' => $request->nama_barang,
            'stok_bahan' => $request->stok,
            'satuan_bahan' => $request->satuan_bahan,
        ];

        if ($request->hasFile('gambar_bahan')) {

            if (file_exists(public_path('assets/img/bahan/' . $inventory->gambar_bahan))) {
                unlink(public_path('assets/img/bahan/' . $inventory->gambar_bahan));
            }

            $imageName = time() . '.' . $request->gambar_bahan->extension();
            $request->gambar_bahan->move(public_path('assets/img/bahan'), $imageName);
            $data['gambar_bahan'] = $imageName;
        }

        $inventory->update($data);

        return redirect()->back()->with(['success' => 'Data Bahan Baku Berhasil Diupdate!']);

    }

}
