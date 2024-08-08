<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'mapel'];
    protected $visible = ['id', 'mapel'];

    public function guru(){
        return $this->hasOne(dataGuru::class);
    }
}
