@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Kehadiran <span style="color:blue">(Total : {{ $getRecord->total() }})</span> </h1>
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
                <h3 class="card-title">Cari Laporan Kehadiran</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                  <div class="form-group col-md-2">
                    <label>ID Siswa</label>
                    <input type="text" class="form-control" placeholder="Student ID" value="{{ Request::get('student_id') }}" name="student_id">
                  </div>


                   <div class="form-group col-md-2">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" placeholder="Student Name" value="{{ Request::get('student_name') }}" name="student_name">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Nama Akhir Siswa</label>
                    <input type="text" class="form-control" placeholder="Student Last Name" value="{{ Request::get('student_last_name') }}" name="student_last_name">
                  </div>



                  <div class="form-group col-md-2">
                    <label>Kelas</label>
                    <select class="form-control" name="class_id" >
                        <option value="">Pilih</option>
                        @foreach($getClass as $class)
                          <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                  </div>

                   <div class="form-group col-md-2">
                    <label>Mulai Tanggal Kehadiran</label>
                    <input type="date" class="form-control"  value="{{ Request::get('start_attendance_date') }}" name="start_attendance_date">
                  </div>

                   <div class="form-group col-md-2">
                    <label>Akhiri Tanggal Kehadiran</label>
                    <input type="date" class="form-control"  value="{{ Request::get('end_attendance_date') }}" name="end_attendance_date">
                  </div>


                  <div class="form-group col-md-2">
                    <label>Tipe Kehadiran</label>
                    <select class="form-control" name="attendance_type">
                        <option value="">Select</option>
                        <option {{ (Request::get('attendance_type') == 1) ? 'selected' : '' }} value="1">Hadir</option>
                        <option {{ (Request::get('attendance_type') == 2) ? 'selected' : '' }} value="2">Terlambat</option>
                        <option {{ (Request::get('attendance_type') == 3) ? 'selected' : '' }} value="3">Absen</option>
                        <option {{ (Request::get('attendance_type') == 4) ? 'selected' : '' }} value="4">Setengah Hari</option>
                    </select>
                  </div>


                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/attendance/report') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>


                 <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Attendance List</h3>
                      <form style="float: right;" action="{{ url('admin/attendance/report_export_excel') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="student_id" value="{{ Request::get('student_id') }}">
                          <input type="hidden" name="student_name" value="{{ Request::get('student_name') }}">
                          <input type="hidden" name="student_last_name" value="{{ Request::get('student_last_name') }}">
                          <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                          <input type="hidden" name="start_attendance_date" value="{{ Request::get('start_attendance_date') }}">
                          <input type="hidden" name="end_attendance_date" value="{{ Request::get('end_attendance_date') }}">
                          <input type="hidden" name="attendance_type" value="{{ Request::get('attendance_type') }}">

                          <button class="btn btn-primary">Export Excel</button>
                      </form>
                    </div>

                    <div class="card-body p-0" style="overflow: auto;">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID Siswa</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                            <th>Tipe Kehadiran</th>
                            <th>Tanggal Kehadiran</th>
                            <th>Dibuat Oleh</th>
                            <th>Tanggal Dibuat</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($getRecord as $value)
                            <tr>
                              <td>{{ $value->student_id }}</td>
                              <td>{{ $value->student_name }} {{ $value->student_last_name }}</td>
                              <td>{{ $value->class_name }}</td>
                              <td>
                                  @if($value->attendance_type == 1)
                                    Hadir
                                  @elseif($value->attendance_type == 2)
                                    Terlambat
                                  @elseif($value->attendance_type == 3)
                                    Absen
                                  @elseif($value->attendance_type == 4)
                                    Setengah Hari
                                  @endif
                              </td>
                              <td> {{ date('d-m-Y', strtotime($value->attendance_date)) }} </td>
                              <td> {{ $value->created_name }} </td>
                              <td> {{ date('d-m-Y H:i A', strtotime($value->created_at)) }} </td>
                            </tr>
                          @empty
                            <tr>
                              <td colspan="100%">Data Tidak Ditemukan</td>
                            </tr>
                          @endforelse
                        </tbody>
                      </table>

                       <div style="padding: 10px; float: right;">
                          {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                      </div>


                    </div>
                  </div>



          </div>

        </div>

      </div>
    </section>
  </div>

@endsection

@section('script').



@endsection
