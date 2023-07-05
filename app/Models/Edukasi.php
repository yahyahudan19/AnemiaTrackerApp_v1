<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    use HasFactory;

    protected $table = 'edukasis';
    protected $primaryKey = 'id_edukasi';
    protected $fillable = ['judul_edukasi','poster_edukasi','video_edukasi','detail_edukasi','slug'];
}
