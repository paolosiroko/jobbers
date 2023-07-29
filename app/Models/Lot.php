<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Lot extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
