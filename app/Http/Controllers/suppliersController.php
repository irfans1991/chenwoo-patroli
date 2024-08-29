<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use App\Exports\SupplierExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class suppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('is_admin');
        return view('/supplier/supplier', [
            'title' => 'Patroli Cwf',
            'active' => 'supplier',
            'suppliers' => Suppliers::latest()->get()
        ]);
    }

    // public function fetchsupplier(){
    //         $supplier = Suppliers::latest()->get();
    //         return response()->json([
    //             'suppliers' => $supplier,
    //         ]);
    // }

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
      $validator = Validator::make($request->all(),[
          'name' => 'required|max:191',
          'from' => 'required|max:191',
          'supplier' => 'required|max:191',
      ]);
      if($validator->fails()){
        return response()->json([
            'status'=>400,
            'errors'=>$validator->messages(),
        ]);
      }
      else
      {
        $supplier = new Suppliers;
        $supplier->name = $request->input('name');
        $supplier->from = $request->input('from');
        $supplier->supplier = $request->input('supplier');
        $supplier->save();
        return response()->json([
            'status'=> 200,
            'message'=> 'Supplier Added Successfully',
        ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $supplier = Suppliers::find($id);
        if($supplier){
            return response()->json([
                'status' => 200,
                'suppliers' => $supplier,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'supplier Not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'from' => 'required|max:191',
            'supplier' => 'required|max:191',
        ]);
        if($validator->fails()){
          return response()->json([
              'status'=>400,
              'errors'=>$validator->messages(),
          ]);
        }else{
          $supplier = Suppliers::find($id);
          if($supplier){
            $supplier->name = $request->input('name');
            $supplier->from = $request->input('from');
            $supplier->supplier = $request->input('supplier');
            $supplier->update();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();
        return response()->json([
            'status'=>200,
            'message'=>'supplier deleted Successfully',
        ]);
    }

    public function SupplierExport()
    {
        return Excel::download(new SupplierExport, 'visitor.xlsx');
    }
}
