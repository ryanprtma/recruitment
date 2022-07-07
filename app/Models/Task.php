<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'task',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class);
    }
}
