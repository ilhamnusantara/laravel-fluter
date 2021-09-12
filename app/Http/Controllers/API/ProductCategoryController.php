<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Models\productCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function all(Request $request)
    {
//        return response()->json([],200);
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('id');
        $show_product = $request->input('show_product');

        if($id)
        {
            $category = productCategory::with('products')->find($id);
            if($category){
                return ResponseFormatter::success(
                    $category,
                    'Data kategori berhasil diambil'
                );
            }
            else{
                return ResponseFormatter::error(
                    null,
                    'Data kategori berhasil tidak ada',
                    404
                );
            }
        }
        $category = productCategory::query();
        if ($name){
            $category->where('name','like', '%' . $name . '%');
        }
        if ($show_product){
            $category->with('products');
        }
        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data list kategori berhasil diambil'
        );
    }
}
