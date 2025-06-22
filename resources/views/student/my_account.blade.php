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
                      <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" required placeholder="First Name">
                      <div style="color:red">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Nama Belakang <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name) }}" name="last_name" required placeholder="Last Name">
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
                      <label>Tanggal Kelahiran <span style="color: red;">*</span></label>
                      <input type="date" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth" >
                      <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                    </div>


                     <div class="form-group col-md-6">
                      <label>Kasta <span style="color: red;"></span></label>
                      <input type="text" class="form-control" value="{{ old('caste', $getRecord->caste) }}" name="caste"  placeholder="Caste">
                      <div style="color:red">{{ $errors->first('caste') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Agama <span style="color: red;"></span></label>
                      <input type="text" class="form-control" value="{{ old('religion', $getRecord->religion) }}" name="religion"  placeholder="Religion">
                      <div style="color:red">{{ $errors->first('religion') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Nomor HP <span style="color: red;"></span></label>
                      <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number) }}" name="mobile_number"  placeholder="Mobile Number">
                      <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                    </div>



                    <div class="form-group col-md-6">
                      <label>Foto Profil <span style="color: red;"></span></label>
                      <input type="file" class="form-control" name="profile_pic" >
                      <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                      @if(!empty($getRecord->getProfile()))
                        <img src="{{  $getRecord->getProfile() }}" style="width: auto;height: 50px;">
                      @endif
                    </div>

                     <div class="form-group col-md-6">
                      <label>Golongan Darah <span style="color: red;"></span></label>
                      <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group) }}" placeholder="Blood Group">
                      <div style="color:red">{{ $errors->first('blood_group') }}</div>
                    </div>


                     <div class="form-group col-md-6">
                      <label>Tinggi <span style="color: red;"></span></label>
                      <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height) }}" placeholder="Height">
                      <div style="color:red">{{ $errors->first('height') }}</div>
                    </div>


                     <div class="form-group col-md-6">
                      <label>Berat <span style="color: red;"></span></label>
                      <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight) }}" placeholder="Weight">
                      <div style="color:red">{{ $errors->first('weight') }}</div>
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
