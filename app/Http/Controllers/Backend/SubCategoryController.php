<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::all();
        return view('backend.pages.subcategory.managesubcategory', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catname = Category::all();
        return view('backend.pages.subcategory.addsubcategory', compact('catname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'catId' => 'required',
            'subcatName' => 'required',
            'des' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);
        $subcategoryname = new SubCategory();
        $subcategoryname->catId = $request->catId;
        $subcategoryname->subcatName = $request->subcatName;
        $subcategoryname->slug = Str::slug($request->subcatName);
        $subcategoryname->des = $request->des;
        $subcategoryname->img = $request->image;

        if ($request->image) {
            $image = $request->file('image');
            $nameCustom = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/subcategoryimages/' . $nameCustom);
            Image::make($image)->save($location);
            $subcategoryname->img = $nameCustom;
        }
        // dd($subcategoryname);
        $subcategoryname->save();
        return redirect()->route('subcategorymanage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $subcategory = SubCategory::find($id);
        $catname = Category::all();
        return view('backend.pages.subcategory.editsubcategory', compact('subcategory', 'catname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $subcategory = SubCategory::find($id);
        $subcategory->catId = $request->catId;
        $subcategory->subcatName = $request->subcatName;
        $subcategory->slug = Str::slug($request->subcatName);
        $subcategory->des = $request->des;
        $subcategory->img = $request->image;

        if (!empty($request->image)) {
            if (File::exists('backend/subcategoryimages/' . $subcategory->img)) {
                File::delete('backend/subcategoryimages/' . $subcategory->img);
            }
            $image = $request->file('image');
            $nameCustom = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/subcategoryimages/' . $nameCustom);
            Image::make($image)->save($location);
            $subcategory->img = $nameCustom;
        }
        // dd($subcategoryname);
        $subcategory->update();
        return redirect()->route('subcategorymanage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $subcategory = SubCategory::find($id);

        File::delete('backend/subcategoryimages/' . $subcategory->img);

        $subcategory->delete();
        return redirect()->route('subcategorymanage');
    }
}
