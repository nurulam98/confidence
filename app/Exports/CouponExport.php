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
        if (strlen($this->awal) == 7 and $this->akhir == null){
            $split = explode("-",$this->awal);
            $output2 = User::query()->join('coupon','users.id','=','coupon.user_id')
                ->select('users.name','users.no_handphone','users.address','users.kota','coupon.coupon')
                ->whereMonth('coupon.updated_at','=',(int) $split[0]);
        }
        if (strlen($this->awal) == 7 and strlen($this->akhir) == 7){
            $awal = "01-".$this->awal;
            $date = date("Y-m-d", strtotime($awal));
            $get_month = explode("-", $this->akhir);
            if ($get_month[0] == 12){
                $akhir = "31-".$this->akhir;
                $date2 = date("Y-m-d", strtotime($akhir));
            }
            else{
                $get_month[0] = intval($get_month[0])+1;
                $implode_date = implode("-",$get_month);
                $implode_date = "00-".$implode_date;
                $date2 = date('Y-m-d',strtotime($implode_date));
            }
            $output2=User::query()->join('coupon','users.id','=','coupon.user_id')
                ->select('users.name','users.no_handphone','users.address','users.kota','coupon.coupon')
                ->whereBetween('coupon.updated_at',[$date,$date2]);
        }
        if (strlen($this->awal) == 4 and $this->akhir == null){
            $output2 = User::query()->join('coupon','users.id','=','coupon.user_id')
                ->select('users.name','users.no_handphone','users.address','users.kota','coupon.coupon')
                ->whereYear('coupon.updated_at','=',(int) $this->awal);
        }
        if (strlen($this->awal) == 4 and strlen($this->akhir) == 4){
            $awal = "01-01-".$this->awal;
            $date = date("Y-m-d", strtotime($awal));
            $akhir = "31-12-".$this->akhir;
            $date2 = date("Y-m-d", strtotime($akhir));
            $output2=User::query()->join('coupon','users.id','=','coupon.user_id')
                ->select('users.name','users.no_handphone','users.address','users.kota','coupon.coupon')
                ->whereBetween('coupon.updated_at',[$date,$date2]);
        }
        return $output2;
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return ["Nama Pengguna", "Nomor Handphone", "Alamat", "Kota", "Kode Kupon"];
    }
}
