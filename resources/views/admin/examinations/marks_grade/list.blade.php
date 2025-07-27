@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-graduation-cap"></i> Menandai Nilai</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/examinations/marks_grade/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambahkan Nilai Baru</a>
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

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"> Daftar Nilai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap">#</th>
                        <th>Nama Nilai</th>
                        <th class="text-nowrap">Persen Dari</th>
                        <th class="text-nowrap">Persen Ke</th>
                        <th>Dibuat Oleh</th>
                        <th class="text-nowrap">Tanggal Dibuat</th>
                        <th class="text-nowrap">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->percent_from }}%</td>
                          <td>{{ $value->percent_to }}%</td>
                          <td>{{ $value->created_name }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                          <td class="text-nowrap">
                            <a href="{{ url('admin/examinations/marks_grade/edit/'.$value->id) }}" class="btn btn-primary btn-sm">
                              <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ url('admin/examinations/marks_grade/delete/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">
                              <i class="fas fa-trash"></i> Delete
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div style="padding: 10px; float: right;">
                  @if(method_exists($getRecord, 'links'))
                    {{ $getRecord->links() }}
                  @endif
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
