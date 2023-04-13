@extends('layout.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DATA PEGAWAI</h3>

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
           <a href="{{ url ('pegawai/create')}}"class="btn btn-sm btn-info my-2">Tambah Data</a>
           <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search Pegawai</button>
        </form>
            <table class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <body>
                        @if($pegawai->count() > 0)
                            @foreach($pegawai as $i => $p)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$p->kode_pegawai}}</td>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->jk}}</td>
                                <td>{{$p->alamat}}</td> 
                                <td>{{$p->hp}}</td> 
                                
                                <td>
                                    {{-- Bikin simbol edit dan delete --}}
                                    <a href="{{url('/pegawai/'.$p->id.'/edit')}}" 
                                        class="btn btn-sm btn-warning">edit</a>
                                    
                                    <form method="POST" action="{{url('/pegawai/'.$p->id)}}" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        @else
                            <tr><td colspan="7" class="text-center">Data Tidak Ada</td></tr>
                        @endif
                    </body>
            </table>
            <div class="pagination justify-content-end mt-2">  {{ $pegawai->withQueryString()->links() }}</div>
        </div>
    </div>
    <!-- /.card -->
    <div class="card-footer">
        Footer
    </div>

    </section>
@endsection