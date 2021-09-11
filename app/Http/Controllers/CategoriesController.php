<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class CategoriesController extends Controller
{
    public function category(){
        return view('categories.category');
    }

    public function addcat(Request $request){
        $this->validate($request, [
            'category' => 'required'
        ]);
        $category = new Category;
        $category->category = $request->input('category');
        $category->save();
        return redirect('/category')->with('response', 'Category Added successfully'); 
    }

    public function post($user_id){
        return $user_id;
    }
}
