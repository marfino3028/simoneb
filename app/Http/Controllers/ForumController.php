<?php

namespace App\Http\Controllers;

use App\Forum;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function Ramsey\Uuid\v1;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = Forum::all();
        return view('livewire.forum.index',compact('forum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $forum = new Forum([
           'nama'=>$request->get('nama'),
           'tgl'=>$request->get('foto'),
           'foto'=>$request->get('tgl'),
           'semester_id'=>$request->get('semester_id'),
       ]);
        $forum->save();
        return redirect('forum')->with('success','Forum has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum =  Forum::find($id);
        return view('livewire.forum.indexId',compact('forum'));
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
        $tujuan_upload = '/public/images/forum';
        $file->move($tujuan_upload, $nama_file);

        // upload file
//        $file->move($tujuan_upload, $file->getClientOriginalName());
        Forum::create([
            'foto' => $nama_file,
            'nama' => $request->nama,
            'tgl' => $request->tgl,
            'semester_id' => $request->semester_id,
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
        $forum = Forum::find($id);
        $forum->nama=$request->get('nama');
        $forum->tgl=$request->get('foto');
        $forum->foto=$request->get('tgl');
        $forum->semester_id=$request->session()->getId();
        $forum->save();
        return redirect('forum')->with('success','Forum has been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->delete();
        return redirect('forum')->with('success','Forum has been deleted');
    }
    public function printPdf()
    {
        $forum = DB::table('forum')
        ->select('forum.*','semester.*')
        ->join('semester','semester.id','=','forum.semester_id')
        ->get();
        $pdf = PDF::loadview('livewire.forum.indexId',['forum'=>$forum]);
        return $pdf->download('forum_download.pdf');
    }
}