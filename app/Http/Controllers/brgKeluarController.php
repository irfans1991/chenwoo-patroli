<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brgKeluar;
use App\Models\notaBarang;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\productOutExport;
use Illuminate\Support\Carbon;

class brgKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $nota = notaBarang::latest()
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->get();
        $nota2 = brgKeluar::latest()->get();
        return view('brgKeluar.index', [
            'title' => 'Patroli Cwf',
            'active' => 'brgKeluar',
            'page' => 'create',
            'countNota' => $this->NotaBrangUrut(),
            'nota' => $nota,
            'dataJenisBarang' => Product::latest()->where('deleted_at', null)->get(),
            'dataBrg' => brgKeluar::latest()->paginate(5)
        ]);
    }

    public function NotaBrangUrut(){
        $tgl = date('m-y');
        $notaBarang = notaBarang::select('id')->latest()->count();
        $notaBarang++;
        $rand = "cwf/" . $tgl;
        $noNotaAuto = $rand ."/". sprintf("%05s", $notaBarang);
        return $noNotaAuto;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'product_id' => 'sometimes',
            'nota_barang_id' => 'sometimes',
            'qty' => 'required',
            'unit' => 'sometimes',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 200,
                'errors' => $validator->message()
            ]);
        }else{
            try {
                $createBrgKeluar = brgKeluar::create($request->all());
                $createBrgKeluar->save();
                $response = [
                    'status' => 200,
                    'message' => 'Create Product Succesfully',
                    'data' => $createBrgKeluar,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = brgKeluar::findOrFail($id);
        try {
            $product->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error' . $e->getMessage()
            ]);
        }
    }
    public function productOutExport()
    {
        return Excel::download(new productOutExport, 'barang_keluar.xlsx');
    }
}
