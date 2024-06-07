<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanOlahraga extends Model
{
    use HasFactory;
    protected $table = 'user_olahraga';
    protected $primaryKey = 'id_pengumuman';
}
