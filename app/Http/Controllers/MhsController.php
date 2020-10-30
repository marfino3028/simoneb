<?php

namespace App\Http\Controllers;

use PDF;
use App\Mhs;
use App\Semester;
use Illuminate\Http\Request;
use Livewire\Component;
class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mhs::all();
        return view('livewire.mhs.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('livewire.mhs.register');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mhs::find($id);
        $fill = \DB::table('mhs')
        ->select('mhs.*','semester.*')
        ->join('semester','semester.id','=','mhs.semester_id')
        ->where('semester.id', $id)->pluck('tahun','ipk','ips');
        return view('livewire.mhs.edit',['mhs'=>$mhs,'fill'=>$fill]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs= Mhs::find($id);
        return view('livewire.mhs.indexId',compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
           
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        // nama file
        $nama_file = time() . "_" . $file->getClientOriginalName();
//        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/images/mhs';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Mhs::create([
            'foto' => $nama_file,
            'nama' => $request->nama,
            'angkatan'=>$request->angkatan,
            'nim'=>$request->nim,
            'beasiswa'=>$request->beasiswa,
            'hp'=>$request->hp,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'semester_id'=>$request->semester_id,
            'password'=>$request->password,
            'nilai_id'=>$request->nilai_id,
            'ipk'=>$request->ipk,
            'ips'=>$request->ips,
            'tahun'=>$request->tahun,
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
        $mhs = Mhs::find($id);
        $mhs->nama= $request->get('nama');
        $mhs->foto= $request->get('foto');
        $mhs->beasiswa= $request->get('beasiswa');
        $mhs->alamat= $request->get('alamat');
        $mhs->semester_id= $request->get('semester_id');
        $mhs->email= $request->get('email');
        $mhs->hp= $request->get('hp');
        $mhs->angkatan= $request->get('angkatan');
        $mhs->nim= $request->get('nim');
        $mhs->nilai_id = $request->get('nilai_id');
        $mhs->save();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = Mhs::find($id);
        $mhs->delete();
        return redirect()->back();
    }
    public function printMhs()
    {
        $mhs = DB::table('mhs')
        ->select('mhs.*','semester.*','nilai.*')
        ->join('semester','semester.id','=','mhs.semester_id')
        ->join('nilai','nilai.id','=','mhs.nilai_id')
        ->get();
        $pdf = PDF::loadview('livewire.mhs.indexId',compact('mhs'));
        $pdf->download('mhsPdf');
    }
}
