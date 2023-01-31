<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function functionary(){
        return $this->belongsTo(Functionary::class, 'id');
    }
}
