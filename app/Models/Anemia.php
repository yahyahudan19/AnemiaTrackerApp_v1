<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anemia extends Model
{
    use HasFactory;

    protected $table = 'anemias';
    protected $primaryKey = 'id_anemia';
    protected $fillable = ['tinggi_anemia','berat_anemia','riwayat_anemia','minum_anemia'];

    public function siswa(){
        return $this->hasMany(Siswa::class,'anemia_id');
    }
}
