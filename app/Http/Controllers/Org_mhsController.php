<?php

namespace App\Http\Controllers;

use PDF;
use App\Org_mhs;
use Illuminate\Http\Request;
use Livewire\Component;
class Org_mhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $org_mhs = Org_mhs::all();
        return view('livewire.org_mhs.index',compact('org_mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('liveware.org_mhs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $org_mhs =  new Org_mhs([
            'jabatan'=>$request->get('jabatan'),
            'foto'=>$request->get('foto'),
            'nama'=>$request->get('nama'),
            'semester_id'=>$request->get('semester_id'),
            'masa_jabatan'=>$request->get('masa_jabatan'),
        ]);
        $org_mhs->save();
        return redirect('org_mhs')->with('success','Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $org_mhs = Org_mhs::find($id);
        return view('livewire.org_mhs.indexId',compact('org_mhs'));
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
        $tujuan_upload = '/public/images/org_mhs';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Org_mhs::create([
            'foto' => $nama_file,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'masa_jabatan' => $request->masa_jabatan,
            'semester_id'=>$request->semester_id
        
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
        $org_mhs = Org_mhs::find($id);
        $org_mhs->nama =$request->get('nama');
        $org_mhs->jabatan =$request->get('jabatan');
        $org_mhs->masa_jabatan =$request->get('masa_jabatan');
        $org_mhs->foto =$request->get('foto');
        $org_mhs->semester_id =$request->get('semester_id');
        $org_mhs->save();
        return redirect('mhs')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $org_mhs = Org_mhs::find($id);
        $org_mhs-> delete();
        return redirect('mhs')->with('success','Data berhasil dihapus');
    }
    public function printMhs()
    {
        $org_mhs = DB::table('org_mhs')
        ->select('org_mhs.*','semester.*')
        ->join('semester','semester.id','=','org_mhs.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.org_mhs.indexId',['org_mhs'=>$org_mhs]);
        $pdf->download('infoPdf');
    }
}
