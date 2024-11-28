@extends('ui.master')
@section('title', 'Edit Tiket')
@section('content')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Tiket</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('tiket.update', $tiket->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Kode Tiket" name="kode_tiket" value="{{ old('kode_tiket', $tiket->kode_tiket) }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-ticket"></i>
                                                </div>
                                            </div>
                                            @error('kode_tiket')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', $tiket->nama_pemesan) }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            @error('nama_pemesan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control" placeholder="Jumlah Pengunjung" name="jumlah_pengunjung" value="{{ old('jumlah_pengunjung', $tiket->jumlah_pengunjung) }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                            </div>
                                            @error('jumlah_pengunjung')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Masa Berlaku" name="masa_berlaku" value="{{ old('masa_berlaku', $tiket->masa_berlaku) }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar"></i>
                                                </div>
                                            </div>
                                            @error('masa_berlaku')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="QR_code">QR Code</label>
                                        <input class="form-control @error('QR_code') is-invalid @enderror" type="file" name="QR_code" id="QR_code">
                                        @error('QR_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <img src="{{ $tiket->QR_code ? url('storage/' . $tiket->QR_code) : '' }}" alt="Current QR Code" class="rounded-circle mt-3" width="100">
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

