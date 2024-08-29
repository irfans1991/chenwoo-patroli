<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Pusher\Pusher;
use ElephantIO\Client;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Events\NotifPermission;
use App\Exports\PermissionExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use ElephantIO\Engine\SocketIO\Version2X;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = permission::where('status', 'Keluar')->whereDate('created_at', Carbon::today())->get();
        return view('permission.index', [
            'title' => 'Patroli Cwf',
            'active' => 'document',
            'page' => 'Document / Create',
            'permissions' => $permission,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create', [
            'title' => 'Patroli Cwf',
            'active' => 'permisson',
            'page' => 'Izin Karyawan / Create',
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
            'needs' => 'sometimes',
            'name' => 'required|min:5',
            'section' => 'nullable',
            'remark' => 'required:min:5',
            'status' => 'sometimes',
            'security' => 'nullable',
            'hrd' => 'sometimes',
        ]);

        try {
                $client = new client(new Version2X('http://localhost:3000'));

                $data = [
                        'message' => 'success',
                        'permission' => $validateData
                    ];

                    $client->initialize();
                    $client->emit('permissionData', $data);
                    $client->close();

                }catch(Exception $e){
                        dd($e->getMessage());
                    }
        $checked = permission::create($validateData);
        // ddd($checked);
        return redirect('/permission')->with('success', 'Data Izin Karyawan Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $detail = Permission::find($id);
        return response()->json([
            'details' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Permission::where('id', $id)->firstOrFail();
        return response()->json([
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ddd($request);

        if($request->status === "Masuk"){
            $permission = Permission::find($id);

            if($permission)
            {
                $permission->status = $request->input('status');
                $permission->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Check In SuccessFully',
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'Container Check Out Not Found'
                ]);
            }
        }elseif($request->departement){
            $permission = Permission::find($id);

            if($permission)
            {
                $permission->departement = $request->input('departement');
                $permission->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'HEad Of Departement Validated SuccessFully',
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'Validated Error'
                ]);
            }
        }else{
            $permission = Permission::find($id);
            if($permission)
            {
                $permission->security = $request->input('security');
                $permission->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Validate By Security SuccessFully',
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'Container Check Out Not Found'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return response()->json([
            'status'=>200,
            'message'=>'supplier deleted Successfully',
        ]);
    }

    public function permissionExport()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }


}
