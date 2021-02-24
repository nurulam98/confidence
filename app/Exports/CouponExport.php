<?php

namespace App\Exports;

use App\Coupon;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CouponExport implements FromQuery,WithHeadings
{

    public function __construct($awal = null,$akhir=null)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }

    public function query()
    {
	$tz = "Asia/Jakarta";
	if($this->akhir == null){
	$split = explode("-",$this->awal);
	$date_awal = Carbon::createFromDate($split[2],$split[1],$split[0],$tz);
	$output2 = User::query()->join('coupon','users.id','=','coupon.user_id')
->select(DB::raw('date_format(date(coupon.updated_at),\'%d-%M-%Y\')'),DB::raw('time(coupon.updated_at)'),'users.name','users.no_handphone','users.address','users.kota','coupon.coupon')
->whereDate('coupon.updated_at','=',$date_awal);
	return $output2;
	}else{
	$split = explode("-",$this->awal);
	$split2 = explode("-",$this->akhir);
        $date_awal = Carbon::createFromDate($split[2],$split[1],$split[0],$tz);
	$date_akhir = Carbon::createFromDate($split2[2],$split2[1],$split2[0],$tz);

        $output2 = User::query()->join('coupon','users.id','=','coupon.user_id')
->select(DB::raw('date_format(date(coupon.updated_at),\'%d-%M-%Y\')'),DB::raw('time(coupon.updated_at)'),'users.name','users.no_handphone','users.address','users.kota','coupon.coupon')
->whereDate('coupon.updated_at','>=',$date_awal)->orWhereDate('coupon.updated_at','<=','$date_akhir');
	return $output2;
	}
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return ["Tanggal","Jam","Nama Pengguna", "Nomor Handphone", "Alamat", "Kota", "Kode Kupon"];
    }
}
