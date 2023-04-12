<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentRelation;
use App\Models\Test;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function index()
    {

        $depReration = DepartmentRelation::with('Department')->get()->toArray();

        dd($depReration);

        return view('department.index');
    }

    public function regist()
    {

        $departMents = Department::get();

        // dd($departMents);

        // $test = Test::with('test2')->get()->toArray();
        // $test = Test::find(1)->test2;

        // echo '<pre>';
        // var_dump($test);
        // exit;
        // dd($test);


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
        
        $departMent = Department::create([
            'name' => $req->name,
            'depth' => $depth
        ]);
        $insertId = $departMent->id;
        // $insertId = 10;
      
        if($req->parentId === '0') {
            DepartmentRelation::create([
                'parent_id' => $insertId,
                'child_id' => $insertId
            ]);
        } else {
            $depReration = DepartmentRelation::with('Department')
            ->where(['child_id' => $req->parentId])
            ->get()->toArray();

            $parentIdArr = [];
            foreach($depReration as $data) {
                $parentIdArr [] = [
                    'parent_id' => $data['parent_id'],
                    'child_id' => $insertId
                ];
            }

            // 自身のデータも保存
            $parentIdArr[] = [
                'parent_id' => $insertId,
                'child_id' => $insertId,
            ];

            DepartmentRelation::insert($parentIdArr);


            // dd($depReration,$parentIdArr);
            // dd($parentDep,$parentR);

        }


        return to_route('department.index');

    }

}
