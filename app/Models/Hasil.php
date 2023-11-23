<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'data_testing';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'jk', 'umur',
        'berat_badan', 'tinggi_badan'
    ];
}
