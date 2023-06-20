<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anemia extends Model
{
    use HasFactory;

    protected $table = 'anemias';
    protected $primaryKey = 'id_anemia';
    protected $fillable = ['siswa_id','tinggi_anemia','berat_anemia','riwayat_anemia','minum_anemia'];

    public function siswa(){
        return $this->belongsTo(Siswa::class,'siswa_id');
    }
}
