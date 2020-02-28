@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    Lihat data wali
                    </div>
                    <div class="card-body">
                        <form action="{{url()->previous()}}" method="post">
                            @csrf
                            <!-- Nama Mahasiswa -->
                            <div class="form-group">
                                <label for="">Nama Wali</label>
                            <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" required readonly>
                            </div>
                            {{-- Nama Dosen --}}
                            <div class="form-group">
                                <label for="">Nama Anak</label>
                            <input type="text" name="id_mahasiswa" value="{{$wali->mahasiswa->nama}}" class="form-control" readonly>
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