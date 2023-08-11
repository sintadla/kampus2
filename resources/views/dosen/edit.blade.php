<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kampus</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

            <div class="container mt-5">
                <h3>Edit Data klinik</h3>
                                <form action="{{ route('dosen.update', $dosen->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">ID</label>

                                            <input value="{{ old('id', $dosen->id) }}" name="id" type="text" class="form-control @error('id') is-invalid @enderror">
                                            @error('id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama dosen</label>
                                            <input value="{{ old('nama_dosen', $dosen->nama_dosen) }}" name="nama_dosen" type="text" class="form-control @error('nama_dosen') is-invalid @enderror">
                                            @error('nama_dosen')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="">Pilih</option>
                                                <option @selected(old('jenis_kelamin', $dosen->jenis_kelamin) == 'Laki-Laki') value="Laki-Laki">Laki-Laki</option>
                                                <option @selected(old('jenis_kelamin', $dosen->jenis_kelamin) == 'Perempuan') value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input value="{{ old('nomor_telepon', $dosen->nomor_telepon) }}" name="nomor_telepon" type="text" class="form-control @error('nomor_telepon') is-invalid @enderror">
                                        @error('nomor_telepon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                        <div class="mb-3">
                                            <label class="form-label">Jurusan</label>
                                            <select name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror">
                                                <option value="">Pilih</option>
                                                @foreach ($jurusan as $jurusan)
                                                <option @selected(old('jurusan_id', $dosen->jurusan_id) == $jurusan->id)value="{{ $jurusan->id }}" >{{ $jurusan->fakultas }}</option>
                                                    {{-- <option @selected value="{{ $jurusan->id }}">{{ $jurusan->fakultas }}</option> --}}
                                                @endforeach
                                            </select>
                                            @error('jurusan_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                <tbody>
                                    </table>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
