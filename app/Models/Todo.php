<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'status',
        'contents'
    ];

    protected $table = 'todos';
}
