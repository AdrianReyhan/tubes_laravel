@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-field">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tambah Siswa</h1>
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group{{$errors->has('nama_depan') ? ' has-error ' : ''}}">
                            <label for="namaDepanInput" class="form-label">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="namaDepanInput" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                            @if($errors->has('nama_depan'))
                            <span class="help-block">{{$errors->first('nama_depan')}}</span>
                            @endif
                        </div>
                        <div class="form-group{{$errors->has('nama_belakang') ? ' has-error ' : ''}}">
                            <label for="namaBelakangInput" class="form-label">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="namaBelakangInput" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                            @if($errors->has('nama_belakang'))
                            <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3{{$errors->has('email') ? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                            @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error ' : ''}}">
                            <label for="jenisKelaminInput">Pilih Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jenisKelaminInput" required>
                                <option value="L" {{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="P" {{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>
                        <div class="form-group{{$errors->has('agama') ? ' has-error ' : ''}}">
                            <label for="agamaInput" class="form-label">Agama</label>
                            <input name="agama" type="text" class="form-control" id="agamaInput" placeholder="Agama" value="{{old('agama')}}">
                            @if($errors->has('agama'))
                            <span class="help-block">{{$errors->first('agama')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="alamatTextarea">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamatTextarea" rows="3" required>{{old('alamat')}}</textarea>
                        </div>
                        <div class="form-group mb-3{{$errors->has('avatar') ? ' has-error ' : ''}}">
                            <label for="exampletextarea">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @if($errors->has('avatar'))
                            <span class="help-block">{{$errors->first('avatar')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="/siswa" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection