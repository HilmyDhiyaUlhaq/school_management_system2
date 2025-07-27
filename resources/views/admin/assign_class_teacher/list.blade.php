@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-chalkboard-teacher"></i> Menunjuk Guru Kelas ({{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambahkan Guru Kelas Baru</a>
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

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"> Cari Guru Kelas</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label> Nama Kelas</label>
                      <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name" placeholder="Class Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label> Nama Guru</label>
                      <input type="text" class="form-control" value="{{ Request::get('teacher_name') }}" name="teacher_name" placeholder="Teacher Name">
                    </div>

                    <div class="form-group col-md-2">
                      <label> Status</label>
                      <select class="form-control" name="status">
                          <option value="">Select</option>
                          <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Aktif</option>
                          <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inaktif</option>
                      </select>
                    </div>

                    <div class="form-group col-md-2">
                      <label> Tanggal</label>
                      <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                    </div>

                    <div class="form-group col-md-2">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Cari</button>
                      <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success" style="margin-top: 30px;"><i class="fas fa-sync"></i> Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')

            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"> Daftar Guru Kelas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap">#</th>
                        <th> Nama Kelas</th>
                        <th> Nama Guru</th>
                        <th class="text-nowrap"> Status</th>
                        <th> Dibuat Oleh</th>
                        <th class="text-nowrap"> Dibuat Tanggal</th>
                        <th class="text-nowrap"> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $value->class_name }}</td>
                          <td>{{ $value->teacher_name }} {{ $value->teacher_last_name }}</td>
                          <td>
                            @if($value->status == 0)
                              <span class="badge badge-success">Aktif</span>
                            @else
                              <span class="badge badge-danger">Inaktif</span>
                            @endif
                          </td>
                          <td>{{ $value->created_by_name }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                          <td class="text-nowrap">
                            <div class="btn-group">
                              <a href="{{ url('admin/assign_class_teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm mr-1" title="Edit">
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="{{ url('admin/assign_class_teacher/edit_single/'.$value->id) }}" class="btn btn-info btn-sm mr-1" title="Edit Single">
                                <i class="fas fa-pencil-alt"></i>
                              </a>
                              <a href="{{ url('admin/assign_class_teacher/delete/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus penugasan guru kelas ini?')" title="Hapus">
                                <i class="fas fa-trash"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <!-- Styling tambahan -->
                <style>
                  .table-responsive {
                    overflow-x: auto;
                  }

                  .table {
                    width: auto;
                    max-width: none;
                    table-layout: auto;
                  }

                  .table td {
                    white-space: normal;
                    word-wrap: break-word;
                    min-width: 50px;
                    padding: 8px;
                    vertical-align: middle;
                  }

                  .table th {
                    background-color: #f4f6f9;
                    font-weight: 600;
                    vertical-align: middle;
                    padding: 10px 8px;
                  }

                  .text-nowrap {
                    white-space: nowrap !important;
                  }

                  .btn-sm {
                    padding: 0.25rem 0.5rem;
                    font-size: 0.875rem;
                  }

                  .card-primary.card-outline {
                    border-top: 3px solid #007bff;
                  }

                  .badge {
                    font-size: 85%;
                    padding: 0.35em 0.65em;
                  }

                  .btn-group .btn {
                    margin-right: 2px;
                  }

                  .mr-1 {
                    margin-right: 0.25rem !important;
                  }
                </style>

                <div class="d-flex justify-content-end mt-3">
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
