<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_user', 'id_guru', 'id_pkgAtasan', "id_pkgGuru", 'id_pkgSiswa', 'jawaban', 'kinerja '];
    protected $visible = ['id', 'id_user', 'id_guru', 'id_pkgAtasan', "id_pkgGuru", 'id_pkgSiswa', 'jawaban', 'kinerja  '];

    public function dataGuru(){
        return $this->BelongsTo(dataGuru::class, 'id_guru');
    }
    public function pkgAtasan(){
        return $this->BelongsTo(pkgAtasan::class, 'id_pkgAtasan');
    }
    public function pkgGuru(){
        return $this->BelongsTo(pkgGuru::class, 'id_pkgGuru');
    }
    public function pkgSiswa(){
        return $this->BelongsTo(pkgSiswa::class, 'id_pkgSiswa');
    }
}
