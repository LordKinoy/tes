<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen bg-black">
<div class="navbar bg-transparent shadow-2xl">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl text-white">INVENTARIS</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal p-0">
      <li><a href="/gudang/"><button class="btn text-white">LIST LOKASI</button></a></li>
      <li tabindex="0">
        <a>
          Parent
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </a>
        <ul class="p-2 bg-base-100">
          <li><a>Submenu 1</a></li>
          <li><a>Submenu 2</a></li>
        </ul>
      </li>
      <li><a>Item 3</a></li>
    </ul>
  </div>
</div>

<hr>

<div class="bg-transparent overflow-x-auto pt-3">
    <h1 class="text-center text-white text-3xl mb-4">FORM TAMBAH LOKASI</h1>
</div>
<p>
<div class="w-full">
<div class="text-center bg-gray-400 p-4 w-min m-auto rounded-lg">
<form method="POST" action="store">
    @csrf
    <label class="text-black my-2 text-sm font-medium">NAMA LOKASI</label>
    <br>
    <input class="my-2 w-64 h-8 border border-md border-black rounded-md text-black text-center" type="text" name="nama_lokasi" />
    <br>
    <label class="text-black my-2 text-sm font-medium">PENANGGUNG JAWAB</label>
    <br>
    <input class="my-2 w-64 h-8 border border-md border-black rounded-md text-black text-center" type="text" name="penanggung_jawab" />
    <br>
    <label class="text-black my-2 text-sm font-medium">KETERANGAN</label>
    <br>
    <textarea class="my-2 border border-md border-black rounded-md text-black text-center" name="keterangan" cols="32" rows="7"></textarea>
    <br>
    <button class="btn bg-black text-white" type="submit" value="Simpan">TAMBAH</button>
</form>
</div>
</div>
</body>
</html>

