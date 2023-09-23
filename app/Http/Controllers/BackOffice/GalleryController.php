<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::all();
        $title = 'List Gallery';
        return view('pages.backoffice.gallery.index', compact('data', 'title'));
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
            'link'   => '',
            'type' => 'create'
        ];
        $title = 'Tambah Gallery';
        return view('pages.backoffice.gallery.form', compact('data', 'title'));
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
            'image'      => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/sliders/', $file->hashName());
                $image      = $file->hashName();
            }
            Gallery::create([
                'name'      => $request->name,
                'photo'   => $image,

            ]);
            return redirect('gallery')->with('success', 'Berhasil menambah data!');
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
        $data = Gallery::where('id', $id)->first();

        $title = 'Edit data Slider';
        return view('pages.backoffice.gallery.form', compact('data', 'title'));
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
            'image'     => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/gallery/', $file->hashName());
                $image      = $file->hashName();
            }


            $slider = Gallery::find($id);
            $slider->name = $request->name;
            if($image != null){
                $slider->photo = $image;
            }
            $slider->save();
            return redirect('gallery')->with('success', 'Berhasil mengubah data!');
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
            Gallery::find($id)->delete();
            return redirect('gallery')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
