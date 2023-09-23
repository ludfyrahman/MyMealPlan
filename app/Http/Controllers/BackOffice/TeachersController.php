<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teachers;
use App\Models\Type;
use App\Models\Unit;

class TeachersController extends Controller
{
    public function index()
    {
        $data = Teachers::all();
        $title = 'List Data Guru';
        return view('pages.backoffice.teachers.index', compact('data', 'title'));
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
            'nip'   => '',
            'photo'   => '',
            'phone'   => '',
            'address'   => '',
            'type' => 'create'
        ];
        $title = 'Tambah Data Guru';
        return view('pages.backoffice.teachers.form', compact('data', 'title'));
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
            'name' => 'required',
            'nip' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $foto = null;
            if($request->photo != null){
                $file = $request->file('photo');
                $file->storeAs('public/teacher/', $file->hashName());
                $foto      = $file->hashName();
            }
            Teachers::create([
                'name'      => $request->name,
                'nip'   => $request->nip,
                'address'    => $request->address,
                'phone'    => $request->phone,
                'photo'    => $foto,
            ]);
            return redirect('teachers')->with('success', 'Berhasil menambah data!');
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
        $data = Teachers::where('id', $id)->first();
        $title = 'Edit data guru';
        return view('pages.backoffice.teachers.form', compact('data', 'title'));
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
            'nip' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $teachers = Teachers::find($id);
            $foto = $teachers->photo;
            if($request->photo != null){
                $file = $request->file('photo');
                $file->storeAs('public/teachers/', $file->hashName());
                $foto      = $file->hashName();
            }
            Teachers::find($id)->update([
                'name'      => $request->name,
                'nip'   => $request->nip,
                'address'    => $request->address,
                'phone'    => $request->phone,
                'photo'    => $foto,
            ]);
            return redirect('teachers')->with('success', 'Berhasil mengubah data!');
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
            Teachers::find($id)->delete();
            return redirect('teachers')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
