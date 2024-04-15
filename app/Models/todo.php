<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    
    protected $fillable = [
    "todo"
    ];
    
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    
}
