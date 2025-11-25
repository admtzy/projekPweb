@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h4>Tambah Lahan & Lokasi</h4>
        </div>
        <div class="card-body">
            <form method="GET" action="/cuaca" class="d-flex align-items-center">
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
        </div>

        <div class="card-body">
            <canvas id="chartCuaca"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($cuaca->pluck('bulan')) !!};
    const suhu = {!! json_encode($cuaca->pluck('suhu')) !!};
    const hujan = {!! json_encode($cuaca->pluck('curah_hujan')) !!};
    const lembap = {!! json_encode($cuaca->pluck('kelembapan')) !!};

    new Chart(document.getElementById('chartCuaca'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Suhu (°C)',
                    data: suhu,
                    borderWidth: 2,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.3
                },
                {
                    label: 'Curah Hujan (mm)',
                    data: hujan,
                    borderWidth: 2,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.3
                },
                {
                    label: 'Kelembapan (%)',
                    data: lembap,
                    borderWidth: 2,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Grafik Cuaca per Kabupaten'
                }
            }
        }
    });
</script>
@endsection
