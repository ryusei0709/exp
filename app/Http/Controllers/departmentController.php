<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentRelation;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function index()
    {

        return view('department.index');
    }

    public function regist()
    {

        $departMents = Department::get();

        // dd($departMents);

        return view('department.regist', compact('departMents'));

    }

    public function add(Request $req)
    {

        // dd($req->name);
        // dd($req->parentId);

        if($req->parentId === '0') {
            $depth = 1;
        } else {
            $parentDep = Department::where('id', $req->parentId)->first();
            $depth = $parentDep['depth'] + 1;
            // dd($parentDep,$depth);
        }
        
        // $departMent = Department::create([
        //     'name' => $req->name,
        //     'depth' => $depth
        // ]);


        // $insertId = $departMent->id;
      
        if($req->parentId === '0') {
            DepartmentRelation::create([
                'parent_id' => $insertId,
                'child_id' => $insertId
            ]);
        } else {
            $parentDep = Department::where('id', $req->parentId)->get();

            dd($parentDep);

        }


        return to_route('department.index');

    }

}
