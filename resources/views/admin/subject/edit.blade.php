@extends('layouts.app')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Mapel</h1>
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
              <form method="post" action="">
                 {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Mapel</label>
                    <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Subject Name">
                  </div>


                 <div class="form-group">
                    <label>Tipe Mapel</label>
                    <select class="form-control" name="type" required>
                    	  <option value="">Pilih Tipe</option>
                      	<option {{ ($getRecord->type == 'Theory') ? 'selected' : '' }} value="Theory">Teori</option>
                        <option {{ ($getRecord->type == 'Practical') ? 'selected' : '' }} value="Practical">Praktek</option>
                    </select>

                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Aktif</option>
                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inaktif</option>
                    </select>

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
