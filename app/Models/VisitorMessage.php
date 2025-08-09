<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorMessage extends Model
{
    use HasFactory;

    protected $table = 'visitor_messages';

    protected $fillable = [
        'name',
        'message',
    ];
}