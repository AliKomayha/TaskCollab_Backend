<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['manager_id', 'employee_id', 'content', 'due_date', 'status'];

    public function employee(){
        return $this->belongsTo(User::class, 'employee_id');   
    }

    public function manager(){
        return $this->belongsTo(User::class, 'manager_id');
    }
    
}

