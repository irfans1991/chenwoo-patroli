<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Suppliers;
use App\Models\MutasiMasuk;
use Illuminate\Http\Request;

use App\Exports\mutasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class inMutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mutasi = MutasiMasuk::where('type_mutasi', 'Masuk')
        // ->orWhere('type_mutasi', 'Masuk Barang')
        // ->whereDate('created_at', Carbon::today())
        // ->get();

        $mutasi = MutasiMasuk::where(function ($query) {
            $query->where('type_mutasi', 'Masuk')
                  ->orWhere('type_mutasi', 'Masuk Barang');
        })
        ->whereDate('created_at', Carbon::today())
        ->get();

        return view('mutasiMasuk.index',[
            'title' => 'Patroli Cwf',
            'active' => 'mutasi',
            'page' => 'Mutasi / Create',
            'mutasis' => $mutasi,

        ]);
    }

    public function keluar()
    {
        $mutasi = MutasiMasuk::where('type_mutasi', 'Keluar')->whereDate('created_at', Carbon::today())->get();
        return view('mutasiMasuk.mutasiKeluar',[
            'title' => 'Patroli Cwf',
            'active' => 'mutasi',
            'page' => 'Mutasi / Keluar',
            'mutasis' => $mutasi,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Suppliers::all();
        return view('/mutasiMasuk/mutasiCreate',[
            'title' => 'Patroli Cwf',
            'active' => 'mutasi',
            'sub' => 'mutasi',
            'page' => 'Mutasi / Create',
            'suppliers' => $suppliers,
        ]);


    }

    public function createTest($name)
    {
        $suppliers = Suppliers::where('name', $name)->firstOrFail();
        return response()->json([
            'supplier' => $suppliers
        ]);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'security' => 'nullable',
            'type_mutasi' => 'nullable',
            'supplier_name' => 'required',
            'from' => 'required',
            'supplier' => 'required',
            'driver' => 'required|min:3',
            'police' => 'required',
            'total_items' => 'required|numeric',
            'unit' => 'required',
            'travel_permit' => 'required',
            'remark' => 'required',
            'nota' => 'nullable',
        ]);


        MutasiMasuk::create($validateData);
        if($validateData['type_mutasi'] == "Masuk") {
            return redirect('/mutasi')->with('success', 'Create Data Mutasi Masuk, Successfull !');
        }elseif($validateData['type_mutasi'] == "Masuk Barang") {
            return redirect('/mutasi')->with('success', 'Create Data Mutasi Barang Masuk, Successfull !');
        }else{
            return redirect('/allMutasi')->with('success', 'Create Data Mutasi Keluar, Successfull !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mutasi = MutasiMasuk::where('id', $id)->firstOrFail();
        echo $mutasi;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $mutasi = MutasiMasuk::find($id);
      if($mutasi){
        $mutasi->type_mutasi = $request->input('type_mutasi');
        $mutasi->nota = $request->input('nota');
        $mutasi->update();
        return response()->json([
          'status'=> 200,
          'message'=> 'Mutasi Check Out Successfully',
      ]);
    }else{
        return response()->json([
            'status' => 404,
            'message' => 'supplier Not found'
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function TampilData(Request $request, $id)
    {
        $mutasi = MutasiMasuk::find($id);
        return response()->json([
            'mutasis' => $mutasi,
        ]);
    }

    public function mutasiExport()
    {
        return Excel::download(new mutasiExport, 'mutasi.xlsx');
    }

    public function allData(){
        $allDataMutasi = MutasiMasuk::latest()->get();
        return view('mutasiMasuk.allData', [
            'title' => 'Patroli Cwf',
            'active' => 'mutasi',
            'sub' => 'mutasi',
            'page' => 'Mutasi / All data',
            'allData' => $allDataMutasi
        ]);
    }
}
