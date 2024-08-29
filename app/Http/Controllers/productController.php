<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Exports\productExport;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'title' => 'Patroli Cwf',
            'active' => 'product',
            'data' => Product::latest()
            ->where('deleted_at', null)
            ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'jenisBarang' => 'required',
            'harga' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            try {
                $createProduct = Product::create($request->all());
                $createProduct->save();
                $response = [
                    'status' => 200,
                    'message' => 'Create New Product Succesfully',
                    'data' => $createProduct,
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
        // $product = Product::findOrFail($id);
        // try {
        //     $product->delete();
        //     return response()->json([
        //         'status' => 200,
        //         'message' => 'Product deleted successfully'
        //     ]);
        // } catch (Exception $e) {
        //     return response()->json([
        //         'message' => 'Error' . $e->getMessage()
        //     ]);
        // }

        $product = Product::findOrFail($id);
        try {
            $product->deleted_at = date('Y-m-d H:i:s');
            $product->deleted_by = auth()->user()->name;
            $product->update();
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

    public function productExport()
    {
        return Excel::download(new productExport, 'product.xlsx');
    }
}
