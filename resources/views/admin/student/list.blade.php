@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Siswa (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Tambahkan Siswa Baru</a>
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
                <h3 class="card-title">Cari Siswa </h3>
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
                    <label>Nomor Pendaftaran</label>
                    <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}"  placeholder="Admission Number">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Nomor Urut</label>
                    <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}"  placeholder="Roll Number">
                  </div>



                  <div class="form-group col-md-2">
                    <label>Kelas</label>
                    <input type="text" class="form-control" name="class" value="{{ Request::get('class') }}"  placeholder="Class">
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
                    <label>Kasta</label>
                    <input type="text" class="form-control" name="caste" value="{{ Request::get('caste') }}"  placeholder="Caste">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Agama</label>
                    <input type="text" class="form-control" name="religion" value="{{ Request::get('religion') }}"  placeholder="Religion">
                  </div>

                    <div class="form-group col-md-2">
                    <label>Nomor HP</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}"  placeholder="Mobile Number">
                  </div>


                    <div class="form-group col-md-2">
                    <label>Golongan Darah</label>
                    <input type="text" class="form-control" name="blood_group" value="{{ Request::get('blood_group') }}"  placeholder="Blood Group">
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
                    <label>Tanggal Penerimaan</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}" >
                  </div>






                  <div class="form-group col-md-2">
                    <label>Tanggal Dibuat</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}"  placeholder="">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                    <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>





            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Siswa</h3>
                <form action="{{ url('admin/student/export_excel') }}" method="post" style="float: right;">
                    {{ csrf_field() }}
                    <input type="hidden" name="name" value="{{ Request::get('name') }}">
                    <input type="hidden" name="last_name" value="{{ Request::get('last_name') }}">
                    <input type="hidden" name="email" value="{{ Request::get('email') }}">
                    <input type="hidden" name="admission_number" value="{{ Request::get('admission_number') }}">
                    <input type="hidden" name="roll_number" value="{{ Request::get('roll_number') }}">
                    <input type="hidden" name="gender" value="{{ Request::get('gender') }}">
                    <input type="hidden" name="class" value="{{ Request::get('class') }}">
                    <input type="hidden" name="caste" value="{{ Request::get('caste') }}">
                    <input type="hidden" name="religion" value="{{ Request::get('religion') }}">
                    <input type="hidden" name="mobile_number" value="{{ Request::get('mobile_number') }}">
                    <input type="hidden" name="blood_group" value="{{ Request::get('blood_group') }}">
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
                      <th>Nama Siswa</th>
                      <th>Nama Orang Tua</th>
                      <th>Email</th>
                      <th>Nomor Pendaftaran</th>
                      <th>Nomor Urut</th>
                      <th>Kelas</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Kelahiran </th>
                      <th>Kasta </th>
                      <th>Agama</th>
                      <th>Nomor HP</th>
                      <th>Tanggal Penerimaan</th>
                      <th>Golongan Darah</th>
                      <th>Tinggi</th>
                      <th>Berat</th>
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
                          <td>{{ $value->parent_name }} {{ $value->parent_last_name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->admission_number }}</td>
                          <td>{{ $value->roll_number }}</td>
                          <td>{{ $value->class_name }}</td>
                          <td>{{ $value->gender }}</td>
                          <td>
                              @if(!empty($value->date_of_birth))
                              {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                              @endif
                            </td>
                          <td>{{ $value->caste }}</td>
                          <td>{{ $value->religion }}</td>
                          <td>{{ $value->mobile_number }}</td>
                          <td>
                            @if(!empty($value->admission_date))
                              {{ date('d-m-Y', strtotime($value->admission_date)) }}
                              @endif
                          </td>
                          <td>{{ $value->blood_group }}</td>
                          <td>{{ $value->height }}</td>
                          <td>{{ $value->weight }}</td>
                          <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>


                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td style="min-width: 270px;">
                            <a href="{{ url('admin/student/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('admin/student/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
