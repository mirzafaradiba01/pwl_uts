@extends('layout.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA PEGAWAI</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $url_form }}">
                @csrf
                {!! (isset($pegawai))? method_field('PUT') : '' !!}
                <div class="form-group">
                    <label>Kode Pegawai</label>
                    <input class="form-control @error('kode_pegawai') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->kode_pegawai: old('kode_pegawai') }}" name="kode_pegawai" type="text" />
                    @error('kode_pegawai')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input class="form-control @error('nama') is-invalid @enderror" value="{{isset($pegawai)? $pegawai->nama:old('nama') }}" name="nama" type="text"/>
                    @error('nama')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input class="form-control @error('jk') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->jk:old('jk') }}" name="jk" type="text"/>
                    @error('jk')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->alamat:old('alamat') }}" name="alamat" type="text"/>
                    @error('alamat')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                  <div class="form-group">
                        <label>No Telepon</label>
                        <input class="form-control @error('hp') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->hp:old('hp') }}" name="hp" type="text"/>
                        @error('hp')
                          <span class="error invalid-feedback">{{ $message }} </span>
                        @enderror
                      </div>
                  </div>
      

                <div class="form-group">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->

    </section>
@endsection