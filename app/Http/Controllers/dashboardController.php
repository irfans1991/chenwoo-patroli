<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\models\User;
use App\Models\Message;
use App\Models\Visitor;
use App\Models\Container;
use App\Models\Document;
use App\Models\Suppliers;
use App\Models\inMutation;
use App\Models\Permission;
use App\Models\MutasiMasuk;
use App\Models\StorePhone;
use Illuminate\Http\Request;
use App\Models\Transportation;

class dashboardController extends Controller
{
    
    // private $visitor_time;

    public function index(){
        // $dashboard = Message::where('feedback', Null)->whereDate('created_at', Carbon::now('m'))->get();
        $dashboard = Message::where('feedback', Null)->whereDate('created_at', Carbon::today())->get();
        $containerMontly = Container::whereDate('created_at', Carbon::now('m'))->get();
        $containers = Container::whereIn('status_container', ['Masuk', 'Keluar'])->whereMonth('created_at',Carbon::today()->month)->get();
        return view('dashboard/index',[
            'title' => 'Patroli Cwf',
            'active' => 'dashboard',
            'users' => User::latest()->limit(1)->get(),
            'container' => $containerMontly,
            'containers' => $containers,
            'persen' => $this->persenContainer(),
            'visitors' => $this->totalVisit(),
            'visitor_time' => $this->diffVisit(),
            'dashboard' => $dashboard,
            'supplier' => $this->supplier(),
            'supplierIkan' => $this->supplierIkan(),
            'barangMasuk' => $this->barangMasuk(),
            'izin' => $this->izinKaryawan(),
            'kendaraan' => $this->kendaraan(),
            'StorePhone' => $this->SmartphoneStored(),
            'docs' => $this->Documents()
        ]);
    }

    public function diffVisit()
    {
       $diff_visit = Visitor::latest()->limit(1)->get();
        foreach($diff_visit as $row)
        {
            return $row->created_at->diffForHumans();
        }
    }

    public function totalVisit()
    {
        return $visitors = Visitor::WhereIn('status', ['masuk', 'keluar'])->whereMonth('created_at', Carbon::today()->month)->count();
    }

    public function persenContainer()
    {
        $persenCont = Container::whereDate('created_at', Carbon::now('m'))->count();
        return $persentase = round(($persenCont / 100), 2);
    }

    public function supplier()
    {
        return $supplier = Suppliers::latest()->get();
    }

    public function supplierIkan()
    {
        return $totalIkan = MutasiMasuk::where('supplier', 'Supplier Ikan')->whereMonth('created_at', Carbon::today()->month)->latest()->get();
    }
    
    public function barangMasuk()
    {
        $listBrgMasuk = ['Plastik', 'Bahan Kemas', 'Air galon', 'Bahan Kimia', 'Gas', 'Bandar Tuna'];
        return $barangMasuk = MutasiMasuk::whereIn('supplier', $listBrgMasuk)->whereMonth('created_at',Carbon::today()->month)->get();
    }

    public function izinKaryawan()
    {
        return $izinKaryawan = Permission::whereIn('status', ['keluar', 'masuk'])->whereMonth('created_at', Carbon::today()->month)->latest()->get();
    }

    public function kendaraan()
    {
        return $kendaraan = Transportation::whereIn('status', ['masuk', 'keluar'])->whereMonth('created_at', Carbon::today()->month)->latest()->get();
    }

    public function Documents()
    {
        return $document = Document::where('status', 'Masuk')->whereMonth('created_at', Carbon::today()->month)->latest()->get();
    }

    public function SmartphoneStored()
    {
        return $smartphone_store = StorePhone::where('status', 'store')->get();
    }

}
