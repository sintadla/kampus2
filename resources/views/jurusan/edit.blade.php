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

    <div class="container mt-5">
                     <h3>Edit Data jurusan</h3>
                                  <form action="{{ route('jurusan.update', $jurusan->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">ID</label>

                                            <input value="{{ old('id', $jurusan->id) }}" name="id" type="text" class="form-control @error('id') is-invalid @enderror">
                                            @error('id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fakultas</label>

                                            <input value="{{ old('fakultas', $jurusan->fakultas) }}" name="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror">
                                            @error('fakultas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                    </form>
                                </div>
                                <tbody>
                                    </table>

</body>
</html>
