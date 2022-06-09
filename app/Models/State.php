<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='tbl_state';

    public function countryname()
    {
        return $this->belongsTo(Country::class, 'Int_CountryID');
    }
}
