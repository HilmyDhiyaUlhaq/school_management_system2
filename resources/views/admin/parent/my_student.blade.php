@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Siswa & Orang Tua ({{ $getParent->name }} {{ $getParent->last_name }})</h1>
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
                    <label>ID Siswa</label>
                    <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id"  placeholder="Student ID">
                  </div>


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



                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/parent/my-student/'.$parent_id) }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>


            @include('_message')

            <!-- /.card -->

@if(!empty($getSearchStudent))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto Profil</th>
                      <th>Nama Siswa</th>
                      <th>Email</th>
                      <th>Nama Orang Tua</th>
                      <th>Tanggal Dibuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($getSearchStudent as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>
                            @if(!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width:50px; border-radius: 50px;">
                            @endif
                          </td>
                          <td>{{ $value->name }} {{ $value->last_name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->parent_name }}</td>

                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td style="min-width: 150px;">

                            <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm">Tambahkan Siswa ke Orang Tua</a>

                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">

                </div>

              </div>

              <!-- /.card-body -->
            </div>
@endif



             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Orang Tua Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                 <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto Profil</th>
                      <th>Nama Siswa</th>
                      <th>Email</th>
                      <th>Nama Orang Tua</th>
                      <th>Tanggal Dibuat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>
                            @if(!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width:50px; border-radius: 50px;">
                            @endif
                          </td>
                          <td>{{ $value->name }} {{ $value->last_name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->parent_name }}</td>

                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td style="min-width: 150px;">

                            <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>

                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">

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
