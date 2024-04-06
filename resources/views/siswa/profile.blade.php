@extends('layouts.master')

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="{{ $siswa->getAvatar() }}" class="img-circle" alt="Avatar"
                                        style="width:150px;height:150px">
                                    <h3 class="name">{{ $siswa->nama_depan }}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div>
                                <div class="profile-stat text-center">
                                    <div class="row">
                                        <div class="stat-item">
                                            {{ $siswa->mapel->count() }} <span>Mata Pelajaran</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail" style="margin-top: -20px;">
                                <div class="profile-info">
                                    <h4 class="text-center mt-3"><strong>Data Diri</strong></h4>
                                    <ul class="list-unstyled list-justify">
                                        <li><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</li>
                                        <li><strong>Agama:</strong> {{ $siswa->agama }}</li>
                                        <li><strong>Alamat:</strong> {{ $siswa->alamat }}</li>
                                    </ul>
                                </div>

                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                            <!-- <p align="right"><a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Nilai</a></p> -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Mata Pelajaran</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>KODE</th>
                                                    <th>NAMA</th>
                                                    <th>SEMESTER</th>
                                                    <th>NILAI</th>
                                                    <th>GURU</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($siswa->mapel as $mapel)
                                                    <tr>
                                                        <td>{{ $mapel->kode }}</td>
                                                        <td>{{ $mapel->nama }}</td>
                                                        <td>{{ $mapel->semester }}</td>
                                                        <td>{{ $mapel->pivot->nilai }}</td>
                                                        <td><a href="{{ route('guru.profile', $mapel->guru_id) }}">
                                                                @if ($mapel->guru)
                                                                    {{ $mapel->guru->nama }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center mt-3">
                                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">Edit
                                                Profile</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="panel">
                                <div class="id"></div>
                            </div>
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@stop
