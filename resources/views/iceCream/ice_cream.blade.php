@extends('layout.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">MENU ICE CREAM</h3>

            {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div> --}}
        </div>
        <div class="card-body">
           <a href="{{ url ('ice_cream/create')}}"class="btn btn-sm btn-success my-2">Tambah Data</a>
           <form action="ice_cream/search" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search" name="keyword">
              <div class="input-group-append">
                <select class="custom-select rounded-0" name="column">
                  <option value="kode_barang">Kode</option>
                  <option value="nama_ice">Nama</option>
                  <option value="harga">Harga</option>
                </select>
                <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
              </div>
            </div> 
          </form>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Ice</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($ice->count() > 0)
                            @foreach($ice as $i => $c)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$c->kode_barang}}</td>
                                <td>{{$c->nama_ice}}</td>
                                <td>{{$c->harga}}</td>
                                <td>{{$c->qty}}</td> 
                                
                                <td>
                                    {{-- Bikin simbol edit dan delete --}}
                                    <a href="{{url('/ice_cream/'.$c->id.'/edit')}}" 
                                        class="btn btn-sm btn-warning">edit</a>
                                    
                                    <form method="POST" action="{{url('/ice_cream/'.$c->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        @else
                            <tr><td colspan="9" class="text-center">Data Tidak Ada</td></tr>
                        @endif
                    </body>
            </table>
        </div>
    </div>
    <!-- /.card -->
    <div class="card-footer">
        Footer
    </div>

    </section>
@endsection