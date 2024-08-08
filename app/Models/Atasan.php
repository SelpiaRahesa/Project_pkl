<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atasan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kompetensi'];
    protected $visible = ['id', 'nama_kompetensi'];

    public function pkgAtasan(){
        return $this->hasMany(pkgAtasan::class);
    }
}
