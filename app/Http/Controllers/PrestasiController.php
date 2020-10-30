<?php

namespace App\Http\Controllers;

use PDF;
use App\Prestasi;
use Illuminate\Http\Request;
use Livewire\Component;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('livewire.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestasi = new Prestasi([
            'peringkat' => $request->get('peringkat'),
            'level' => $request->get('level'),
            'nama' => $request->get('nama'),
            'foto' => $request->get('foto'),
            'semester_id' => $request->get('semester_id'),
            'penyelenggara_prestasi' => $request->get('penyelenggara_prestasi'),

        ]);
        $prestasi->save();
        return redirect('prestasi')->with('success', 'Data berhasil ditambah');
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
        return view('livewire.prestasi.indexId', compact('prestasi'));
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
        $tujuan_upload = '/public/images/prestasi';
        $file->move($tujuan_upload, $nama_file);

        // upload file
        //        $file->move($tujuan_upload, $file->getClientOriginalName());
        Prestasi::create([
            'foto' => $nama_file,
            'peringkat'=>$request->peringkat,
            'level'=>$request->level,
            'nama'=>$request->nama,
            'semester_id'=>$request->semester_id,
            'penyelenggara_peringkat'=>$request->penyelenggara_peringkat
            
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
        $prestasi = Prestasi::find($id);
        $prestasi->nama = $request->get('nama');
        $prestasi->level = $request->get('level');
        $prestasi->semester_id = $request->get('semester_id');
        $prestasi->penyelenggara_prestasi = $request->get('penyelenggata_prestasi');
        $prestasi->foto = $request->get('foto');
        $prestasi->save();
        return redirect('prestasi')->with('success', 'Data berhasil diubah');
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
        return redirect('prestasi')->with('success', 'Data berhasil dihapus');
    }
    public function printPrestasi()
    {
        $prestasi = DB::table('prestasi')
        ->select('prestasi.*','semester.*')
        ->join('semester','semester.id','=','prestasi.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.prestasi.indexId',compact('prestasi'));
        $pdf->download('prestasiPdf');
    }
}
