<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kompetensi'];
    protected $visible = ['id', 'nama_kompetensi'];

    public function pkgGuru(){
        return $this->hasMany(pkgGuru::class);
    }
    public function hasil(){
        return $this->hasOne(Hasil::class);
    }
}
