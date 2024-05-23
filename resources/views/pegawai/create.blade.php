<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tambah Pegawai</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pegawai.store') }}" method="POST"  >
                            @csrf

                            <div class="form-group">
                                <label for="namaCustomer">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control" id="namaCustomer" placeholder="Masukkan nama pengguna">
                                @error('nama_pegawai')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat pengguna">
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                                  <option value="L">Laki-laki</option>
                                  <option value="P">Perempuan</option>
                                 </select>
                                 @error('jenis_kelamin')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                                 @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Jabatan</label>
                                <select class="form-control" name="jabatan" id="exampleFormControlSelect1">
                                    <option value="Teknisi">Teknisi</option>
                                    <option value="Admin">Admin</option>
                                    <option value="SPV">SPV</option>
                                   </select>
                                   @error('jabatan')
                                   <div class="alert alert-danger mt-2">
                                       {{ $message }}
                                   </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                  <option value="Aktif">Aktif</option>
                                  <option value="Tidak Aktif">Tidak Aktif</option>
                                 </select>
                                 @error('status')
                                 <div class="alert alert-danger mt-2">
                                     {{ $message }}
                                 </div>
                                 @enderror
                              </div>
                                <br/>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                          </form>


                        {{-- {{ $pegawai->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


