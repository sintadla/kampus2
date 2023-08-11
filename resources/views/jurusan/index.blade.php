<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kampus</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD Tabel Jurusan</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="container mt-5">
                @if (session('access_denied'))
                <div class="alert alert-danger" role="alert">
                    {{ session('access_denied')}}
                </div>

                @endif
                <div class="d-grid gap-2">
                    <a href="{{ route('dosen.create') }}" class="btn btn-outline-primary"> Tambah Data
                                                <i class="fas fa-plus-square"></i></a>
                </div>
                       @if ($pesan = session('berhasil'))
                     <div class="alert alert-primary" role="alert">
                         {{ $pesan }}
                     </div>
                 @endif
         <table class="table">
             <thead>
                 <tr>
             <th scope="col">Id</th>
            <th scope="col">Fakultas</th>
            <th scope="col">Aksi</th>
                </tr>
                    @foreach ($jurusan as $item)
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->fakultas }}</td>
                    <td>
            <a href= "{{route( 'jurusan.edit', $item->id) }}" class="btn btn-primary">EDIT</a>

                    <form action="{{route('jurusan.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                    </td>
                 </tr>
                 @endforeach
                <tbody>
            </table>

            <div class="d-grid gap-2">
                <a href="{{ route('jurusan.index') }}" class="btn btn-outline-info"> Tabel Lain
               </a>


            <div class="d-grid gap-2">
                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-danger btn">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                </div>
            </div>
            </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </div>


</body>

</html>
