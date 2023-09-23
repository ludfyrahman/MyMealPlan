<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sliders;

class SlidersController extends Controller
{
    public function index()
    {
        $data = Sliders::all();
        $title = 'List Slider';
        return view('pages.backoffice.sliders.index', compact('data', 'title'));
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
        $title = 'Tambah Slider';
        return view('pages.backoffice.sliders.form', compact('data', 'title'));
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
            'link'   => 'required',
            'image'      => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/sliders/', $file->hashName());
                $image      = $file->hashName();
            }
            Sliders::create([
                'name'      => $request->name,
                'image'   => $image,
                'link'    => $request->link,

            ]);
            return redirect('sliders')->with('success', 'Berhasil menambah data!');
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
        $data = Sliders::where('id', $id)->first();

        $title = 'Edit data Slider';
        return view('pages.backoffice.sliders.form', compact('data', 'title'));
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
            'link' => 'required',
            'image'     => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $image = null;
            if($request->image != null){
                $file = $request->file('image');
                $file->storeAs('public/sliders/', $file->hashName());
                $image      = $file->hashName();
            }


            $slider = Sliders::find($id);
            $slider->name = $request->name;
            $slider->link   = $request->link;
            if($image != null){
                $slider->image = $image;
            }
            $slider->save();
            return redirect('sliders')->with('success', 'Berhasil mengubah data!');
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
            Sliders::find($id)->delete();
            return redirect('sliders')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
