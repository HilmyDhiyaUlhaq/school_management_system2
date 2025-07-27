@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pekerjaan Rumah</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/homework/homework/add') }}" class="btn btn-primary">Tambahkan Pekerjaan Rumah Baru</a>
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
                <h3 class="card-title">Cari Pekerjaan Rumah</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">


                  <div class="form-group col-md-2">
                    <label>Kelas</label>
                    <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name"  placeholder="Class Name">
                  </div>

                   <div class="form-group col-md-2">
                    <label>Mata Pelajaran</label>
                    <input type="text" class="form-control" value="{{ Request::get('subject_name') }}" name="subject_name"  placeholder="Subject Name">
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
                    <label>Dari Tanggal Pengumpulan</label>
                    <input type="date" class="form-control" name="from_submission_date" value="{{ Request::get('from_submission_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Pengumpulan</label>
                    <input type="date" class="form-control" name="to_submission_date" value="{{ Request::get('to_submission_date') }}"  >
                  </div>


                    <div class="form-group col-md-2">
                    <label>Dari Tanggal Dibuat </label>
                    <input type="date" class="form-control" name="from_created_date" value="{{ Request::get('from_created_date') }}"  >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Ke Tanggal Dibuat </label>
                    <input type="date" class="form-control" name="to_created_date" value="{{ Request::get('to_created_date') }}"  >
                  </div>



                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/homework/homework') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>


            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List PR</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kelas </th>
                      <th>Mata Pelajaran</th>
                      <th>Tanggal PR</th>
                      <th>Tanggal Pengumpulan</th>
                      <th>Dokumen</th>
                      <th>Dibuat Oleh</th>
                      <th>Tanggal Dibuat</th>
                      <th>Aksi</th>
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
                          <td>{{ $value->created_by_name }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                          <td>
                             <a href="{{ url('admin/homework/homework/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                             <a href="{{ url('admin/homework/homework/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>

                             <a href="{{ url('admin/homework/homework/submitted/'.$value->id) }}" class="btn btn-success">PR yang Dikumpulkan</a>
                          </td>
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
