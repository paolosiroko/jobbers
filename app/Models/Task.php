<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lot;
use App\Models\Users;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lot(){
        return $this->belongsTo(Lot::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
