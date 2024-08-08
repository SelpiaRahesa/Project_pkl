<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pkgAtasan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_kompetensi', 'pertanyaan'];
    protected $visible = ['id', 'id_kompetensi', 'pertanyaan'];

    public function atasan(){
        return $this->BelongsTo(Atasan::class, 'id_kompetensi');
    }
    public function hasil(){
        return $this->hasMany(Hasil::class);
    }
}
