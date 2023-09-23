<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\RecipeCategory;

class RecipeController extends Controller
{
    public function index()
    {
        $data = Recipe::with('category', 'category.category')->get();
        $title = 'List Recipe';
        $var = 'recipe';
        return view('pages.backoffice.recipe.index', compact('data', 'title', 'var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[
            'name'      => '',
            'image'   => '',
            'description'   => '',
            'type' => 'create'
        ];
        $var = 'recipe';
        $category = Category::all();
        $title = 'Tambah Recipe';
        return view('pages.backoffice.recipe.form', compact('data', 'title', 'var', 'category'));
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
            'name'          => 'required',
            'image'         => 'required|image|mimes:jpeg,jpg,png,gif',
            'description'   => 'required',
            'category'      => 'required|array|min:1'
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/recipe/', $file->hashName());
                $image      = $file->hashName();
            }

            $data = Recipe::create([
                'name'      => $request->name,
                'image'     => $image,
                'description'=> $request->description,
            ]);
            $this->mapping($request, $data);
            return redirect('recipe')->with('success', 'Berhasil menambah data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menambah data!' . $th->getMessage());
        }
    }

    public function mapping($request,$data){
        RecipeCategory::where('recipe_id', $data->id)->delete();
        foreach ($request->category as $val) {
            RecipeCategory::create([
                'recipe_id' => $data->id,
                'category_id' => $val
            ]);
        }
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
        $data = Recipe::where('id', $id)->first();
        $title = 'Edit data Recipe';
        $var = 'recipe';
        $category = Category::all();
        return view('pages.backoffice.recipe.form', compact('data', 'title', 'var', 'category'));
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
        $request->validate([
            'name'      => 'required',
            'image'      => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'description' => 'required'
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/recipe/', $file->hashName());
                $image      = $file->hashName();
            }
            $data = Recipe::find($id);
            $data->name = $request->name;
            $data->description = $request->description;
            if($image != null){
                $data->image = $image;
            }
            $data->save();
            $this->mapping($request, $data);
            return redirect('recipe')->with('success', 'Berhasil mengubah data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal mengubah data!' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Recipe::find($id)->delete();
            return redirect('recipe')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
