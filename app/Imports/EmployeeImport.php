<?php

namespace App\Imports;

use App\Renter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new renter([
            "roomid" => $row["roomid"],
            "firstname" => $row["firstname"],
            "lastname" => $row["lastname"],
            "iden_num" => $row["iden_num"],
            "email" => $row["email"],
            "phone" => $row["phone"],
            "nationality" => $row["nationality"],
            "verify_code" => $row["verify_code"],
        ]);
    }
}
