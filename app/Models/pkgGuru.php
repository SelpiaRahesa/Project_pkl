<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pkgGuru extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_kompetensi', 'pertanyaan'];
    protected $visible = ['id', 'id_kompetensi', 'pertanyaan'];

    public function guru(){
        return $this->BelongsTo(Guru::class, 'id_kompetensi');
    }
    public function hasil(){
        return $this->hasOne(Hasil::class);
    }
}
