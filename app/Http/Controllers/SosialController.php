<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sosial;
use Livewire\Component;

use function Ramsey\Uuid\v1;

class SosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosial = Sosial::all();
        return view('livewire.sosial.index',compact('sosial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.sosial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sosial = new Sosial([
            'tgl'=>$request->get('tgl'),
            'nama'=>$request->get('nama'),
            'foto'=>$request->get('foto'),
            'penyelenggara_sosial'=>$request->get('penyelenggara_sosial'),
            'semester_id'=>$request->get('semester_id'),
        ]);
        $sosial->save();
        return redirect('sosial')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sosial = Sosial::find($id);
        return view('livewire.sosial.indexId',compact('sosial'));
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
            
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        // nama file
        $nama_file = time() . "_" . $file->getClientOriginalName();
//        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = '/public/images/sosial';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Sosial::create([
            'foto' => $nama_file,
            'nama' => $request->nama,
            'tgl'  => $request->tgl,
            'penyelenggara_sosial'=>$request->penyelenggara_sosial,
            'semester_id'=>$request->semester_id,
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
        $sosial = Sosial::find($id);
        $sosial->nama=$request->get('nama');
        $sosial->foto=$request->get('foto');
        $sosial->semester_id=$request->get('semester_id');
        $sosial->penyelengara_sosial=$request->get('penyelenggara_sosial');
        $sosial->tgl=$request->get('tgl');
        $sosial->save();
        return redirect('sosial')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sosial = Sosial::find($id);
        $sosial->delete();
        return redirect('sosial')->with('success','Data berhasil dihapus');
    }
    public function printSosial()
    {
        $sosial = DB::table('sosial')
        ->select('sosial.*','semester.*')
        ->join('semester','semester.id','=','sosial.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.sosial.indexId',compact('sosial'));
        $pdf->download('sosialPdf');
    }
}
