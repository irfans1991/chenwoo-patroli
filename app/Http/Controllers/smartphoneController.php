<?php

namespace App\Http\Controllers;

use App\Models\Smartphone;
use App\Models\StorePhone;
use Illuminate\Http\Request;
use App\Exports\storedExport;
use App\Exports\SmartphoneExport;
use Maatwebsite\Excel\Facades\Excel;

class smartphoneController extends Controller
{
    public function index()
    {
        $stored = StorePhone::where('status', 'store')->latest()->get();
        return view('smartphone.create', [
            'title' => 'Patroli Cwf',
            'active' => 'smartphone',
            'sub' => 'visitor',
            'page' => 'Smartphone / Stored',
            'stored' => $stored,
        ]);
    }

    public function getData($idPhone)
    {
        $smartphone = Smartphone::where('id_phone', 'like', '%' . $idPhone . '%')->firstOrFail();
        // return json_encode($smartphone);
        return response()->json([
            'fills' => $smartphone,
        ]);
        echo $smartphone;
    }

    public function stored(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'id_phone' => 'required',
            'name' => 'required',
            'section' => 'required',
            'smartphone' => 'required',
            'number' => 'required',
            'status' => 'sometimes'
        ]);

        StorePhone::create($validateData);
        return redirect('/stored')->with('success', 'Stored Smartphone, Successfull !');


    }

    public function edit($id)
    {
        $phoneId = StorePhone::find($id);
        return response()->json([
            'status' => '200',
            'phones' => $phoneId,
        ]);
    }

    public function destroy($id)
    {

        StorePhone::destroy($id);
        return redirect('/stored')->with('success', 'Store Phone Has Beeen Delete !');
    }

    public function update(Request $request, $id)
    {
        $storePhone = StorePhone::find($id);
        if($storePhone){
            $storePhone->status = $request->input('status');
            $storePhone->update();
            return response()->json([
              'status'=> 200,
              'message'=> 'The Smartphone Has Been Taked !',
          ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'The Smartphone not found'
            ]);
        }
    }

    public function smartphoneExcel()
    {
        return Excel::download(new SmartphoneExport, 'smartphone.xlsx');
    }

    public function storedExport()
    {
        return Excel::download(new storedExport, 'Data_Stored.xlsx');

    }
}
