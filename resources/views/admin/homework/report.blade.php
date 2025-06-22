@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <h1>Laporan PR</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">


                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Cari Laporan PR</h3>
                  </div>
                  <form method="get" action="">
                    <div class="card-body">
                      <div class="row">

                      <div class="form-group col-md-2">
                        <label>Nama Depan Siswa</label>
                        <input type="text" class="form-control" value="{{ Request::get('first_name') }}" name="first_name"  placeholder="Student First Name">
                      </div>


                      <div class="form-group col-md-2">
                        <label>Nama Belakang Siswa</label>
                        <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name"  placeholder="Student Last Name">
                      </div>

                    <div class="form-group col-md-2">
                        <label>Kelas</label>
                        <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name"  placeholder="Class Name">
                      </div>


                      <div class="form-group col-md-2">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control" value="{{ Request::get('subject_name') }}" name="subject_name"  placeholder="Subject Name">
                      </div>



                      <div class="form-group col-md-2">
                        <label>Dari Tanggal Pekerjaan Rumah </label>
                        <input type="date" class="form-control" name="from_homework_date" value="{{ Request::get('from_homework_date') }}"  >
                      </div>

                      <div class="form-group col-md-2">
                        <label>Ke Tanggal Pekerjaan Rumah </label>
                        <input type="date" class="form-control" name="to_homework_date" value="{{ Request::get('to_homework_date') }}"  >
                      </div>


                       <div class="form-group col-md-2">
                        <label>Dari Tanggal Pengumpulan</label>
                        <input type="date" class="form-control" name="from_submission_date" value="{{ Request::get('from_submission_date') }}"  >
                      </div>

                      <div class="form-group col-md-2">
                        <label>Ke Tanggal Pengumpulan</label>
                        <input type="date" class="form-control" name="to_submission_date" value="{{ Request::get('to_submission_date') }}"  >
                      </div>


                      <div class="form-group col-md-2">
                        <label>Dari Tanggal Diterima Dibuat</label>
                        <input type="date" class="form-control" name="from_created_date" value="{{ Request::get('from_created_date') }}"  >
                      </div>

                      <div class="form-group col-md-2">
                        <label>Ke Tanggal Dibuat yang Dikirimkan</label>
                        <input type="date" class="form-control" name="to_created_date" value="{{ Request::get('to_created_date') }}"  >
                      </div>



                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                        <a href="{{ url('admin/homework/homework_report') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                      </div>

                      </div>
                    </div>
                  </form>
                </div>


                @include('_message')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Daftar Laporan Pekerjaan Rumah </h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Mata Pelajaran</th>
                          <th>Tanggal PR</th>
                          <th>Tanggal Pengumpulan</th>
                          <th>Dokumen</th>
                          <th>Deskripsi</th>
                          <th>Tanggal Dibuat</th>

                          <th>Dokumen yang Dikirimkan</th>
                          <th>Deskripsi yang Dikirinmkan</th>
                          <th>Tanggal Dibuat yang Dikirimkan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($getRecord as $value)
                            <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                              <td>{{ $value->class_name }}</td>
                              <td>{{ $value->subject_name }}</td>
                              <td>{{ date('d-m-Y', strtotime($value->getHomework->homework_date)) }}</td>
                              <td>{{ date('d-m-Y', strtotime($value->getHomework->submission_date)) }}</td>
                              <td>
                                  @if(!empty($value->getHomework->getDocument()))
                                    <a href="{{ $value->getHomework->getDocument() }}" class="btn btn-primary" download="">Download</a>
                                  @endif
                              </td>
                              <td>
                                {!! $value->getHomework->description !!}
                              </td>
                              <td>{{ date('d-m-Y', strtotime($value->getHomework->created_at)) }}</td>


                               <td>
                                  @if(!empty($value->getDocument()))
                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary" download="">Download</a>
                                  @endif
                              </td>
                              <td>
                                {!! $value->description !!}
                              </td>
                              <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>

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
