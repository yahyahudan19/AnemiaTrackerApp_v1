<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['user_id','nama_siswa','nis_siswa','ttl_siswa','alamat_siswa','jenisk_siswa','ayah_siswa','ibu_siswa'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function anemia(){
        return $this->hasMany(Anemia::class);
    }
    
}
