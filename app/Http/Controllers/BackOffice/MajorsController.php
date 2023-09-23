<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Majors;

class MajorsController extends Controller
{
    public function index()
    {
        $data = Majors::all();
        $title = 'List Data Jurusan / Program Studi';
        return view('pages.backoffice.majors.index', compact('data', 'title'));
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
            'akronim'   => '',
            'logo'   => '',
            'video'   => '',
            'desc'   => '',
            'type' => 'create'
        ];
        $title = 'Tambah Data Jurusan / Program Studi';
        return view('pages.backoffice.majors.form', compact('data', 'title'));
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
            'akronim'   => 'required',
            'logo'      => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'video'     => 'nullable|url',
            'desc'      => 'required',
        ]);
        try {
            $logo = null;
            if($request->logo != null){
                $file = $request->file('logo');
                $file->storeAs('public/majors/', $file->hashName());
                $logo      = $file->hashName();
            }
            Majors::create([
                'name'      => $request->name,
                'akronim'   => $request->akronim,
                'desc'    => $request->desc,
                'logo'    => $logo,
                'video'    => $request->video,
            ]);
            return redirect('majors')->with('success', 'Berhasil menambah data!');
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
        $data = Majors::where('id', $id)->first();

        $title = 'Edit data Jurusan / Program Studi';
        return view('pages.backoffice.majors.form', compact('data', 'title'));
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
            'akronim' => 'required',
            'logo'     => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'video'     => 'nullable|video|mimes:mp4,3gp,mkv',
            'desc' => 'required',
        ]);
        try {
            $logo = null;
            if($request->logo != null){
                $file = $request->file('logo');
                $file->storeAs('public/majors/', $file->hashName());
                $logo      = $file->hashName();
            }


            Majors::find($id)->update([
                'name'      => $request->name,
                'akronim'   => $request->akronim,
                'desc'      => $request->desc,
                'logo'      => $logo,
                'video'     => $request->video,
            ]);
            return redirect('majors')->with('success', 'Berhasil mengubah data!');
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
            Majors::find($id)->delete();
            return redirect('majors')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
