<?php

namespace App\Imports;

use App\Coupon;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
class CouponImport implements ToModel, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $hasil = explode(";",$row[0]);
//	$cek = Coupon::where('coupon',$hasil[1])->first();
//	if($cek){
//	return null;
//}
        return new Coupon([
            'coupon' => $hasil[1],
            'status' => "Valid",
        ]);
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
	return 500;
    }
}
