<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feestructure extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='tbl_feestructure';

    public function currency()
    {

        return $this->belongsTo(Currency::class, 'vch_currencyname');
    }
}
