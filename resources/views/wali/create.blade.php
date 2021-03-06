@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    Tambah Data Wali
                    </div>
                    <div class="card-body">
                        <form action="{{route('wali.store')}}" method="post">
                            @csrf
                            <!-- Nama Mahasiswa -->
                            <div class="form-group">
                                <label for="">Nama Wali</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            {{-- Nama Dosen --}}
                            <div class="form-group">
                                <label for="">Nama Anak</label>
                            <select name="id_mahasiswa" class="form-control">
                                @foreach ($mhs as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
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