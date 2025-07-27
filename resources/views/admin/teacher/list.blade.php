@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> List Guru (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambahkan Guru Baru</a>
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
                <h3 class="card-title">Cari Guru</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-2">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Nama">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Nama Akhir</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name" placeholder="Nama Akhir">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Jenis Kelamin</label>
                      <select class="form-control" name="gender">
                          <option value="">Select Gender</option>
                          <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Laki-Laki">Laki-Laki</option>
                          <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                      </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label> Nomor HP</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Nomor HP">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Status Perkawinan</label>
                    <input type="text" class="form-control" name="marital_status" value="{{ Request::get('marital_status') }}" placeholder="Status Perkawinan">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Alamat Terkini</label>
                    <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}" placeholder="Alamat Terkini">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Status</label>
                      <select class="form-control" name="status">
                          <option value="">Select Status</option>
                          <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Aktif</option>
                          <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inaktif</option>
                      </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label> Tanggal Bergabung</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Tanggal Dibuat</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"><i class="fas fa-search"></i> Cari</button>
                    <a href="{{ url('admin/teacher/list') }}" class="btn btn-success" style="margin-top: 30px;"><i class="fas fa-sync"></i> Reset</a>
                  </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> List Guru</h3>

                <form action="{{ url('admin/teacher/export_excel') }}" method="post" style="float: right;">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" value="{{ Request::get('name') }}">
                    <input type="hidden" name="last_name" value="{{ Request::get('last_name') }}">
                    <input type="hidden" name="email" value="{{ Request::get('email') }}">
                    <input type="hidden" name="gender" value="{{ Request::get('gender') }}">
                    <input type="hidden" name="mobile_number" value="{{ Request::get('mobile_number') }}">
                    <input type="hidden" name="marital_status" value="{{ Request::get('marital_status') }}">
                    <input type="hidden" name="address" value="{{ Request::get('address') }}">
                    <input type="hidden" name="status" value="{{ Request::get('status') }}">
                    <input type="hidden" name="admission_date" value="{{ Request::get('admission_date') }}">
                    <input type="hidden" name="date" value="{{ Request::get('date') }}">
                    <button class="btn btn-primary"><i class="fas fa-file-excel"></i> Export Excel</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap"> Foto</th>
                        <th class="text-nowrap"> Nama Guru</th>
                        <th class="text-nowrap"> Email</th>
                        <th class="text-nowrap"> Gender</th>
                        <th class="text-nowrap"> Tgl Lahir</th>
                        <th class="text-nowrap"> Bergabung</th>
                        <th class="text-nowrap"> HP</th>
                        <th class="text-nowrap"> Status</th>
                        <th class="text-nowrap"> Alamat</th>
                        <th class="text-nowrap"> Alamat Tetap</th>
                        <th class="text-nowrap"> Kualifikasi</th>
                        <th class="text-nowrap"> Pengalaman</th>
                        <th class="text-nowrap"> Catatan</th>
                        <th class="text-nowrap"> Status</th>
                        <th class="text-nowrap"> Tgl Dibuat</th>
                        <th class="text-nowrap"> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                        <tr>
                          <td class="text-nowrap">{{ $loop->iteration }}</td>
                          <td class="text-center">
                            @if(!empty($value->getProfileDirect()))
                            <img src="{{ $value->getProfileDirect() }}" class="img-circle elevation-2" style="height: 50px; width:50px; object-fit: cover;">
                            @endif
                          </td>
                          <td>{{ $value->name }} {{ $value->last_name }}</td>
                          <td>{{ $value->email }}</td>
                          <td class="text-nowrap">{{ $value->gender }}</td>
                          <td class="text-nowrap">
                              @if(!empty($value->date_of_birth))
                              {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                              @endif
                          </td>
                          <td class="text-nowrap">
                            @if(!empty($value->admission_date))
                              {{ date('d-m-Y', strtotime($value->admission_date)) }}
                              @endif
                          </td>
                          <td class="text-nowrap">{{ $value->mobile_number }}</td>
                          <td>{{ $value->marital_status }}</td>
                          <td>{{ $value->address }}</td>
                          <td>{{ $value->permanent_address }}</td>
                          <td>{{ $value->qualification }}</td>
                          <td>{{ $value->work_experience }}</td>
                          <td>{{ $value->note }}</td>
                          <td class="text-nowrap">
                            @if($value->status == 0)
                              <span class="badge badge-success">Aktif</span>
                            @else
                              <span class="badge badge-danger">Inaktif</span>
                            @endif
                          </td>
                          <td class="text-nowrap">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                          <td class="text-nowrap">
                            <div class="btn-group">
                              <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm mr-1" title="Edit">
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah Anda yakin ingin menghapus guru ini?')" title="Hapus">
                                <i class="fas fa-trash"></i>
                              </a>
                              <a href="{{ url('chat?receiver_id='.base64_encode($value->id)) }}" class="btn btn-success btn-sm" title="Kirim Pesan">
                                <i class="fas fa-comments"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <!-- Tambahkan ini untuk styling tambahan -->
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
                  }

                  .table th {
                    white-space: nowrap;
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
