@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelas & Mata Pelajaran Saya</h1>
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

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kelas & Mata Pelajaran Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>

                      <th>Nama Kelas</th>
                      <th>Nama Mata Pelajaran</th>
                      <th>Tipe Mata Pelajaran</th>
                      <th>Jadwal Pelajaran Saya</th>
                      <th>Tanggal Dibuat </th>
                      <th>Aksi </th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $value->class_name }}</td>
                          <td>{{ $value->subject_name }}</td>
                          <td>{{ $value->subject_type }}</td>
                          <td>
                            @php
                            $ClassSubject = $value->getMyTimeTable($value->class_id, $value->subject_id);
                            @endphp
                            @if(!empty($ClassSubject))
                              {{ date('h:i A',strtotime($ClassSubject->start_time)) }} to {{ date('h:i A',strtotime($ClassSubject->end_time)) }}
                              <br />
                              Nomor Kamar : {{ $ClassSubject->room_number }}
                            @endif
                          </td>
                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td>
                            <a href="{{ url('teacher/my_class_subject/class_timetable/'.$value->class_id.'/'.$value->subject_id) }}" class="btn btn-primary">Jadwal Pelajaran Saya</a>
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
