@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>PR Saya yang Dikumpulkan</h1>
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
                <h3 class="card-title">Cari PR Saya yang Dikumpulkan</h3>
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
                    <label>Ke Tanggal Pekerjaan Rumah </label>
                    <input type="date" class="form-control" name="to_homework_date" value="{{ Request::get('to_homework_date') }}"  >
                  </div>


                   <div class="form-group col-md-2">
                    <label>Dari Tanggal Pengumpulan </label>
                    <input type="date" class="form-control" name="from_submission_date" value="{{ Request::get('from_submission_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Pengumpulan</label>
                    <input type="date" class="form-control" name="to_submission_date" value="{{ Request::get('to_submission_date') }}"  >
                  </div>


                  <div class="form-group col-md-2">
                    <label>Dari Tanggal yang Diajukan Dibuat</label>
                    <input type="date" class="form-control" name="from_created_date" value="{{ Request::get('from_created_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Pembuatan yang Diajukan</label>
                    <input type="date" class="form-control" name="to_created_date" value="{{ Request::get('to_created_date') }}"  >
                  </div>



                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                    <a href="{{ url('student/my_submitted_homework') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>


            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar PR yang Dikumpulkan</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kelas</th>
                      <th>Mapel</th>
                      <th>Tanggal PR</th>
                      <th>Tanggal Pengumpulan</th>
                      <th>Dokumen</th>
                      <th>Deskripsi</th>
                      <th>Tanggal Dibuat</th>

                      <th>Dokumen yang Diajukan</th>
                      <th>Deskripsi yang Diajukan</th>
                      <th>Tanggal Pembuatan yang Diajukan</th>
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
