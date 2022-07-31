<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
class CategoriesController extends Controller
{
    public function getAllCategories() {
        $data = Categories::all();
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    //detail
    public function detailCategories($id){
        $data = Categories::find($id);
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    
    //create
    public function insertCategories(Request $request){

        $data = Categories::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);
        
        return response()->json(['message' => 'Success','data'=>$data]);

    }

    //update
    public function updateCategories(Request $request, $id){
   
        $response = Categories::findOrFail($id);
        $response->update([
            'name' => $request->name,
        ]);

    
        return response()->json(['message' => 'Success','data'=>$response]);
    }

    //delete
    public function deleteCategories($id){
        $data = Categories::find($id);
        $data->delete();
        return response()->json(['message' => 'Success Update','data'=>null]);
    }
}
