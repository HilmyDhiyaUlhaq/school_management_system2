@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><i class="fas fa-user-graduate"></i> List Siswa (Total : {{ $getRecord->total() }})</h1>
              </div>
              <div class="col-sm-6" style="text-align: right;">
                  <a href="{{ url('admin/student/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambahkan Siswa Baru</a>
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

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title"> Cari Siswa</h3>
                  </div>
                  <form method="get" action="">
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-2">
                          <label> Nama</label>
                          <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Nama">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Nama Akhir</label>
                          <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name" placeholder="Nama Akhir">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Email</label>
                          <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Nomor Pendaftaran</label>
                          <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}" placeholder="Nomor Pendaftaran">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Nomor Urut</label>
                          <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}" placeholder="Nomor Urut">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Kelas</label>
                          <input type="text" class="form-control" name="class" value="{{ Request::get('class') }}" placeholder="Kelas">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Jenis Kelamin</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Laki-Laki</option>
                                <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                          <label> Nomor HP</label>
                          <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Nomor HP">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Golongan Darah</label>
                          <input type="text" class="form-control" name="blood_group" value="{{ Request::get('blood_group') }}" placeholder="Golongan Darah">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Aktif</option>
                                <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inaktif</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                          <label> Tanggal Penerimaan</label>
                          <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}">
                        </div>

                        <div class="form-group col-md-2">
                          <label> Tanggal Dibuat</label>
                          <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Tanggal">
                        </div>

                        <div class="form-group col-md-3">
                          <button class="btn btn-primary" type="submit" style="margin-top: 30px;"><i class="fas fa-search"></i> Cari</button>
                          <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top: 30px;"><i class="fas fa-sync"></i> Reset</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

                @include('_message')

                <!-- /.card -->

                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title"> List Siswa</h3>
                    <form action="{{ url('admin/student/export_excel') }}" method="post" style="float: right;">
                        {{ csrf_field() }}
                        <input type="hidden" name="name" value="{{ Request::get('name') }}">
                        <input type="hidden" name="last_name" value="{{ Request::get('last_name') }}">
                        <input type="hidden" name="email" value="{{ Request::get('email') }}">
                        <input type="hidden" name="admission_number" value="{{ Request::get('admission_number') }}">
                        <input type="hidden" name="roll_number" value="{{ Request::get('roll_number') }}">
                        <input type="hidden" name="gender" value="{{ Request::get('gender') }}">
                        <input type="hidden" name="class" value="{{ Request::get('class') }}">
                        <input type="hidden" name="mobile_number" value="{{ Request::get('mobile_number') }}">
                        <input type="hidden" name="blood_group" value="{{ Request::get('blood_group') }}">
                        <input type="hidden" name="status" value="{{ Request::get('status') }}">
                        <input type="hidden" name="admission_date" value="{{ Request::get('admission_date') }}">
                        <input type="hidden" name="date" value="{{ Request::get('date') }}">
                        <button class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</button>
                    </form>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th class="text-nowrap">#</th>
                            <th class="text-nowrap">Foto</th>
                            <th class="text-nowrap">Nama Siswa</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">No. Pendaftaran</th>
                            <th class="text-nowrap">No. Urut</th>
                            <th class="text-nowrap">Kelas</th>
                            <th class="text-nowrap">Orang Tua</th>
                            <th class="text-nowrap">Gender</th>
                            <th class="text-nowrap">Tgl Lahir</th>
                            <th class="text-nowrap">No. HP</th>
                            <th class="text-nowrap">Tgl Masuk</th>
                            <th class="text-nowrap">Gol. Darah</th>
                            <th class="text-nowrap">Tinggi</th>
                            <th class="text-nowrap">Berat</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Tgl Dibuat</th>
                            <th class="text-nowrap">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $value)
                            <tr>
                                <!-- 1. Nomor -->
                                <td>{{ $loop->iteration }}</td>

                                <!-- 2. Foto -->
                                <td class="text-center">
                                    @if(!empty($value->getProfile()))
                                        <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50px;">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="height: 50px; width: 50px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </td>

                                <!-- 3. Nama Siswa -->
                                <td>{{ $value->name }} {{ $value->last_name }}</td>

                                <!-- 4. Email -->
                                <td>{{ $value->email }}</td>

                                <!-- 5. No. Pendaftaran -->
                                <td>{{ $value->admission_number ?? '-' }}</td>

                                <!-- 6. No. Urut -->
                                <td>{{ $value->roll_number ?? '-' }}</td>

                                <!-- 7. Kelas -->
                                <td>{{ $value->class_name ?? '-' }}</td>

                                <!-- 8. Orang Tua -->
                                <td>
                                    {{ $value->getParentName() }}
                                    @if($value->parent)
                                        <br><small class="text-muted">{{ $value->getParentEmail() }}</small>
                                    @endif
                                </td>

                                <!-- 9. Gender -->
                                <td>
                                    @if($value->gender == 'Male')
                                        <span class="badge badge-primary">Laki-laki</span>
                                    @elseif($value->gender == 'Female')
                                        <span class="badge badge-pink">Perempuan</span>
                                    @else
                                        <span class="badge badge-secondary">-</span>
                                    @endif
                                </td>

                                <!-- 10. Tanggal Lahir -->
                                <td>
                                    @if(!empty($value->date_of_birth))
                                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- 11. No. HP -->
                                <td>{{ $value->mobile_number ?? '-' }}</td>

                                <!-- 12. Tanggal Masuk -->
                                <td>
                                    @if(!empty($value->admission_date))
                                        {{ date('d-m-Y', strtotime($value->admission_date)) }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- 13. Golongan Darah -->
                                <td>{{ $value->blood_group ?? '-' }}</td>

                                <!-- 14. Tinggi -->
                                <td>
                                    @if(!empty($value->height))
                                        {{ $value->height }} cm
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- 15. Berat -->
                                <td>
                                    @if(!empty($value->weight))
                                        {{ $value->weight }} kg
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- 16. Status -->
                                <td>
                                    @if($value->status == 0)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Inaktif</span>
                                    @endif
                                </td>

                                <!-- 17. Tanggal Dibuat -->
                                <td>{{ date('d-m-Y H:i', strtotime($value->created_at)) }}</td>

                                <!-- 18. Aksi -->
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ url('admin/student/edit/' . $value->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('admin/student/delete/' . $value->id) }}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{ url('chat?receiver_id='.base64_encode($value->id)) }}" class="btn btn-success btn-sm" title="Pesan">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>

                    <!-- Styling tambahan -->
                    <style>
                      .table-responsive {
                        overflow-x: auto;
                      }

                      .table {
                        width: auto;
                        max-width: none;
                        table-layout: auto;
                      }

                      .table td {
                        white-space: normal;
                        word-wrap: break-word;
                        min-width: 50px;
                        padding: 8px;
                        vertical-align: middle;
                      }

                      .table th {
                        background-color: #f4f6f9;
                        font-weight: 600;
                        vertical-align: middle;
                        padding: 10px 8px;
                      }

                      .text-nowrap {
                        white-space: nowrap !important;
                      }

                      .btn-sm {
                        padding: 0.25rem 0.5rem;
                        font-size: 0.875rem;
                      }

                      .img-circle.elevation-2 {
                        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
                      }

                      .card-primary.card-outline {
                        border-top: 3px solid #007bff;
                      }

                      .badge {
                        font-size: 85%;
                        padding: 0.35em 0.65em;
                      }
                    </style>

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
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>

@endsection
