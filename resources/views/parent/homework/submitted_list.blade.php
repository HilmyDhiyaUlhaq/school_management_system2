@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <h1>PR yang Dikumpulkan Siswa <span style="color:blue;">({{ $getStudent->name }} {{ $getStudent->last_name }})</span></h1>
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
                    <h3 class="card-title">Cari PR yang Dikumpulkan Siswa</h3>
                  </div>
                  <form method="get" action="">
                    <div class="card-body">
                      <div class="row">

                    <div class="form-group col-md-2">
                        <label>Kelas</label>
                        <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name"  placeholder="Nama Kelas">
                      </div>


                      <div class="form-group col-md-2">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control" value="{{ Request::get('subject_name') }}" name="subject_name"  placeholder="Nama Mata Pelajaran">
                      </div>



                      <div class="form-group col-md-2">
                        <label>Dari Tanggal Pekerjaan Rumah</label>
                        <input type="date" class="form-control" name="from_homework_date" value="{{ Request::get('from_homework_date') }}"  >
                      </div>

                      <div class="form-group col-md-2">
                        <label>Ke Tanggal Pekerjaan Rumah</label>
                        <input type="date" class="form-control" name="to_homework_date" value="{{ Request::get('to_homework_date') }}"  >
                      </div>


                       <div class="form-group col-md-2">
                        <label>From Tanggal Pengajuan </label>
                        <input type="date" class="form-control" name="from_submission_date" value="{{ Request::get('from_submission_date') }}"  >
                      </div>

                      <div class="form-group col-md-2">
                        <label>Ke Tanggal Pengajuan</label>
                        <input type="date" class="form-control" name="to_submission_date" value="{{ Request::get('to_submission_date') }}"  >
                      </div>


                      <div class="form-group col-md-2">
                        <label>Dari Tanggal Yang Diajukan Dibuat</label>
                        <input type="date" class="form-control" name="from_created_date" value="{{ Request::get('from_created_date') }}"  >
                      </div>

                      <div class="form-group col-md-2">
                        <label>Ke Tanggal Yang Diajukan Dibuat</label>
                        <input type="date" class="form-control" name="to_created_date" value="{{ Request::get('to_created_date') }}"  >
                      </div>



                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                        <a href="{{ url('parent/my_student/submitted_homewrok/' . $getStudent->id) }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                      </div>

                      </div>
                    </div>
                  </form>
                </div>


                @include('_message')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Siswa Mengumpulkan Daftar Pekerjaan Rumah</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kelas</th>
                          <th>Mata Pelajaran</th>
                          <th>Tanggal PR</th>
                          <th>Tanggal Pengumpulan</th>
                          <th>Dokumen</th>
                          <th>Deskripsi</th>
                          <th>Tanggal Dibuat</th>

                          <th>Dokumen yang Dikumpulkan</th>
                          <th>Deskripsi yang Diajukan</th>
                          <th>Tanggal Dibuat yang Diajukan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($getRecord as $value)
                            <tr>
                              <td>{{ $value->id }}</td>
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
