<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Exports\TransportExport;
use Maatwebsite\Excel\Facades\Excel;

class transportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transport = Transportation::where('status', 'Keluar')->latest()->get();
        $transportPlat = Transportation::latest()->get();
        $pecahkan = explode(" ", $transportPlat);
        foreach($pecahkan as $row){
            // echo $row->transport;
        }
        return view('transport.index',[
            'title' => 'Patroli Cwf',
            'active' => 'kendaraan',
            'page' => 'Transport / Index',
            'kendaraan' => $transport,
            'plat' => $row

            // 'emisi' => $this->perhitunganEmisi()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transport.create', [
            'title' => 'Patroli Cwf',
            'active' => 'kendaraan',
            'page' => 'Transport / Create',
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
                'security' => 'sometimes',
                'transport' => 'required',
                'name' => 'required|min:5',
                'driver' => 'required:min:5',
                'condition' => 'sometimes',
                'destination' => 'required',
                'before_speedometer' => 'required|numeric',
                'status' => 'sometimes',
                'after_speedometer' => 'nullable',
                'fuel' => 'nullable',
            ]);


        Transportation::create($validateData);
        return redirect('/kendaraan')->with('success', 'Data Transport has been added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transport = Transportation::find($id);
        return response()->json([
            'edit' => $transport
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transport = Transportation::find($id);
        if($transport)
        {
            $transport->status = $request->input('status');
            $transport->after_speedometer = $request->input('after_speedometer');
            $transport->fuel = $request->input('fuel');
            $transport->update();
            return response()->json([
                'status' => 200,
                'message' => 'Kendaraan Check In Succesfully',

            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'kendaraan Not Found!'

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportation $transportation)
    {
        //
    }

    // public function perhitunganEmisi()
    // {
    //     $transportation = Transportation::latest()->get();
    //     while($emisi = mysqli)
    //     {
    //        return $emisi['after_speedometer'] += 0.2;
    //     }
    // }

    public function transportExcel()
    {
        return Excel::download(new TransportExport, 'trasnport.xlsx');
    }
}
