@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-money-bill-wave"></i> Mengumpulkan Biaya</h1>
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
                <h3 class="card-title"> Cari Kumpulkan Biaya Siswa </h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-2">
                      <label> Kelas</label>
                      <select class="form-control" name="class_id">
                        <option value="">Pilih Kelas</option>
                        @foreach($getClass as $class)
                        <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-md-2">
                      <label> ID Siswa</label>
                      <input type="text" class="form-control" value="{{ Request::get('student_id') }}" name="student_id" placeholder="Student ID">
                    </div>

                    <div class="form-group col-md-3">
                      <label> Nama Depan Siswa</label>
                      <input type="text" class="form-control" value="{{ Request::get('first_name') }}" name="first_name" placeholder="Student First Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label> Nama Akhir Siswa</label>
                      <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name" placeholder="Student Last Name">
                    </div>

                    <div class="form-group col-md-2">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Cari</button>
                      <a href="{{ url('admin/fees_collection/collect_fees') }}" class="btn btn-success" style="margin-top: 30px;"><i class="fas fa-sync"></i> Reset</a>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-nowrap"> ID Siswa</th>
                        <th> Nama Siswa</th>
                        <th> Nama Kelas</th>
                        <th class="text-nowrap"> Jumlah Total</th>
                        <th class="text-nowrap"> Jumlah Terbayar</th>
                        <th class="text-nowrap"> Jumlah Tersisa</th>
                        <th class="text-nowrap"> Tanggal Dibuat</th>
                        <th class="text-nowrap"> Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($getRecord))
                        @forelse($getRecord as $value)
                          @php
                            $paid_amount = $value->getPaidAmount($value->id, $value->class_id);
                            $RemaningAmount = $value->amount - $paid_amount;
                          @endphp
                          <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                            <td>{{ $value->class_name }}</td>
                            <td class="text-nowrap"><span class="text-primary font-weight-bold">Rp {{ number_format($value->amount, 0, ',', '.') }}</span></td>
                            <td class="text-nowrap"><span class="text-success font-weight-bold">Rp {{ number_format($paid_amount, 0, ',', '.') }}</span></td>
                            <td class="text-nowrap">
                              @if($RemaningAmount > 0)
                                <span class="text-danger font-weight-bold">Rp {{ number_format($RemaningAmount, 0, ',', '.') }}</span>
                              @else
                                <span class="text-success font-weight-bold">Rp {{ number_format($RemaningAmount, 0, ',', '.') }}</span>
                              @endif
                            </td>
                            <td class="text-nowrap">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                            <td class="text-nowrap">
                              <a href="{{ url('admin/fees_collection/collect_fees/add_fees/'.$value->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-money-bill-wave"></i> Kumpulkan Biaya
                              </a>
                              <a href="{{ url('admin/fees_collection/collect_fees/history/'.$value->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-history"></i> Histori
                              </a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="8" class="text-center">Data Tidak Ditemukan</td>
                          </tr>
                        @endforelse
                      @else
                        <tr>
                          <td colspan="8" class="text-center">Data Tidak Ditemukan</td>
                        </tr>
                      @endif
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
                    margin-right: 5px;
                  }

                  .card-primary.card-outline {
                    border-top: 3px solid #007bff;
                  }

                  .text-center {
                    text-align: center !important;
                  }

                  .font-weight-bold {
                    font-weight: bold;
                  }
                </style>

                <div class="d-flex justify-content-end mt-3">
                  @if(!empty($getRecord))
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  @endif
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
