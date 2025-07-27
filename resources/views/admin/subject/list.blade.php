@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-book"></i> List Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/subject/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambahkan Mapel Baru</a>
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
                <h3 class="card-title"> Cari Mapel</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label> Nama</label>
                      <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Nama Mapel">
                    </div>

                    <div class="form-group col-md-3">
                      <label> Tipe Mapel</label>
                      <select class="form-control" name="type">
                          <option value="">Pilih Tipe</option>
                          <option {{ (Request::get('type') == 'Theory') ? 'selected' : '' }} value="Theory">Teori</option>
                          <option {{ (Request::get('type') == 'Practical') ? 'selected' : '' }} value="Practical">Praktek</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label> Tanggal</label>
                      <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                    </div>

                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;"><i class="fas fa-search"></i> Cari</button>
                      <a href="{{ url('admin/subject/list') }}" class="btn btn-success" style="margin-top: 30px;"><i class="fas fa-sync"></i> Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')

            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i> List Mapel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap">#</th>
                        <th> Nama Mapel</th>
                        <th class="text-nowrap"> Tipe Mapel</th>
                        <th class="text-nowrap"> Status</th>
                        <th> Dibuat Oleh</th>
                        <th class="text-nowrap"> Tanggal Dibuat</th>
                        <th class="text-nowrap"> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->type }}</td>
                          <td>
                            @if($value->status == 0)
                              <span class="badge badge-success">Aktif</span>
                            @else
                              <span class="badge badge-danger">Inaktif</span>
                            @endif
                          </td>
                          <td>{{ $value->created_by_name }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                          <td>
                            <div class="btn-group">
                              <a href="{{ url('admin/subject/edit/'.$value->id) }}" class="btn btn-primary btn-sm mr-1" title="Edit">
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="{{ url('admin/subject/delete/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')" title="Hapus">
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
