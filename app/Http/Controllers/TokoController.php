<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class TokoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Toko Pembelian - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('kelola_toko', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //

        Store::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi_toko' => $request->deskripsi,
            'alamat_toko' => $request->alamat,
            'whatsapp' => $request->whatsapp,
        ]);

        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function get_all_store(Request $request)
    {
        if ($request->ajax()) {
            $data = Store::all();
            return datatables()->of($data)
                ->addColumn('action', function (Store $store) {
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
        $toko = Store::find($id);

        // $data = [];

        if ($toko->status_toko == 1) {

            $data = [
                'status_toko' => 0,
            ];

        } else {

            $data = [
                'status_toko' => 1,
            ];
        }

        $toko->update($data);

        return redirect()->back()->with(['success' => 'Status Toko Berhasil Diupdate!']);

    }

    public function delete($id)
    {

        $data = Store::find($id);

        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function update(Request $request)
    {

        $store = Store::findOrFail($request->id);

        $data = [
            'nama_toko' => $request->nama_toko,
            'deskripsi_toko' => $request->deskripsi,
            'alamat_toko' => $request->alamat,
            'whatsapp' => $request->whatsapp,
        ];

        $store->update($data);

        return redirect()->back()->with(['success' => 'Data Toko Berhasil Diupdate!']);

    }

}
