<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Exports\visitorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vistorsController extends Controller
{
    /**
     * Display a listing of the resource.
    
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visitors/index', [
            'title' => 'Patroli Cwf',
            'active' => 'visitor',
            'sub' => 'visitor',
            'page' => 'Visitor / Index'
        ]);
    }

    public function visitorExcel()
    {
        return Excel::download(new visitorExport, 'visitor.xlsx');
    }

    /**
     * Show the form for creating a new resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitors/create', [
            'title' => 'Patroli Cwf',
            'active' => 'visitor',
            'slug' => 'tambah-user',
            'page' => 'Visitor / Create'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $AllDataVisitors = Visitor::find($id);
        return response()->json([
            'status' => 200,
            'Message' => 'succes Bro !',
            'data' => $AllDataVisitors
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function edit(Vistors $visitors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitors $visitors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitors  $visitors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitors $visitors)
    {
        //
    }
    public function masuk(Visitors $visitors)
    {
        return "test";
    }

    public function DataAll(){

        $visitors = Visitor::latest()->get();
        return view('visitors/allDataVisitor', [
            'title' => 'Patroli Cwf',
            'active' => 'visitor',
            'sub' => 'visitor',
            'page' => 'Visitor / All Data',
            'visitors' => $visitors,
        ]);
    }
}
