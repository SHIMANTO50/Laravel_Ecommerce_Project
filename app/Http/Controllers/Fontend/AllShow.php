<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Items;
use App\Models\Backend\SubCategory;
use Illuminate\Http\Request;

class AllShow extends Controller
{
    public function frontcatshow()
    {
        $allcats = Category::all();
        $items = Items::all();
        return view('fontend.home', compact('allcats', 'items'));
    }

    public function singleproducts($id)
    {
        $allproducts = Items::where('item_code', $id)->get();
        return view('fontend.singleproduct', compact('allproducts'));
    }
}
