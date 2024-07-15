<?php

namespace App\Imports;

use App\Models\random_number;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use App\Http\Controllers\LuckyNumberController;
class random_numberImport implements ToModel, WithHeadingRow
{
    // use random_number;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new random_number([

            'code_staff' => $row['staff'],
        ]);
    }
}
