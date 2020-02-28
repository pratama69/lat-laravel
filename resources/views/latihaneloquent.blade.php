@extends('layouts.template')
@section('konten')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eloquent</title>
</head>

<body>
    @foreach($mahasiswa as $data)
    <h3>{{$data->nama}}</h3>
    <h5>Hobi :
        @foreach($data->hobi as $val)
        <li>
            {{$val->hobi}}
        </li>
        @endforeach
    </h5>
    <h4>
        <li>
            Nama wali : <strong>{{$data->wali->nama}}</strong>
        </li>
        <li>Dosen Pembimbing : <strong>{{$data->dosen->nama}}</strong>
        </li>
        <li>NIPD : <strong>{{$data->dosen->nipd}}</strong></li>
    </h4>
    <hr>
    @endforeach
</body>
</body>

</html>
@endsection