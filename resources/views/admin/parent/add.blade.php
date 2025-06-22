@extends('layouts.app')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambahkan Orang Tua Baru</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Nama Depan <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="First Name">
                      <div style="color:red">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Nama Akhir <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required placeholder="Last Name">
                      <div style="color:red">{{ $errors->first('last_name') }}</div>
                    </div>




                    <div class="form-group col-md-6">
                      <label>Gender <span style="color: red;">*</span></label>
                      <select class="form-control" required name="gender">
                          <option value="">Pilih Jender</option>
                          <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                          <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>

                      </select>
                      <div style="color:red">{{ $errors->first('gender') }}</div>
                    </div>




                     <div class="form-group col-md-6">
                      <label>Pekerjaan <span style="color: red;"></span></label>
                      <input type="text" class="form-control" value="{{ old('occupation') }}" name="occupation"  placeholder="Occupation">
                      <div style="color:red">{{ $errors->first('occupation') }}</div>
                    </div>


                    <div class="form-group col-md-6">
                      <label>Nomor HP <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" required value="{{ old('mobile_number') }}" name="mobile_number"  placeholder="Mobile Number">
                      <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                    </div>

                     <div class="form-group col-md-6">
                      <label>Alamat  <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" required value="{{ old('address') }}" name="address"  placeholder="Address">
                      <div style="color:red">{{ $errors->first('address') }}</div>
                    </div>




                    <div class="form-group col-md-6">
                      <label>Foto Profil <span style="color: red;"></span></label>
                      <input type="file" class="form-control" name="profile_pic" >
                      <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                    </div>




                     <div class="form-group col-md-6">
                      <label>Status <span style="color: red;">*</span></label>
                      <select class="form-control" required name="status">
                          <option value="">Select Status</option>
                          <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Aktif</option>
                          <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inaktif</option>
                      </select>
                      <div style="color:red">{{ $errors->first('status') }}</div>
                    </div>

                  </div>

                  <hr />



                  <div class="form-group">
                    <label>Email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
