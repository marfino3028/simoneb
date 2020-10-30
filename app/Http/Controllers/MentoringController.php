<?php

namespace App\Http\Controllers;

use App\Mentoring;
use Illuminate\Http\Request;
use Livewire\Component;
class MentoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentoring = Mentoring::all();
        return view('livewire.mentoring.index',compact('mentoring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.mentoring.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mentoring = new Mentoring ([
            'foto'=>$request->get('foto'),
            'jml_kehadiran'=>$request->get('jml_kehadiran'),
            'persen'=>$request->get('persen'),
            'jml_pertemuan'=>$request->get('jml_pertemuan'),
            'semester_id'=>$request->get('semester_id'),
        ]);
        $mentoring->save();
        return redirect('karya')->with('success','Data berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentoring = Mentoring::find($id);
        return view('livewire.mentoring.indexId',compact('mentoring'));
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
        $tujuan_upload = 'public/images/mentoring';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Mentoring::create([
            'foto' => $nama_file,
            'jml_kehadiran' => $request->jml_kehadiran,
            'persen'=>$request->persen,
            'semester_id'=>$request->semester_id,
            'jml_pertemuan'=>$request->jml_pertemuan,
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
        $mentoring = Mentoring::find($id);
        $mentoring->foto=$request->get('foto');
        $mentoring->jml_kehadiran=$request->get('jml_kehadiran');
        $mentoring->jml_pertemuan=$request->get('jml_pertemuan');
        $mentoring->persen=$request->get('persen');
        $mentoring->semester_id=$request->get('semester_id');
        $mentoring->save();
        return redirect('mentoring')->with('success','Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentoring = Mentoring::find($id);
        $mentoring->delete();
        return redirect('mentoring')->with('success','Data berhasil dihapus');
    }
    public function printMentoringPdf()
    {
        $mentoring = DB::table('mentoring')
        ->select('mentoring.*','semester.*')
        ->join('semester','semester.id','=','mentoring.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.mentoring.indexId',compact('mentoring'));
        $pdf->download('MentoringPdf');
    }
}
