@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menunjuk Guru Kelas ({{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary">Tambahkan Guru Kelas Baru</a>
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


             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cari Guru Kelas</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">


                  <div class="form-group col-md-3">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name"  placeholder="Class Name">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Nama Guru</label>
                    <input type="text" class="form-control" value="{{ Request::get('teacher_name') }}" name="teacher_name"  placeholder="Teacher Name">
                  </div>


                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="">Select</option>
                        <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Aktif</option>
                        <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inaktif</option>
                    </select>
                  </div>


                  <div class="form-group col-md-2">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" >
                  </div>

                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                    <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>



            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Guru Kelas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Kelas</th>
                      <th>Nama Guru</th>
                      <th>Status</th>
                      <th>Dibuat Oleh</th>
                      <th>Dibuat Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->class_name }}</td>
                          <td>{{ $value->teacher_name }} {{ $value->teacher_last_name }}</td>
                          <td>
                            @if($value->status == 0)
                              Aktif
                            @else
                              Inaktif
                            @endif
                          </td>
                          <td>{{ $value->created_by_name }}</td>
                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td>
                               <a href="{{ url('admin/assign_class_teacher/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>

                               <a href="{{ url('admin/assign_class_teacher/edit_single/'.$value->id) }}" class="btn btn-primary">Edit Single</a>

                                <a href="{{ url('admin/assign_class_teacher/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>

                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                 <div style="padding: 10px; float: right;">
                   {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

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
