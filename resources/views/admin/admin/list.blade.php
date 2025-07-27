@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Tambahkan Admin Baru</a>
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
                <h3 class="card-title">Search Admin</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">


                  <div class="form-group col-md-3">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name"  placeholder="Nama">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}"  placeholder="Email">
                  </div>

                    <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}"  placeholder="Tanggal">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/admin/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>



            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">Profile Pic</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 15%">Created Date</th>
                        <th style="width: 30%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td class="text-center">
                            @if(!empty($value->getProfileDirect()))
                            <img src="{{ $value->getProfileDirect() }}" class="img-circle elevation-2" style="height: 50px; width:50px;">
                            @endif
                          </td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td>
                            <div class="btn-group">
                              <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-sm btn-primary mr-1">
                                <i class="fas fa-edit"></i> Edit
                              </a>
                              <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-sm btn-danger mr-1" onclick="return confirm('Are you sure you want to delete this admin?')">
                                <i class="fas fa-trash"></i> Delete
                              </a>
                              <a href="{{ url('chat?receiver_id='.base64_encode($value->id)) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-comments"></i> Message
                              </a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
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
