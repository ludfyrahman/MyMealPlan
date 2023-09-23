<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::all();
        $title = 'List Artikel';
        $var = 'article';
        return view('pages.backoffice.article.index', compact('data', 'title', 'var'));
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
        $var = 'article';
        $title = 'Tambah Artikel';
        return view('pages.backoffice.article.form', compact('data', 'title', 'var'));
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
            'image'      => 'required|image|mimes:jpeg,jpg,png,gif',
            'description' => 'required'
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/article/', $file->hashName());
                $image      = $file->hashName();
            }
            Article::create([
                'name'      => $request->name,
                'image'     => $image,
                'description'=> $request->description,
            ]);
            return redirect('article')->with('success', 'Berhasil menambah data!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Article::where('id', $id)->first();
        $title = 'Edit data Artikel';
        $var = 'article';
        return view('pages.backoffice.article.form', compact('data', 'title', 'var'));
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
                $file->storeAs('public/article/', $file->hashName());
                $image      = $file->hashName();
            }
            $data = Article::find($id);
            $data->name = $request->name;
            $data->description = $request->description;
            if($image != null){
                $data->image = $image;
            }
            $data->save();
            return redirect('article')->with('success', 'Berhasil mengubah data!');
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
            Article::find($id)->delete();
            return redirect('article')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
