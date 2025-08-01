@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menandai Nilai</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/examinations/marks_grade/add') }}" class="btn btn-primary">Tambahkan Nilai Baru</a>
          </div>



        </div>
      </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">




            @include('_message')


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Nilai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nama Nilai</th>
                      <th>Persen Dari</th>
                      <th>Persen Ke</th>
                      <th>Dibuat Oleh</th>
                      <th>Tanggal Pembuatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                       @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->percent_from }}</td>
                          <td>{{ $value->percent_to }}</td>
                          <td>{{ $value->created_name }}</td>
                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td>
                            <a href="{{ url('admin/examinations/marks_grade/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/examinations/marks_grade/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>


              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
