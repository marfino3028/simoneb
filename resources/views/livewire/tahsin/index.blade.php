    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="rounded border-4 p-10 m-5">
<form class="w-full max-w-lg" action="/upload/proses" method="POST" enctype="multipart/form-data">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
     <input type="hidden" wire:model="id">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        No. SK
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-no_sk" wire:model="no_sk" type="text" placeholder="Masukkan No SK">
      @error('no_sk') <p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror

    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Nilai
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="nilai" id="grid-nilai" type="number" placeholder="Masukkan Nilai">
            @error('nilai') <p class="text-red-500 text-xs italic">{{ $message }}</p>@enderror
    </div>
  </div>
    </div>
  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Level Lulus
      </label>
      <div class="relative">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Semester
      </label>
      <div class="relative">
        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Foto
      </label>
          @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                    @endforeach
                </div>
            @endif

                {{ csrf_field() }}

                <div class="form-group">
                    <b>File Gambar</b><br/>
                    <input type="file" name="file">
                </div>

            <h4 class="my-5">Data</h4>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="1%">Foto</th>
                    <th>No SK</th>
                    <th>Level</th>
                    <th>Nilai</th>
                    <th>Semester</th>
                    <th width="1%">OPSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tahsin as $g)
                    <tr>
                        <td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
                        <td>{{$g->no_sk}}</td>
                        <td>{{$g->level}}</td>
                        <td>{{$g->nilai}}</td>
                        <td>{{$g->semester}}</td>
                        <td><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
  </div>
  <div> 
    <button wire:click.prevent="store()" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" type="submit">Create</button>  
    <button wire:click.prevent="cancel()" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Cancel</button>      
 </div>
</form>
</div>