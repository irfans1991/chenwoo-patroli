<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Container;
use Illuminate\Http\Request;
use App\Exports\ContainerExport;
use Maatwebsite\Excel\Facades\Excel;

class containerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $container = Container::where('status_container', 'Masuk')->latest()->get();
        return view('container.index', [
            'title' => 'Patroli Cwf',
            'active' => 'container',
            'page' => 'Container / Index',
            'containers' => $container,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.create', [
            'title' => 'Patroli Cwf',
            'active' => 'container',
            'sub' => 'container',
            'page' => 'Container / Create',
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

        // dd($request);
        $validateData = $request->validate([
           'security' => 'nullable',
           'driver' => 'required',
           'police' => 'required',
           'status_container' => 'nullable',
           'company' => 'required',
           'no_container' => 'required',
           'no_seal' => 'required',
           'type_container' => 'required',
           'destination' => 'required',
           'volume' => 'required',
           'position' => 'required',
           'before_temperature' => 'required',
           'after_temperature' => 'nullable',
           'photo' => 'image|file|max:2024',
        ]);

        $validateData['photo'] = $request->file('photo')->store('photo');
        Container::create($validateData);
        // dd($validateData);
        return redirect('/kontainer')->with('success', 'Create data Container Check In, Successfull !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $container = Container::find($id);
        return response()->json([
            'containers' => $container,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container = Container::where('id', $id)->firstOrFail();
        return response()->json([
            'containers' => $container,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $container = Container::find($id);
        if($container)
        {
            $container->status_container = $request->input('status_container');
            $container->after_temperature = $request->input('after_temperature');
            $container->no_seal = $request->input('no_seal');
            $container->update();
            return response()->json([
                'status' => 200,
                'message' => 'Container Check Out Successfully',
            ]);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'Container Check Out Not Found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy(Container $container)
    {
        //
    }

    public function containerExport()
    {
        return Excel::download(new ContainerExport, 'container.xlsx');
    }
}
