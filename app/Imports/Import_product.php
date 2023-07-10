<?php

namespace App\Imports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_product implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
            'product_id'=>$row[0],
            'product_name'=>$row[1],
            'category_id'=>$row[2],
            'product_desc'=>$row[3],
            'product_price'=>$row[4],
            'gia_km'=>$row[5],
            'product_image'=>$row[6],
            'product_status'=>$row[7],
            'soluong'=>$row[8],
            'product_sold'=>$row[9],
            'product_rating_number'=>$row[10],
            'product_rating'=>$row[11],
            'product_view'=>$row[12],
            'created_at'=>$row[13],
            'updated_at'=>$row[14]
        ]);
    }
}
