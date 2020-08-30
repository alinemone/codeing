<?php

namespace App\Http\Controllers\Admin;

use AliBayat\LaravelCategorizable\Category;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        SEOMeta::setTitle('دسته بندی ها');
        $categories = Category::Where('parent_id',NULL)->Where('type','default')->latest()->get();
        $subcategories = Category::latest()->Where('type','default')->get();
        return view('Admin.Category.index',compact('categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required'
        ]);
        Category::create([
            'name' => $request->name,
            'parent_id'=>$request->parent_id,
            'seo_title'=> $request->seo_title,
            'seo_description'=> $request->seo_description,
        ]);

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return void
     */
    public function edit($id)
    {

        $categories = Category::Where('parent_id',NULL)->Where('type','default')->latest()->get();
        $subcategories = Category::latest()->Where('type','default')->get();

        $category = Category::findById($id);

        SEOMeta::setTitle("ویرایش دسته بندی | $category->name  ");

        return view('Admin.Category.edit',compact('category','subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return void
     */
    public function update(Request $request,$id)
    {
        $this->validate($request , [
            'name' => 'required'
        ]);

        $category =  Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->seo_title = $request->seo_title;
        $category->seo_description = $request->seo_description;
        $category->save();
        return redirect(route('category.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Category::findById($id)->delete();
        return redirect(route('category.index'));
    }
}
