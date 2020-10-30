<?php

namespace App\Http\Controllers;
use PDF;
use App\Karya;
use Illuminate\Http\Request;
use Livewire\Component;

use function Ramsey\Uuid\v1;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karya = Karya::all();
        return view('livewwire.karya.index',compact('karya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.karya.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karya = new Karya([
             'nama'=>$request->get('nama'),
             'tgl'=>$request->get('tgl'),
             'foto'=>$request->get('foto'),
             'judul'=>$request->get('judul'),
             'media'=>$request->get('media'),
             'judul'=>$request->get('judul'),
             'link'=>$request->get('link'),
             'semester_id'=>$request->get('semester_id'),
                     ]);
        $karya->save();
        return redirect('karya')->with('successs','Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karya=Karya::find($id);
        return view('livewire.karya.indexId',compact('karya'));
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
        $tujuan_upload = '/public/images/karya';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Karya::create([
            'foto' => $nama_file,
            'media' => $request->keterangan,
            'semester_id'=>$request->semester_id,
            'nama'=>$request->nama,
            'judul'=>$request->judul,
            'tgl'=>$request->tgl,
            'link'=>$request->link,
            
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
        $karya = Karya::find($id);
        $karya->nama=$request->get('nama');
        $karya->tgl=$request->get('tgl');
        $karya->judul=$request->get('judul');
        $karya->media=$request->get('media');
        $karya->link=$request->get('link');
        $karya->foto=$request->get('foto');
        $karya->semester_id=$request->get('semester_id');
        $karya->save();
        return redirect('karya')->with('success','Data Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karya = Karya::find($id);
        $karya->delete();
        return redirect('karya')->with('success','Data Berhasil di hapus');
    }
    public function printKaryaPdf()
    {
        $karya = DB::table('karya')
        ->select('karya.*','semester.*')
        ->join('semester','semester.id','=','karya.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.karya.indexId',['karya'=>$karya]);
        return $pdf->download('DownloadKaryaPdf');
    }
}
