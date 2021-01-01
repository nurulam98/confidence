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
        return new Coupon([
            'coupon' => $hasil[1],
            'status' => $hasil[2],
        ]);
    }

    public function batchSize(): int
    {
<<<<<<< HEAD
        return 100;
=======
        return 1000;
>>>>>>> e736df9eb6f2106577a116366bec00127973256f
    }

    public function chunkSize(): int
    {
<<<<<<< HEAD
	return 100;
=======
        return 1000;
>>>>>>> e736df9eb6f2106577a116366bec00127973256f
    }
}
