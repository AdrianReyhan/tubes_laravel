@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-field">
            <div class="row">
                <div class="md-col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jeniskelamin">
                                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Agama</label>
                                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampletextarea">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleformcontrolrextarea" rows="3">{{$siswa->alamat}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampletextarea">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content1')

<h1>Edit Data Siswa</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="row">
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        {{csrf_field()}}
        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="jeniskelamin">
                <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Agama</label>
            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
        </div>
        <div class="form-group mb-3">
            <label for="exampletextarea">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleformcontrolrextarea" rows="3">{{$siswa->alamat}}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection