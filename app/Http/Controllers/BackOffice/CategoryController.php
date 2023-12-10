<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type ?? 1;
        $data = Category::where('type', $type)->get();
        $title = 'List Meal Plan ';
        if($type == 1){
            $title .= ' Diet';
        }
        $var = 'category';
        return view('pages.backoffice.category.index', compact('data', 'title', 'var','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = (object)[
            'name'      => '',
            'image'   => '',
            'link'   => '',
            'type' => 'create'
        ];
        $type = $request->type ?? 1;
        $var = 'category';
        $title = 'Tambah Meal Plan';
        return view('pages.backoffice.category.form', compact('data', 'title', 'var', 'type'));
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
            'name'      => 'required',
        ]);
        try {
            Category::create([
                'name'      => $request->name,
                'type'      => $request->type,
            ]);
            return redirect(route('category.index', ['type' => $request->type]))->with('success', 'Berhasil menambah data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menambah data!' . $th->getMessage());
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
        $data = SubCategory::with('category', 'masterMenuDiet')->where('category_id', $id)->get();
        $category = Category::find($id);
        $title = 'Detail '.$category->name;
        $var = 'sub_category';
        return view('pages.backoffice.category.show', compact('data', 'title', 'var', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::where('id', $id)->first();
        $title = 'Edit data Meal Plan';
        $type = $data->type;
        if($type == 1){
            $title .= ' Diet';
        }

        $var = 'category';
        return view('pages.backoffice.category.form', compact('data', 'title', 'var'));
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
            'name' => 'required',
        ]);
        try {
            $data = Category::find($id);
            $data->name = $request->name;
            $data->save();
            return redirect(route('category.index', ['type' => $data->type]))->with('success', 'Berhasil mengubah data!');
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
            Category::find($id)->delete();
            return redirect('category')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
