<!DOCTYPE html>
<html>
<head>
    <title>Permintaan Pupuk</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .content p { margin: 5px 0; }
        img { max-width: 300px; margin-top: 10px; }
        .badge { padding: 2px 6px; border-radius: 4px; color: #fff; }
        .badge-pending { background-color: #ffc107; }
        .badge-approve { background-color: #28a745; }
        .badge-tolak { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="header">
        <h3>Detail Permintaan Pupuk</h3>
    </div>
    <div class="content">
        <p><strong>Lahan:</strong> {{ $pupuk->lahan->nama_lahan }}</p>
        <p><strong>Jenis Pupuk:</strong> {{ $pupuk->jenis_pupuk }}</p>
        <p><strong>Jumlah:</strong> {{ $pupuk->jumlah }} Kg</p>
        <p><strong>Catatan:</strong> {{ $pupuk->catatan ?? '-' }}</p>
        <p><strong>Status:</strong>
            <span class="badge badge-{{ $pupuk->status }}">{{ ucfirst($pupuk->status) }}</span>
        </p>
        <p><strong>Foto Petani:</strong><br>
            @if($pupuk->foto_petani)
                <img src="{{ public_path('images/'.$pupuk->foto_petani) }}" alt="Foto Petani">
            @else
                Tidak ada foto
            @endif
        </p>
        <p><strong>Tanda Tangan:</strong><br>
            @if($pupuk->tanda_tangan)
                <img src="{{ public_path('images/'.$pupuk->tanda_tangan) }}" alt="Tanda Tangan">
            @else
                Tidak ada tanda tangan
            @endif
        </p>
    </div>
</body>
</html>
