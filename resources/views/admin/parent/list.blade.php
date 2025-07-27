@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> List Orang Tua (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/parent/add') }}" class="btn btn-primary"> Tambahkan Orang Tua Baru</a>
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
                <h3 class="card-title"> Cari Orang Tua </h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-2">
                    <label> Nama</label>
                    <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Nama Akhir</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name" placeholder="Last Name">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Gender</label>
                      <select class="form-control" name="gender">
                          <option value="">Select Gender</option>
                          <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                          <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>
                      </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label> Pekerjaan</label>
                    <input type="text" class="form-control" name="occupation" value="{{ Request::get('occupation') }}" placeholder="Occupation">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Alamat</label>
                    <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}" placeholder="Address">
                  </div>

                  <div class="form-group col-md-2">
                    <label> Nomor HP</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Mobile Number">
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
                    <label> Tanggal Dibuat</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Cari</button>
                    <a href="{{ url('admin/parent/list') }}" class="btn btn-success" style="margin-top: 30px;"><i class="fas fa-sync"></i> Reset</a>
                  </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')

            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"> List Orang Tua</h3>
                 <form action="{{ url('admin/parent/export_excel') }}" method="post" style="float: right;">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" value="{{ Request::get('name') }}">
                    <input type="hidden" name="last_name" value="{{ Request::get('last_name') }}">
                    <input type="hidden" name="email" value="{{ Request::get('email') }}">
                    <input type="hidden" name="gender" value="{{ Request::get('gender') }}">
                    <input type="hidden" name="occupation" value="{{ Request::get('occupation') }}">
                    <input type="hidden" name="address" value="{{ Request::get('address') }}">
                    <input type="hidden" name="mobile_number" value="{{ Request::get('mobile_number') }}">
                    <input type="hidden" name="status" value="{{ Request::get('status') }}">
                    <input type="hidden" name="date" value="{{ Request::get('date') }}">
                    <button class="btn btn-success"> Export Excel</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap"> Foto Profil</th>
                        <th> Nama</th>
                        <th> Email</th>
                        <th class="text-nowrap"> Jenis Kelamin</th>
                        <th class="text-nowrap"> Nomor HP</th>
                        <th> Pekerjaan</th>
                        <th> Alamat</th>
                        <th class="text-nowrap"> Status</th>
                        <th class="text-nowrap"> Tanggal Dibuat</th>
                        <th class="text-nowrap"> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td class="text-center">
                            @if(!empty($value->getProfileDirect()))
                            <img src="{{ $value->getProfileDirect() }}" class="img-circle elevation-2" style="height: 50px; width:50px; object-fit: cover;">
                            @endif
                          </td>
                          <td>{{ $value->name }} {{ $value->last_name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->gender }}</td>
                          <td>{{ $value->mobile_number }}</td>
                          <td>{{ $value->occupation }}</td>
                          <td>{{ $value->address }}</td>
                          <td>
                            @if($value->status == 0)
                              <span class="badge badge-success">Aktif</span>
                            @else
                              <span class="badge badge-danger">Inaktif</span>
                            @endif
                          </td>
                          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                          <td class="text-nowrap">
                            <div class="btn-group">
                              <a href="{{ url('admin/parent/edit/'.$value->id) }}" class="btn btn-primary btn-sm mr-1" title="Edit">
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="{{ url('admin/parent/delete/'.$value->id) }}" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah Anda yakin ingin menghapus orang tua ini?')" title="Hapus">
                                <i class="fas fa-trash"></i>
                              </a>
                              <a href="{{ url('admin/parent/my-student/'.$value->id) }}" class="btn btn-info btn-sm mr-1" title="Siswa Saya">
                                <i class="fas fa-user-graduate"></i>
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

                  .img-circle.elevation-2 {
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
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
