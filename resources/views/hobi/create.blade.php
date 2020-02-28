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
                        <form action="{{route('hobi.store')}}" method="post">
                            @csrf
                            <!-- Nama Dosen -->
                            <div class="form-group">
                                <label for="">Nama Hobi</label>
                                <input type="text" name="hobi" class="form-control" required>
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