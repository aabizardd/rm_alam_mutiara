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

    public function store(Request $request)
    {
        //
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

        if (file_exists(public_path('assets/img/bahan/' . $data->avatar))) {
            unlink(public_path('assets/img/bahan/' . $data->avatar));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

}
