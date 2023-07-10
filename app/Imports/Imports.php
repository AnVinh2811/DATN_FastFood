<?php

namespace App\Imports;

use App\Models\category;
use Maatwebsite\Excel\Concerns\ToModel;

class Imports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new category([
            'category_id'=>$row[0],
            'category_name'=>$row[1],
            'category_desc'=>$row[2],
            'category_status'=>$row[3],
        ]);
    }
}
