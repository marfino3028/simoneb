<div class="rounded border-4 p-10 m-5">
<form class="w-full max-w-lg">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
     <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="name" class="p-2 rounded border shadow-sm w-full" wire:model="form.name"
                        placeholder="Name" />
                    @error('form.name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" placeholder="Email"
                        wire:model="form.email" />
                    @error('form.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="number" class="p-2 rounded border shadow-sm w-full" placeholder="masukkan NIM"
                        wire:model="form.nim" />
                    @error('form.nim') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="2018/2019"
                        wire:model="form.angkatan" />
                    @error('form.angkatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Masukkan Alamat"
                        wire:model="form.alamat" />
                    @error('form.angkatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="number" class="p-2 rounded border shadow-sm w-full" placeholder="+62 "
                        wire:model="form.hp" />
                    @error('form.hp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Masukkan Beasiswa"
                        wire:model="form.beasiswa" />
                    @error('form.beasiswa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            </div>
  <div class="container">
    <h4>Menampilkan Data pada form berdasarkan pilihan Combo Box di PHP</h4>
    <!-- <form action="" method="get"> -->
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
        <div class="form-group">
            <label for="sel1">Pilih Semester:</label>
            <select class="form-control" name="semester">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-info" value="Pilih">
        </div>
    </form>
    <h2>Input Nilai</h2>


        <div class="form-group">
            <label>IPK:</label>
            <input type="text" name="nik" value="<?php echo $data['nik']; ?>" class="form-control" required />
        </div>
        <div class="form-group">
            <label>IPS:</label>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control"  required/>
        </div>

        <div class="form-group">
            <label>Tahun:</label>
            <input type="date" name="tahun" value="" class="form-control" required/>
        </div>
</div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Zip
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
    </div>
  </div>
  <div> 
    <button wire:click.prevent="update()" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Update</button>  
    <button wire:click.prevent="cancel()" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Cancel</button>      
 </div>
</form>
</div>