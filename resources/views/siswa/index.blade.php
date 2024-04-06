@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-field">
                <div class="row">
                    <div class="md-col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Siswa</h3>
                                <div class="right">
                                    <p align="right"><a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah
                                            Data Siswa</a></p>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NAMA DEPAN</th>
                                                <TH>NAMA BELAKANG</TH>
                                                <TH>JENIS KELAMIN</TH>
                                                <TH>AGAMA</TH>
                                                <TH>ALAMAT</TH>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_siswa as $siswa)
                                                <tr>
                                                    <td><a
                                                            href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_depan }}</a>
                                                    </td>
                                                    <td><a
                                                            href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_belakang }}</a>
                                                    </td>
                                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                                    <td>{{ $siswa->agama }}</td>
                                                    <td>{{ $siswa->alamat }}</td>
                                                    <td>
                                                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('siswa.delete', $siswa->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin mengapus data?')">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.create') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group mb-3 has-error">
                            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Depan">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Belakang">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jeniskelamin">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Agama">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampletextarea">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleformcontrolrextarea" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
