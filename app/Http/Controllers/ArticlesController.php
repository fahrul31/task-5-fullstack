<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function getAllArticles() {
        $data = Articles::all();
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    //detail
    public function detailArticles($id){
        $data = Articles::find($id);
        return response()->json(['message' => 'Success','data'=>$data]);
    }
    
    //create
    public function insertArticles(Request $request,$id_categories){

        $data = Articles::create([
            'user_id' => Auth::user()->id,
            'categories_id' => $id_categories,
            'title' => $request -> title,
            'content' => $request -> content,
            'image' => $request -> image,
        ]);
        
        return response()->json(['message' => 'Success','data'=>$data]);

    }

    //update
    public function updateArticles(Request $request, $id){
   
        $response = Articles::findOrFail($id);
        $response->update([
            'title' => $request -> title,
            'content' => $request -> content,
            'image' => $request -> image,
        ]);

    
        return response()->json(['message' => 'Success','data'=>$response]);
    }

    //delete
    public function deleteArticles($id){
        $data = Articles::find($id);
        $data->delete();
        return response()->json(['message' => 'Success Update']);
    }
}
