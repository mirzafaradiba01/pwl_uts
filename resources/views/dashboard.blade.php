@extends('layout.template')

@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
        <h1>Dashboard</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-6 col-4">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>Ice Cream</h3>
          <p>Ice cream adalah sebuah makanan beku yang terbuat dari campuran susu, gula, dan
            bahan lain seperti buah-buahan, cokelat, kacang-kacangan, atau rempah-rempah. 
            Campuran ini kemudian diproses dengan mesin khusus yang mengaduknya secara terus-menerus 
            sehingga membentuk tekstur yang lembut dan krimi. Ice cream biasanya disajikan dalam wadah kertas atau plastik, 
            dan bisa dimakan langsung atau sebagai tambahan dalam berbagai jenis makanan atau minuman.
            Ice cream sangat populer di seluruh dunia, terutama pada musim panas atau dalam acara-acara tertentu.
          </p>
        </div>
        <div class="icon">
          <i class="fas fa-ice-cream"></i>
        </div>
        <a href="{{ url('/ice_cream') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-4">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>Data Pegawai</h3>
          <p>Pegawai ice cream adalah seseorang yang bekerja di sebuah toko atau gerai ice cream dan bertanggung jawab untuk 
            mengolah, menjual, dan melayani produk ice cream kepada pelanggan. Tugas-tugas utama dari seorang pegawai ice cream meliputi 
            menyajikan menu ice cream kepada pelanggan, mengoperasikan mesin pembuat ice cream, membersihkan peralatan dan area kerja, 
            menjaga stok bahan baku, menghitung pendapatan, serta memberikan pelayanan yang baik dan ramah kepada pelanggan.
            Seorang pegawai ice cream juga perlu memiliki pengetahuan tentang berbagai macam rasa ice cream, topping, dan sirup.</p>
        </div>
        <div class="icon">
          <i class="fas fa-child"></i>
        </div>
        <a href="{{ url('/pegawai') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  
  <!-- /.row (main row) -->
</div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection