<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MasterMenuDiet;
use App\Models\SiklusMenuDiet;
use App\Models\PolaMenuDiet;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        $title = 'List Category';
        $var = 'sub_category';
        return view('pages.backoffice.sub_category.index', compact('data', 'title', 'var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id =$request->id;
        $data = (object)[
            'name'      => '',
            'image'   => '',
            'link'   => '',
            'type' => 'create'
        ];
        $var = 'sub_category';
        $title = 'Tambah Pola Menu Diet';
        return view('pages.backoffice.sub_category.form', compact('data', 'title', 'var', 'id'));
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
        $id = $request->id;
        try {
            SubCategory::create([
                'name'      => $request->name,
                'category_id'=> $request->id,
            ]);
            return redirect('category/'. $id)->with('success', 'Berhasil menambah data!');
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
        $data = [];
        $subcategory = SubCategory::find($id);
        $title = 'Detail '.$subcategory->name;
        $var = 'sub_category';
        return view('pages.backoffice.sub_category.show', compact('data', 'title', 'var','subcategory', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data = SubCategory::with('category')->where('id', $id)->first();
        $title = 'Edit data perancangan '.$data->category->name ?? '-';
        $var_id = $request->id;
        $id = $data->category_id;
        $var = 'sub_category';
        return view('pages.backoffice.sub_category.form', compact('data', 'title', 'var','var_id', 'id'));
    }


    public function detail($id)
    {
        //
        $data = [];
        $subcategory = SubCategory::with('masterMenuDiet', 'siklusMenuDiet')->find($id);
        $title = 'Detail '.$subcategory->name;
        $var = 'sub_category';
        $master = MasterMenuDiet::where('subcategory_id', $id)->get();
        $siklus = SiklusMenuDiet::where('subcategory_id', $id)->get();
        $pola = PolaMenuDiet::where('subcategory_id', $id)->get();
        // dd($pola->toArray(), $master->toArray(), $siklus->toArray());
        return view('pages.backoffice.sub_category.detail', compact('data', 'title', 'var','subcategory', 'id', 'master', 'siklus', 'pola'));
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

        $name = $request->name;
        try {

            $data = SubCategory::find($id);
            $data->name = $request->name;
            $data->save();
            $category_id = $data->category_id;
            return redirect('category/'. $category_id)->with('success', 'Berhasil mengubah data!');
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
