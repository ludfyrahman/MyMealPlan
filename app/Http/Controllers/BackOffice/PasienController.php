<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Consultation;
use App\Models\SubCategory;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::all();
        $title = 'List Pasien';
        $var = 'pasien';
        return view('pages.backoffice.pasien.index', compact('data', 'title', 'var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[
            'nama'      => '',
            'no_rm'   => '',
            'tb'   => '',
            'bb'   => '',
            'umur'   => '',
            'riwayat_penyakit'   => '',
            'type' => 'create',
            'jenis_diet' =>'',
            'jumlah_kalori' =>'',
            'jumlah_protein' =>'',
            'jumlah_lemak' =>'',
            'jumlah_karbohidrat' =>'',
        ];
        $var = 'pasien';
        $title = 'Tambah Pasien';
        return view('pages.backoffice.pasien.form', compact('data', 'title', 'var'));
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
            'nama'      => 'required',
            'no_rm'      => 'required',
            'tb'      => 'required',
            'bb'      => 'required',
            'umur'      => 'required',
            'jenis_diet'      => 'required',
            'jumlah_kalori'      => 'required',
            'jumlah_protein'      => 'required',
            'jumlah_lemak'      => 'required',
            'jumlah_karbohidrat'      => 'required',
            'riwayat_penyakit'      => 'required',
        ]);
        try {
            Pasien::create([
                'nama'      => $request->nama,
                'no_rm'      => $request->no_rm,
                'tb'      => $request->tb,
                'bb'      => $request->bb,
                'jenis_diet'      => $request->jenis_diet,
                'jumlah_kalori'      => $request->jumlah_kalori,
                'jumlah_protein'      => $request->jumlah_protein,
                'jumlah_lemak'      => $request->jumlah_lemak,
                'jumlah_karbohidrat'      => $request->jumlah_karbohidrat,
                'umur'      => $request->umur,
                'riwayat_penyakit'      => $request->riwayat_penyakit,
            ]);
            return redirect('pasien')->with('success', 'Berhasil menambah data!');
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
        $data = Pasien::find($id);
        $detail = Consultation::where('pasien_id', $id)->get();
        $title = 'Data Konsultasi Pasien '.$data->nama;
        $var = 'consultation';
        return view('pages.backoffice.pasien.show', compact('data', 'title', 'var', 'id', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pasien::where('id', $id)->first();
        $title = 'Edit data Pasien';
        $var = 'pasien';
        return view('pages.backoffice.pasien.form', compact('data', 'title', 'var'));
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
            'nama'      => 'required',
            'no_rm'      => 'required',
            'tb'      => 'required',
            'bb'      => 'required',
            'umur'      => 'required',
            'jenis_diet'      => 'required',
            'jumlah_kalori'      => 'required',
            'jumlah_protein'      => 'required',
            'jumlah_lemak'      => 'required',
            'jumlah_karbohidrat'      => 'required',
            'riwayat_penyakit'      => 'required',
        ]);
        try {
            $data = Pasien::find($id);
            $data->nama = $request->nama;
            $data->umur = $request->umur;
            $data->no_rm = $request->no_rm;
            $data->jenis_diet = $request->jenis_diet;
            $data->jumlah_kalori = $request->jumlah_kalori;
            $data->jumlah_protein = $request->jumlah_protein;
            $data->jumlah_lemak = $request->jumlah_lemak;
            $data->jumlah_karbohidrat = $request->jumlah_karbohidrat;
            $data->tb = $request->tb;
            $data->bb = $request->bb;
            $data->riwayat_penyakit = $request->riwayat_penyakit;
            $data->save();
            return redirect('pasien')->with('success', 'Berhasil mengubah data!');
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
            Pasien::find($id)->delete();
            return redirect('pasien')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
}
