<?php

namespace App\Http\Controllers;

use App\Tahsin;
use Illuminate\Http\Request;
use Livewire\Component;
class TahsinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahsin = Tahsin::all();
        return view('livewire.tahsin.index',compact('tahsin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.tahsin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tahsin = new Tahsin([
            'level'=>$request->get('level'),
            'no_sk'=>$request->get('no_sk'),
            'foto'=>$request->get('foto'),
            'semester_id'=>$request->get('semester_id'),
        ]);
        $tahsin->save();
        return redirect('tahsin')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tahsin  = Tahsin::find($id);
        return view('livewire.tahsin.indexId',compact('tahsin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
             'semester_id'=> 'required',
            'level'=>'required',
            'no_sk'=>'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        // nama file
        $nama_file = time() . "_" . $file->getClientOriginalName();
//        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Tahsin::create([
            'foto' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
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
        $tahsin  = Tahsin::find($id);
        $tahsin->level = $request->get('level');
        $tahsin->no_sk = $request->get('no_sk');
        $tahsin->foto = $request->get('foto');
        $tahsin->semester_id = $request->get('semester_id');
        $tahsin->save();
        return redirect('tahsin')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahsin = Tahsin::find($id);
        $tahsin->delete();
        return redirect('tahsin')->with('success','Data berhasil dihapus');
    }
    public function printTahsin()
    {
        $tahsin = DB::table('tahsin')
        ->select('tahsin.*','semester.*')
        ->join('semester','semester.id','=','tahsin.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.tahsin.indexId',compact('tahsin'));
        $pdf->download('tahsinPdf');
    }
}
