<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembukuan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pembukuans';

    protected $fillable = ['id_pembukuans','id_repo','tanggal','uraian','nominal','saldo'];

    public function repo(){
        $this->belongsTo(repo::class);
    }
}
