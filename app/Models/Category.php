<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Kalnoy;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        '_lft',
        '_rgt',
        'parent_id',
    ];


}
