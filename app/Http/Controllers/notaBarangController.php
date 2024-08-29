<?php

namespace App\Http\Controllers;

use App\Models\brgKeluar;
use App\Models\notaBarang;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\notaBarangRequest;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\notaBarangExport;

class notaBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataNota = notaBarang::latest()->get();
        return view('brgKeluar.data',[
            'title' => 'Patroli CWF',
            'active' => 'notaBarang'
        ], compact('dataNota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checked = notaBarang::where('nota', $request->input('nota'))
        ->exists();
        
        $validator = Validator::make($request->all(),[
            'nota' => 'required',
            'pembeli' => 'required|min:3',
            'jenisPembeli' => 'required',
            'pembuat' => 'sometimes',
            'penimbang' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }elseif ($checked) {
            return response()->json([
              'status' => 503,
              'message' => 'Data sudah ada !'
            ]);
        }else{
                try {
                    $createNota = notaBarang::create($request->all());
                    $createNota->save();
                    $response = [
                        'status' => 200,
                        'message' => 'Create Nota Barang Succesfully',
                        'data' => $createNota,
                    ];
                    return response()->json($response);
                } catch (QueryException $e) {
                    return response()->json([
                        'message' => 'failed'. $e->errorInfo()
                    ]);
                }
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
        $dataNota = notaBarang::findOrFail($id);
        $dataBrgJualan = $dataNota->brgKeluar;
        $hargaNota = $dataNota->dataJenisBarangJualan($id);

        $data = [
            'page' => 'Nota',
            'title' => 'Patroli Cwf',
            'active' => 'notaBarang',
            'dataNota' => $dataNota,
            'dataBrg' => $dataBrgJualan,
            'data3' => $dataNota->dataJenisBarangJualan($id),
            'totalQty' => $this->jumlahQty($dataBrgJualan),
            'totalHarga' => $this->jumlahHargaJual($hargaNota),
            'totalBiaya' => $this->totalHarga($hargaNota)
        ];

        return view('brgKeluar.cetakNota', $data);

    }

    public function jumlahQty($totalqty){
        $totalQty = 0;
        foreach($totalqty as $row){
            $totalQty += $row->qty;
        }
        return $totalQty;
    }

    public function jumlahHargaJual($harga){
        $totalHargaJualan = 0;
        foreach($harga as $row){
            $totalHargaJualan += $row->harga;
        }
        return $totalHargaJualan;
    }

    public function totalHarga($harga){
        $totalBiaya = 0;
        foreach($harga as $row){
            $total= $row->qty*$row->harga;
            $totalBiaya += $total;
        }

        return $totalBiaya;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = notaBarang::findOrFail($id);
        try {
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        } catch (Exception $e) {
            return 'Error' . $e->getMessage();
        }
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
        if ($request->checked_by) {
            $checked = notaBarang::find($id);

            if($checked)
            {
                $checked->checked_by = $request->input('checked_by');
                $checked->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Approve In SuccessFully',
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'Approve Error'
                ]);
            }
        }else{

        $notaBarang = notaBarang::findOrFail($id);
        $validate = $request->validate([
            'disetujui' => 'sometimes',
            'foto' => 'image|file|max:2024'
        ]);

        $validate['foto'] = $request->file('foto')->store('photo');
        $notaBarang->update($validate);

        return redirect('/notaBarang')->with('success', 'Validate Nota '. $notaBarang->nota .', Successfull !');
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
        
    }

    public function cetakNota($id){
        $dataNota = notaBarang::findOrFail($id);
        $dataBrgJualan = $dataNota->brgKeluar;
        $hargaNota = $dataNota->dataJenisBarangJualan($id);
        $data = [
            'page' => 'tester',
            'title' => 'tester',
            'active' => 'tester',
            'dataNota' => $dataNota,
            'dataBrg' => $dataBrgJualan,
            'data3' => $dataNota->dataJenisBarangJualan($id),
            'totalQty' => $this->jumlahQty($dataBrgJualan),
            'totalHarga' => $this->jumlahHargaJual($hargaNota),
            'totalBiaya' => $this->totalHarga($hargaNota)
        ];
        return view('brgKeluar.cetakNotaPdf', $data);
    }

    public function checked(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'checked_by' => 'sometimes',
        ]);
        if($validator->fails()){
          return response()->json([
              'status'=>400,
              'errors'=>$validator->messages(),
          ]);
        }else{
          $checked = notaBarang::find($id);
          if($checked){
            $checked->checked_by = $request->input('checked_by');  
            $checked->update();
            return response()->json([
              'status'=> 200,
              'message'=> 'Supplier Update Successfully',
          ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'supplier Not found'
            ]);
        }
          
        }
    }

    public function notaBarangExport()
    {
        return Excel::download(new notaBarangExport, 'nota-barang.xlsx');
    }
}
