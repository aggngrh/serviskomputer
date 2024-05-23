
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container-sm">
        <div class="col-md-12">
        <h2 class="text-center">Data Pegawai</h2>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">TAMBAH</a>
        <table class="table table-stripped" id="table-1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pegawai</th>
                    <th>Nama pegawai</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataPegawai as $index => $pegawai)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{ $pegawai->id_pegawai }}</td>
                        <td>{{ $pegawai->nama_pegawai }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->jenis_kelamin }}</td>
                        <td>{{ $pegawai->jabatan }}</td>
                        <td>{{ $pegawai->status }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('customer.destroy', $pegawai->id_pegawai) }}" method="POST">
                                <a href="{{ route('customer.show', $pegawai->id_pegawai) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('customer.edit', $pegawai->id_pegawai) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data User Belum Ada.
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


