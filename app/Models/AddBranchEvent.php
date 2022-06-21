<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBranchEvent extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='tbl_branchevent';

    public function branchname()
    {
        return $this->belongsTo(User::class, 'Branch_ID');
    }
}
