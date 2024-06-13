@extends('layouts.template')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>Tabel Polyline</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        @php $no = 1 @endphp
                        @foreach ($polylines as $p)
                            <!-- Use $points here -->
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td> <!-- Fixed case sensitivity -->
                                <td>
                                    <img src="{{ asset('storage/images/' . $p->image) }}" alt="image" width="200">
                                </td>
                                <td>{{ date('d, M Y, H:i:s', strtotime($p->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    @endsection

    @section('script')
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
        <script>
            new DataTable('#example');
        </script>
    @endsection
