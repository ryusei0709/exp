<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentRelation extends Model
{
    use HasFactory;

    protected $table = 'departments_relations';

    protected $fillable = [
        'parent_id',
        'child_id'
    ];

    public function Department()
    {
        $this->belongsTo(Department::class);
    }

}
