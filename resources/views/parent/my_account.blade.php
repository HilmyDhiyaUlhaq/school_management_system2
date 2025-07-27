@extends('layouts.app')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Akun Saya</h1>
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

             @include('_message')

            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Nama Depan <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" required placeholder="Nama Depan">
                      <div style="color:red">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Nama Akhir <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name) }}" name="last_name" required placeholder="Nama Belakang">
                      <div style="color:red">{{ $errors->first('last_name') }}</div>
                    </div>




                    <div class="form-group col-md-6">
                      <label>Jenis Kelamin <span style="color: red;">*</span></label>
                      <select class="form-control" required name="gender">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                          <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>

                      </select>
                      <div style="color:red">{{ $errors->first('gender') }}</div>
                    </div>




                     <div class="form-group col-md-6">
                      <label>Pekerjaan <span style="color: red;"></span></label>
                      <input type="text" class="form-control" value="{{ old('occupation', $getRecord->occupation) }}" name="occupation"  placeholder="Pekerjaan">
                      <div style="color:red">{{ $errors->first('occupation') }}</div>
                    </div>


                    <div class="form-group col-md-6">
                      <label>Nomor HP <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" required value="{{ old('mobile_number', $getRecord->mobile_number) }}" name="mobile_number"  placeholder="Nomor HP">
                      <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                    </div>

                     <div class="form-group col-md-6">
                      <label>Alamat <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" required value="{{ old('address', $getRecord->address) }}" name="address"  placeholder="Alamat">
                      <div style="color:red">{{ $errors->first('address') }}</div>
                    </div>




                    <div class="form-group col-md-6">
                      <label>Foto Profil <span style="color: red;"></span></label>
                      <input type="file" class="form-control" name="profile_pic" >
                      <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                       @if(!empty($getRecord->getProfile()))
                        <img src="{{  $getRecord->getProfile() }}" style="width: auto;height: 50px;">
                      @endif
                    </div>






                  </div>

                  <hr />



                  <div class="form-group">
                    <label>Email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Email">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
