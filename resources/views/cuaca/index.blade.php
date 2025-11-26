@extends('layouts.app')
@section('body-class', 'has-bg')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h4>Tambah Lahan & Lokasi</h4>
        </div>

        <div class="card-body">
            {{-- Form Filter --}}
            <form method="GET" action="{{ route('cuaca.index') }}" class="d-flex align-items-center mb-3">
                <select name="kabupaten" class="form-select me-2" style="width:250px;">
                    <option value="">-- Semua Kabupaten --</option>
                    @foreach($kabupatenList as $k)
                        <option value="{{ $k->kabupaten }}" {{ request('kabupaten') == $k->kabupaten ? 'selected' : '' }}>
                            {{ $k->kabupaten }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-primary">Filter</button>
            </form>

            {{-- Chart Canvas --}}
            <canvas id="chartCuaca" style="max-height:400px;"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
window.onload = function() {
    let cuacaData = {!! json_encode($cuaca) !!};
    const bulanUrut = [
        'Januari','Februari','Maret','April','Mei','Juni',
        'Juli','Agustus','September','Oktober','November','Desember'
    ];
    cuacaData.sort((a,b) => bulanUrut.indexOf(a.bulan) - bulanUrut.indexOf(b.bulan));

    const labels = cuacaData.map(item => item.bulan);
    const suhu = cuacaData.map(item => item.suhu ?? 0);
    const hujan = cuacaData.map(item => item.curah_hujan ?? 0);
    const lembap = cuacaData.map(item => item.kelembapan ?? 0);

    new Chart(document.getElementById('chartCuaca'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Suhu (°C)',
                    data: suhu,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.3,
                    borderWidth: 2
                },
                {
                    label: 'Curah Hujan (mm)',
                    data: hujan,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.3,
                    borderWidth: 2
                },
                {
                    label: 'Kelembapan (%)',
                    data: lembap,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.3,
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Grafik Cuaca per Kabupaten' }
            },
            scales: { y: { beginAtZero: true } }
        }
    });
};
</script>
@endsection
