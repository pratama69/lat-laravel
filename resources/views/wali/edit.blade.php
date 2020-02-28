@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    Update data Wali
                    </div>
                    <div class="card-body">
                        <form action="{{route('wali.update',$wali->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- Nama Wali -->
                            <div class="form-group">
                                <label for="">Nama Wali</label>
                            <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" required>
                            </div>
                            {{-- Nama Anak --}}
                            <div class="form-group">
                                <label for="">Nama/Id dosen</label>
                            <select name="id_mahasiswa" class="form-control">
                                @foreach ($mhs as $data)
                            <option value="{{$data->id}}" {{$data->id == $wali->id_mahasiswa ? "selected": ""}}>
                                {{$data->nama}}
                            </option>
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