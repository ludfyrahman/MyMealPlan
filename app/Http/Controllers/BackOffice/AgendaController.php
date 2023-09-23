<?php

namespace App\Http\Controllers\BackOffice;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Type;
use App\Models\Unit;

class AgendaController extends Controller
{
    public function index()
    {
        $data = Agenda::all();
        $title = 'List Data Agenda';
        return view('pages.backoffice.agenda.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[
            'name'          => '',
            'location'      => '',
            'description'   => '',
            'date'          => '',
            'status'        => '',
            'type'          => 'create'
        ];
        $title = 'Tambah Data Agenda';
        return view('pages.backoffice.agenda.form', compact('data', 'title'));
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
            'name'          => 'required',
            'location'      => 'required',
            'description'   => 'required',
            'date'          => 'required|date_format:Y-m-d|before_or_equal:date',
            'status'        => 'required',
        ]);
        try {
            Agenda::create([
                'name'       => $request->name,
                'location'   => $request->location,
                'description'=> $request->description,
                'date'       => $request->date,
                'status'     => $request->status,
            ]);
            return redirect('agenda')->with('success', 'Berhasil menambah data!');
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
        $data = Agenda::where('id', $id)->first();
        $title = 'Edit Data Agenda';
        return view('pages.backoffice.agenda.form', compact('data', 'title'));
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
            'name'          => 'required',
            'location'      => 'required',
            'description'   => 'required',
            'date'          => 'required',
            'status'        => 'required',
        ]);
        try {
            Agenda::find($id)->update([
                'name'      => $request->name,
                'location'   => $request->location,
                'description'=> $request->description,
                'date'      => $request->date,
                'status'    => $request->status,
            ]);
            return redirect('agenda')->with('success', 'Berhasil mengubah data!');
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
            Agenda::find($id)->delete();
            return redirect('agenda')->with('success', 'Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menghapus data!' . $th->getMessage());
        }
    }
    
}
