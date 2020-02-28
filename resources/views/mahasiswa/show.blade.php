@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    Tambah Data hobi
                    </div>
                    <div class="card-body">
                        <form action="{{url()->previous()}}" method="post">
                            @csrf
                            <!-- Nama Mahasiswa -->
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" value="{{$mhs->nama}}" class="form-control" required readonly>
                            </div>
                            {{-- Nomor induk Sekolah --}}
                            <div class="form-group">
                                <label for="">Nomor induk Sekolah</label>
                            <input type="text" name="nim" value="{{$mhs->nim}}" class="form-control" required readonly>
                            </div>
                            {{-- Nama Dosen --}}
                            <div class="form-group">
                                <label for="">Nama/Id dosen</label>
                            <input type="text" name="id_dosen" value="{{$mhs->dosen->nama}}" class="form-control" readonly>
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-info">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection