@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>PR Siswa <span style="color:blue;">({{ $getStudent->name }} {{ $getStudent->last_name }})</span></h1>
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
                <h3 class="card-title">Cari PR Siswa</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">



                  <div class="form-group col-md-2">
                    <label>Mata Pelajaran</label>
                    <input type="text" class="form-control" value="{{ Request::get('subject_name') }}" name="subject_name"  placeholder="Subject Name">
                  </div>



                  <div class="form-group col-md-2">
                    <label>Dari Tanggal PR</label>
                    <input type="date" class="form-control" name="from_homework_date" value="{{ Request::get('from_homework_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Pekerjaan Rumah</label>
                    <input type="date" class="form-control" name="to_homework_date" value="{{ Request::get('to_homework_date') }}"  >
                  </div>


                   <div class="form-group col-md-2">
                    <label>Dari Tanggal Pengajuan</label>
                    <input type="date" class="form-control" name="from_submission_date" value="{{ Request::get('from_submission_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Pengajuan</label>
                    <input type="date" class="form-control" name="to_submission_date" value="{{ Request::get('to_submission_date') }}"  >
                  </div>


                    <div class="form-group col-md-2">
                    <label>Dari Tanggal Dibuat</label>
                    <input type="date" class="form-control" name="from_created_date" value="{{ Request::get('from_created_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Dibuat</label>
                    <input type="date" class="form-control" name="to_created_date" value="{{ Request::get('to_created_date') }}"  >
                  </div>



                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('parent/my_student/homewrok/'.$getStudent->id) }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>


            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List PR Siswa</h3>
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
                      <th>Dibuat Oleh</th>
                      <th>Tanggal Dibuat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $value->class_name }}</td>
                          <td>{{ $value->subject_name }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->homework_date)) }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->submission_date)) }}</td>
                          <td>
                              @if(!empty($value->getDocument()))
                                <a href="{{ $value->getDocument() }}" class="btn btn-primary" download="">Download</a>
                              @endif
                          </td>
                          <td>
                            {!! $value->description !!}
                          </td>
                          <td>{{ $value->created_by_name }}</td>
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
