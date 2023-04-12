<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContorller extends Controller
{
    public function index()
    {

        $tree = Category::get()->toTree(); // ツリー形式(ネスト)で取得

        $parent = Category::find(1); // 大カテゴリー(id=1)
        $categories = $parent->descendants()->get(); // 中カテゴリー、小カテゴリーをリストで取得
        dd($tree->toArray(), $parent, $categories->toArray()); // 配列形式で表示


        // $small = Category::find(2); // 小カテゴリー(id=3)
        // $categories = $small->ancestors()->get(); // 大カテゴリー、中カテゴリーをリストで取得
        // dd($categories->toArray()); // 配列形式で表示


        // $tree = Category::get()->toTree(); // ツリー形式(ネスト)で取得
        // dd($tree->toArray()); // 配列形式で表示


        // $parent = Category::create(['name' => 'FUGA']);
        // //子を追加
        // $parent->children()->create(['name' => 'HOGE']);


        // あるカテゴリーを一番上に追加
        // $node = Category::find(2);
        // $node->saveAsRoot();

        // 既存のカテゴリを親カテゴリーに紐づける
        // $parent = Category::find(1); //Bar
        // $children = Category::find(2); //Foo

        // $parent->appendNode($children);


        return view('category.index');
    }

    public function treeList()
    {


        $results = Category::get();
        $tree = $results->toTree();


        function setTreeObj($children, $sepa) {
            outPutCategories($children, $sepa . '-');
        }
        function outPutCategories($categories, $sepa = '-') {
            foreach($categories as $category) {
                echo $sepa . '  ' . $category->name . '<br>';
                setTreeObj($category->children, $sepa);
            }
        }

        outPutCategories($tree);

        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo $prefix . ' ' . $category->name . '<br>';

                $traverse($category->children, $prefix . '-');
            }
        };

        $traverse($tree);

        dd($tree);

        return view('category.tree');
    }
}
