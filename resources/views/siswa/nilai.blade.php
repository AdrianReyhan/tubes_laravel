@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-field">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tambah Nilai</h1>
                    <form action="{{ route('siswa.nilai', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <select name="mapel" id="mapel" class="form-control">
                                @foreach($matapelajaran as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }}">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input name="nilai" type="text" class="form-control" id="nilai" placeholder="Masukan Nilai" value="{{ old('nilai') }}">
                            @if ($errors->has('nilai'))
                            <span class="help-block">{{ $errors->first('nilai') }}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="/siswa/{{ $siswa->id }}/profile" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection