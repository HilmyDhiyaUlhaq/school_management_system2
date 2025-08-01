@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PR yang Diajukan</h1>
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
                <h3 class="card-title">Cari PR yang Diajukan</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                  <div class="form-group col-md-2">
                    <label>Nama Depan Siswa</label>
                    <input type="text" class="form-control" name="first_name" value="{{ Request::get('first_name') }}" placeholder="Student First Name" >
                  </div>


                   <div class="form-group col-md-2">
                    <label>Nama Akhir Siswa</label>
                    <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}" placeholder="Student Last Name" >
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
                    <a href="{{ url('teacher/homework/homework/submitted/'.$homework_id) }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>


            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Daftar PR yang Diajukan</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Siswa</th>
                      <th>Dokumen</th>
                      <th>Deskripsi</th>
                      <th>Tanggal Dibuat</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse($getRecord as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->first_name }} {{ $value->last_name }}</td>
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
