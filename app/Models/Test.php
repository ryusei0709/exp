<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function test2()
    {
        return $this->hasMany(Test2::class,'test_id');
    }

}
