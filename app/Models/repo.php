<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repo extends Model
{
    use HasFactory;

    protected $table = 'repo';

    protected $primaryKey = 'id_repo';

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function pembukuan(){
        return $this->hasMany(pembukuan::class);
    }

}
