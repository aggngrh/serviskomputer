
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
        <h2 class="text-center">Data Customer</h2>
        <a href="{{ route('customer.create') }}" class="btn btn-primary">TAMBAH</a>
        <table class="table table-stripped" id="table-1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Customer</th>
                    <th>Nama Customer</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataCustomer as $index => $customer)
                    <tr>
                        <td class="text-center">
                            {{ ++$index }}
                        </td>
                        <td>{{ $customer->id_customer }}</td>
                        <td>{{ $customer->nama_customer }}</td>
                        <td>{{ $customer->alamat }}</td>
                        <td>{{ $customer->jenis_kelamin }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('customer.destroy', $customer->id_customer) }}" method="POST">
                                <a href="{{ route('customer.show', $customer->id_customer) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('customer.edit', $customer->id_customer) }}" class="btn btn-sm btn-primary">EDIT</a>
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


