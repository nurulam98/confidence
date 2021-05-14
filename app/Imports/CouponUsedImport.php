<?php

namespace App\Imports;

use App\Coupon_used;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class CouponUsedImport implements ToModel, WithBatchInserts
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
	//dd($row);
        return new Coupon_used([
		'coupon' => $row[0],
		'status' => 'Used'
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
