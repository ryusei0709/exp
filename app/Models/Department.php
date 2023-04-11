<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'depth'
    ];

    public $timestamps = false;

    public function DepartmentRelation()
    {
        $this->hasMany(Department::class);
    }


}
