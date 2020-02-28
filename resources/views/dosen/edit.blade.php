@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    Tambah Data dosen
                    </div>
                    <div class="card-body">
                        <form action="{{route('dosen.update',$dosen->id)}}" method="post">
                            {{-- <input type="hidden" name="_method" value="PUT"> --}}
                            @method('PUT')
                            @csrf
                            <!-- Nama Dosen -->
                            <div class="form-group">
                                <label for="">Nama Dosen</label>
                                <input type="text" name="nama" class="form-control" value="{{$dosen->nama}}" required>
                            </div>
                            <!-- Nomor Induk Pegawai Dosen -->
                            <div class="form-group">
                                <label for="">Nomor Induk Pegawai Dosen</label>
                            <input type="text" name="nipd" class="form-control" value="{{$dosen->nipd}}" required>
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection