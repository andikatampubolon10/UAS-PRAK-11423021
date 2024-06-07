<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukOlahraga extends Model
{
    use HasFactory;
    protected $table = 'produk_olahraga';
    protected $primaryKey = 'id_produkolahraga';
}
