@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-center-content">
        <div class="col-lg-12">
            <div class="card">
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
                @endif
                <div class="card-header">
                    Data Mahasiswa
                    <a href="{{route('mahasiswa.create')}}" class="float-right btn btn-outline-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Nomor Induk Sekolah</th>
                                    <th>Nama dosen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($mhs as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nim}}</td>
                                    <td>{{$data->dosen->nama}}</td>
                                    <td>
                                        <form action="{{route('mahasiswa.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <a href="{{route('mahasiswa.show',$data->id)}}" class="btn btn-outline-info">Lihat</a>
                                        <a href="{{route('mahasiswa.edit',$data->id)}}" class="btn btn-outline-dark">Edit</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data??')">Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection