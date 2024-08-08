<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataGuru extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama', 'jenis_kelamin', 'nip',' id_mapel', 'image'];
    protected $visible = ['id', 'nama', 'jenis_kelamin', 'nip',' id_mapel', 'image'];

    public function mapel(){
        return $this->BelongsTo(Mapel::class, 'id_mapel');
    }
}
