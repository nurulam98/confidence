<?php
namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\UserUpdate;
use App\Points;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:isUser');
    }

    public function index()
    {
        $coupon = Coupon::where('user_id',Auth::user()->id)->count();
        $points = Points::where('user_id',Auth::user()->id)->first();
        if (strlen($points) == 0){
            $point = 0;
        }
        else{
            $point = $points->points;
        }
        return view('user.dashboard', ['coupon' => $coupon, 'points' => $point]);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profilePost(UserUpdate $request)
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

    public function inputCode()
    {
        return view('user.inputCode');
    }

    public function inputCodePost(Request $request)
    {
        $validateData = $request->validate([
            'coupon' => ['required','min:8','max:10','regex:/(^B|P|C+)([a-zA-Z0-9]+)?$/u']
        ]);
        $coupon = $request->coupon;

        $stripped = str_replace(' ', '', $coupon);

        $upper = strtoupper($stripped);
        $coupon_get = Coupon::where('coupon',$upper)->first();
        if ($coupon == $coupon_get->coupon && $coupon_get->status == "Invalid"){
            return redirect()->route('inputCode')->withErrors(['error' => 'Kupon Sudah Terpakai. Coba Lagi']);
        }
        else{
            $coupon_get->status = "Invalid";
            $coupon_get->user_id = Auth::user()->id;
            $coupon_get->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $coupon_get->save();
            $point = Points::where('user_id',Auth::user()->id)->first();
            if(strlen($point) == 0){
                $add_point = new Points;
                $add_point->user_id = Auth::user()->id;
                $add_point->points = 1;
                $add_point->save();
            }
            else{
                $add_point = Points::where('user_id',Auth::user()->id)->first();
                $count = $add_point->points + 1;
                $add_point->points = $count;
                $add_point->save();
            }
        }
        $request->session()->flash('success', "Input Kode Kupon Berhasil");
        return redirect(route('inputCode'));
    }


}
