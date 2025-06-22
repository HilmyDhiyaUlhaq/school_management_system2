@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Guru (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Tambahkan Guru Baru</a>
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
                    <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name"  placeholder="Name">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Nama Akhir</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name"  placeholder="Last Name">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}"  placeholder="Email">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Jenis Kelamin</label>
                      <select class="form-control" name="gender">
                          <option value="">Select Gender</option>
                          <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                          <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>

                      </select>
                  </div>

                    <div class="form-group col-md-2">
                    <label>Nomor HP</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}"  placeholder="Mobile Number">
                  </div>


                    <div class="form-group col-md-2">
                    <label> Status Perkawinan </label>
                    <input type="text" class="form-control" name="marital_status" value="{{ Request::get('marital_status') }}"  placeholder="Marital Status">
                  </div>

                   <div class="form-group col-md-2">
                    <label> Alamat Terkini </label>
                    <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}"  placeholder="Current Address">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Status</label>
                      <select class="form-control" name="status">
                          <option value="">Select Status</option>
                          <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Aktif</option>
                          <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inaktif</option>

                      </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Tanggal Bergabung</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}" >
                  </div>


                  <div class="form-group col-md-2">
                    <label>Tanggal Dibuat </label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}"  placeholder="">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                    <a href="{{ url('admin/teacher/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>



            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Guru</h3>

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
                    <button class="btn btn-primary">Export Excel</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto Profil</th>
                      <th>Nama Guru</th>
                      <th>Email</th>
                      <th>jenis Kelamin</th>
                      <th>Tanggal Kelahiran </th>
                      <th>Tanggal Bergabung</th>
                      <th>Nomor HP</th>
                      <th>Status Perkawinan  </th>
                      <th>Alamat Sekarang </th>
                      <th>Alamat Permanen </th>
                      <th>Kualifikasi</th>
                      <th>Penalaman Kerja</th>
                      <th>Catatan</th>
                      <th>Status</th>
                      <th>Tanggal Dibuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($getRecord as $value)
                         <tr>
                          <td>{{ $value->id }}</td>
                          <td>
                            @if(!empty($value->getProfileDirect()))
                            <img src="{{ $value->getProfileDirect() }}" style="height: 50px; width:50px; border-radius: 50px;">
                            @endif
                          </td>

                          <td>{{ $value->name }} {{ $value->last_name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->gender }}</td>
                          <td>
                              @if(!empty($value->date_of_birth))
                              {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                              @endif
                          </td>
                          <td>
                            @if(!empty($value->admission_date))
                              {{ date('d-m-Y', strtotime($value->admission_date)) }}
                              @endif
                          </td>
                          <td>{{ $value->mobile_number }}</td>
                          <td>{{ $value->marital_status }}</td>
                          <td>{{ $value->address }}</td>


                          <td>{{ $value->permanent_address }}</td>
                          <td>{{ $value->qualification }}</td>
                          <td>{{ $value->work_experience }}</td>
                          <td>{{ $value->note }}</td>
                          <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>


                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td style="min-width: 270px;">
                            <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{ url('chat?receiver_id='.base64_encode($value->id)) }}" class="btn btn-success btn-sm">Send Message</a>
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
