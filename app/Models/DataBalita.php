<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBalita extends Model
{
    use HasFactory;
    protected $table = 'data_balita';
    //protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama', 'jk', 'umur', 'berat_badan', 'tinggi_berat', 'status'
    ];
}
