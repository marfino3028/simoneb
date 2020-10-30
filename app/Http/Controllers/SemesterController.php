<?php

namespace App\Http\Controllers;

use App\Prestasi;
use App\Semester;
use Illuminate\Http\Request;
use Livewire\Component;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();
        return view('livewire.semester.index',compact('semester'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('liveware.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester = new Semester([
            'semester'=>$request->get('semester'),
            'ipk'=>$request->get('ipk'),
            'ips'=>$request->get('ips'),
        ]);
        $semester->save();
        return redirect('semester')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = Prestasi::find($id);
        return view('livewire.semester.indexId',compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = Prestasi::find($id);
        return view('editPrestasi',compact('prestasi'));
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
        $prestasi = Prestasi::find($id);
        $prestasi->semester=$request->get('semester');
        $prestasi->ipk=$request->get('ipk');
        $prestasi->ips=$request->get('ips');
        $prestasi->save();
        return redirect('prestasi')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();
        return redirect('prestasi')->with('sucess','Data berhasil dihapus');
    }
}
