<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
class CategoryController extends Controller
{
    public function index()
    {
        return view('index');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        $data = [];
        $data['name'] = json_encode($input['name']);
  
        Category::create($data);
  
        return response()->json(['success'=>'Recoreds inserted']);        
    }
}