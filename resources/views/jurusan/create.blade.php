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
                       <h3>Create Data jurusan</h3>
                                  <form action="{{ route('jurusan.store') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                      <label class="form-label">ID</label>
                                            <input type="number" id="id" name="id" class="form-control @error('id') is-invalid  @enderror"
                                                placeholder="ID">
                                                @error('id')
                                                <div class="invalid-feedback">{{ $message}}</div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fakultas</label>
                                            <input value="{{ old('fakultas') }}" name="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror">
                                            @error('fakultas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Simpan Data</button>
                                        </div>
                                    </form>
                                </div>

                                <tbody>
                                    </table>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
