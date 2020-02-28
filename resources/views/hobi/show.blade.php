@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    Data dosen
                    </div>
                    <div class="card-body">
                        <form action="{{url()->previous()}}" method="post">
                            @csrf
                            <!-- Nama Dosen -->
                            <div class="form-group">
                                <label for="">Nama Hobi</label>
                            <input type="text" name="hobi" value="{{$hobi->hobi}}" class="form-control" required readonly>
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                            </div>
                        </form>
                        <a href="{{url()->previous()}}" class="btn btn-outline-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection