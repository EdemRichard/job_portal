<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionsController extends Controller
{
    public function region(){
        return view('regions.region');
    }

    public function addregion(Request $request){
        $this->validate($request, [
            'region' => 'required'
        ]);
        $region = new Region;
        $region->region = $request->input('region');
        $region->save();
        return redirect('/region')->with('response', 'Category Added successfully'); 
    }

    
}
