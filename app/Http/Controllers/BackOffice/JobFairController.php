<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobFair;

class JobFairController extends Controller
{
    public function index()
    {
        $data = JobFair::all();
        $title = 'List Bursa';
        return view('pages.backoffice.jobfair.index', compact('data', 'title'));
    }

    /**\
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[
            'name'      => '',
            'photo'   => '',
            'desc'   => '',
            'link'   => '',
            'type' => 'create'
        ];
        $title = 'Tambah Bursa';
        return view('pages.backoffice.jobfair.form', compact('data', 'title'));
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
            'desc'      => 'required',
            'link'      => 'required|url',
            'photo'     => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $photo = null;
            $file = $request->file('photo');
            $file->storeAs('public/jobfair/', $file->hashName());
            $photo      = $file->hashName();
            JobFair::create([
                'name'   => $request->name,
                'photo'  => $photo,
                'desc'   => $request->desc,
                'link'   => $request->link,
            ]);
            return redirect('jobFair')->with('success', 'Berhasil menambah data!');
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
        $data = JobFair::where('id', $id)->first();

        $title = 'Edit Bursa';
        return view('pages.backoffice.jobfair.form', compact('data', 'title'));
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
            'desc'      => 'required',
            'link'      => 'required|url',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $photo = null;
            if($request->photo != null){
                $file = $request->file('photo');
                $file->storeAs('public/jobfair/', $file->hashName());
                $photo      = $file->hashName();
            }
            JobFair::find($id)->update([
                'name'   => $request->name,
                'photo'  => $photo,
                'desc'   => $request->desc,
                'link'   => $request->link,
            ]);
            return redirect('jobFair')->with('success', 'Berhasil mengubah data!');
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
            JobFair::find($id)->delete();
            return redirect('jobFair')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
