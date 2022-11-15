<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen bg-black">
<div class="navbar bg-base shadow-2xl">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl text-white">INVENTARIS</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal p-0">
      <li><a href="/gudang/tambah"><button class="btn">Tambah Lokasi</button></a></li>
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
      <li><a href="logout"><btn class="btn btn-warning">Logout</btn></a></li>
    </ul>
  </div>
</div>

<hr>

<div class="bg-base overflow-x-auto pt-3">
    <h1 class="text-center text-white text-3xl mb-4">LIST LOKASI</h1>
<p>
<div class="form-control">
  <div class="input-group text-center">
    <form action="/gudang">
    <input type="text" name="search" placeholder="Search…" class="input input-bordered" value="{{request('search')}}"/>
    <button type="submit" class="btn btn-square">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
    </button>
    </form>
  </div>
</div>
<div class="bg-base w-2/3 m-auto">
<table class="bg-gray-500 table-compact w-full m-auto text-black font-sans rounded-md">
    <tr class="text-center border-spacing-1 border-black">
        <th class="table-auto border-spacing-1 border-black">NO</th>
        <th class="table-auto border-spacing-1 border-black">LOKASI GUDANG</th>
        <th class="table-auto border-spacing-1 border-black">PENANGGUNG JAWAB</th>
        <th class="table-auto border-spacing-1 border-black">KETERANGAN</th>
        <th class="table-auto border-spacing-1 border-black">AKSI</th>
    </tr>
    <?php $i=1; ?>
    @foreach ($lokasi as $key => $tempat)
    <tr class="text-center">
        <td class="table-auto">{{$lokasi->firstItem() + $key}}</td>
        <td class="table-auto">{{$tempat -> nama_lokasi}}</td>
        <td class="table-auto">{{$tempat -> penanggung_jawab}}</td>
        <td class="table-auto">{{$tempat -> keterangan}}</td>
        <td class="table-auto text-center">
            <a href="/gudang/edit/{{$tempat->id_lokasi}}"><button class="btn bg-green-500 text-white">EDIT</button></a>
            <a href="/gudang/delete/{{$tempat->id_lokasi}}"><button class="btn bg-red-600 text-white">HAPUS</button></a>
        </td>
    </tr>
    @endforeach
</table>
<br>
<br>
{{ $lokasi->links() }}
</div>
</div>
</body>
</html>