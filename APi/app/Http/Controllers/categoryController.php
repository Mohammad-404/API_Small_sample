<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_model;
use App\Traits\GeneralTraits;

class categoryController extends Controller
{
    use GeneralTraits; // i created one

    public function index(){
        $category_model = category_model::selection()->get();
        return $this->returnData('Categories',$category_model,'data return success');
        // return response()->json($category_model);
    }

    public function getbyID(Request $request){
        $category_model = category_model::selection()->find($request->id);
        
        if (!$category_model)
            return $this->returnError('500','The ID is not found !');
        else
            return $this->returnData('Category',$category_model,'success return data');
        
        // return response()->json($category_model); // i can use it, but better than to use traits methods  
        // i can use it to delete or update on database using api as above method 
        // so i can use function update or delete....etc
        // like $category_model::delete();
    }


}
