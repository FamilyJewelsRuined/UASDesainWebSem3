<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
        }

        .table-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Dashboard, {{ Auth::user()->name }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pendaftaran Umroh -->
        <div class="form-container">
            <h2>Form Pendaftaran Umroh</h2>
            <form action="{{route('dashboard.create')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="jamaah_id">Jamaah</label>
                    <input type="text" name="jamaah_id" id="jamaah_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paket_id">Package</label>
                    <select name="paket_id" id="paket_id" class="form-control" required>
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->nama_paket }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_daftar">Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required>
                </div>
                
<div class="form-group">
    <label for="metode_pembayaran">Metode Pembayaran</label>
    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="Kartu Kredit">Kartu Kredit</option>
        <option value="Tunai">Tunai</option>
    </select>
</div>



                <button type="submit" class="btn btn-primary mt-3">Daftar</button>
            </form>
        </div>

        <!-- Daftar Pendaftaran -->
        <div class="table-container">
            <h2>Daftar Pendaftaran Umroh</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jamaah</th>
                        <th>Package</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registrations as $index => $registration)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $registration->jamaah->nama ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $registration->jadwalKeberangkatan->paketUmroh->nama_paket ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $registration->tanggal_daftar }}</td>
                            <td>{{ $registration->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada pendaftaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
