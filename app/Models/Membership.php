<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $table='tbl_memberapply';

    public function branchMbelongs()
    {
        return $this->belongsTo(AddBranch::class,'int_branch_id');
    }
    public function propersorbelongs()
    {
        return $this->belongsTo(User::class,'id');
    }
    // public function Countrybelongs()
    // {
    //     return $this->belongsTo(Country::class,'id');
    // }

}
