<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function studentparents()
    {
        return $this->hasOne(StudentParent::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}