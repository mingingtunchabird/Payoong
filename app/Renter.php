<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Renter extends Model
{
    //
    protected $table = 'renters';

    protected $fillable = ["roomid","firstname","lastname","iden_num","email","phone","nationality","verify_code"];

    public static function getRenter(){
        $record = DB::table('renters')->select("roomid","firstname","lastname","iden_num","email","phone","nationality","verify_code")
            ->orderBy('id','asc');
        return $record;
    }

}
