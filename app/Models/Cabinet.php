<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function president(){
        return $this->hasOne(Functionary::class, 'id');
    }
}
