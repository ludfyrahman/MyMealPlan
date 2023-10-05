<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Pasien;
use App\Models\Consultation;
use App\Models\User;

class ConsultationController extends Controller
{
    public function index()
    {
        $data = Consultation::all();
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
            'pasien_id'     => $id,
            'user_id'       => '',
            'description'   => '',
            'type'          => 'create'
        ];
        $var = 'consultation';
        $title = 'Tambah Konsultasi';
        $pasien = Pasien::all();
        $konselor = User::all();
        return view('pages.backoffice.consultation.form', compact('data','pasien','konselor', 'title', 'var', 'id'));
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
            'pasien_id'      => 'required',
            'user_id'      => 'required',
            'description'      => 'required',
        ]);
        $id = $request->id;
        try {
            Consultation::create([
                'pasien_id'      => $request->pasien_id,
                'user_id'        => $request->user_id,
                'description'        => $request->description,
            ]);
            return redirect('pasien/'. $id)->with('success', 'Berhasil menambah data!');
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
        $data = Category::where('id', $id)->first();
        $title = 'Edit data Category';
        $var_id = $request->id;
        $var = 'category';
        return view('pages.backoffice.sub_category.form', compact('data', 'title', 'var','var_id'));
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
        try {
            $data = Category::find($id);
            $data->name = $request->name;
            $data->save();
            return redirect('sub_category')->with('success', 'Berhasil mengubah data!');
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
            Consultation::find($id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
