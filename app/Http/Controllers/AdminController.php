<?php
namespace App\Http\Controllers;

use App\Coupon;
use App\Exports\CouponExport;
use App\Http\Requests\AdminUpdate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Excel;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkRole:isAdmin');
    }

    public function index(){
        $user = User::whereNotNull('email_verified_at')->where('isUser','=',1)->where('isDeleted',0)->count();
        $coupon = Coupon::where('status','Invalid')->count();
        return view('admin.dashboard',['user' => $user, 'coupon' => $coupon]);
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function profilePost(AdminUpdate $request)
    {
        $user = Auth::user();
        if (!(Hash::check($request['password'], Auth::user()->password))) {
            return redirect()->back()->withErrors(["Password Sekarang anda tidak cocok dengan database. Silahkan coba lagi"]);
        }

        if (strcmp($request['password'], $request['new_password']) == 0) {
            return redirect()->back()->withErrors(["Password baru tidak boleh sama dengan password sekarang. Silahkan masukan password"]);
        }
        if (!(strcmp($request['new_password'], $request['new_password_confirmation'])) == 0) {
            return redirect()->back()->withErrors(["Konfirmasi Password dengan Password baru tidak sama. Silakan coba lagi"]);
        }
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->no_handphone = $request['no_handphone'];
        $user->password = Hash::make($request['new_password']);
        $user->save();

        $request->session()->flash('success', "Data Berhasil Diubah");
        return back();
    }

    public function json()
    {
        $user = User::select('name','email','username','no_handphone')->whereNotNull('email_verified_at')->where('isUser','=', 1)->where('isDeleted',0)->get();
        return datatables()->of($user)->addIndexColumn()->toJson();
    }
    public function user()
    {
        return view('admin.user');
    }

    public function exportMonth()
    {
        return view('admin.exportMonth');
    }

    public function exportYear()
    {
        return view('admin.exportYear');
    }

    public function exportPost(Request $request){
        if (strlen($request->awal)==7 and $request->akhir == null){
            $awal = "01-".$request->awal;
            $date = date("Y-M-d", strtotime($awal));
            $explode_bln = explode("-",$date);
            $text = "Reporting Bulan ".$explode_bln[1]." Tahun".$explode_bln[0].".csv";
        }
        if (strlen($request->awal)==7 && strlen($request->akhir) ==7){
            $awal = "01-".$request->awal;
            $date = date("Y-M-d", strtotime($awal));
            $explode_bln = explode("-",$date);
            $akhir = "01-".$request->akhir;
            $dates = date("Y-M-d", strtotime($akhir));
            $explode_bln1 = explode("-",$dates);
            $text = "Reporting Bulan ".$explode_bln[1]." & ".$explode_bln1[1]." ".$explode_bln[0].".csv";
        }
        if (strlen($request->awal)==7 && $request->akhir == null){
            $text = "Reporting Tahun ".$request->awal.".csv";
        }
        if (strlen($request->awal)==7 && $request->akhir != null){
            $text = "Reporting Tahun ".$request->awal." & ".$request->akhir.".csv";
        }
        return Excel::download(new CouponExport($request->awal, $request->akhir), $text);
    }

}
