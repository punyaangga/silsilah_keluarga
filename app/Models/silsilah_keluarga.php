<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class silsilah_keluarga extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nama', 'jenis_kelamin', 'id_orang_tua'];
    public function children()
    {
        return $this->hasMany(silsilah_keluarga::class, 'id_orang_tua');
    }

    
}
