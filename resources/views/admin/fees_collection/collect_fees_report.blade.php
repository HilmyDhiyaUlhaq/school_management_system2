@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Pengumpulan Biaya </h1>
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
                <h3 class="card-title">Mencari Mengumpulkan Biaya Laporan</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                  <div class="form-group col-md-2">
                    <label>ID Siswa</label>
                    <input type="text" class="form-control" placeholder="Student ID" value="{{ Request::get('student_id') }}" name="student_id">
                  </div>


                   <div class="form-group col-md-2">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" placeholder="Student Name" value="{{ Request::get('student_name') }}" name="student_name">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Nama Akhir Siswa</label>
                    <input type="text" class="form-control" placeholder="Student Last Name" value="{{ Request::get('student_last_name') }}" name="student_last_name">
                  </div>



                  <div class="form-group col-md-2">
                    <label>Kelas</label>
                    <select class="form-control" name="class_id" >
                        <option value="">Pilih</option>
                        @foreach($getClass as $class)
                          <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                  </div>

                   <div class="form-group col-md-2">
                    <label>Mulai Tanggal Dibuat</label>
                    <input type="date" class="form-control"  value="{{ Request::get('start_created_date') }}" name="start_created_date">
                  </div>

                   <div class="form-group col-md-2">
                    <label>Akhiri Tanggal Dibuat</label>
                    <input type="date" class="form-control"  value="{{ Request::get('end_created_date') }}" name="end_created_date">
                  </div>


                  <div class="form-group col-md-2">
                    <label>Tipe Pembayaran</label>
                    <select class="form-control" name="payment_type">
                        <option value="">Pilih</option>
                        <option {{ (Request::get('payment_type') == 'Cash') ? 'selected' : '' }} value="Cash">Tunai</option>
                        <option {{ (Request::get('payment_type') == 'Cheque') ? 'selected' : '' }} value="Cheque">Cek</option>
                        <option {{ (Request::get('payment_type') == 'Paypal') ? 'selected' : '' }} value="Paypal">Paypal</option>
                        <option {{ (Request::get('payment_type') == 'Stripe') ? 'selected' : '' }} value="Stripe">Stripe</option>
                    </select>
                  </div>


                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/fees_collection/collect_fees_report') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>

                  </div>

                  </div>
                </div>
              </form>
            </div>





             @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Biaya Pengumpulan</h3>
                <form style="float: right;" method="post" action="{{ url('admin/fees_collection/export_collect_fees_report') }}">
                   {{ csrf_field() }}
                  <input type="hidden" value="{{ Request::get('student_id') }}" name="student_id">
                  <input type="hidden" value="{{ Request::get('student_name') }}" name="student_name">
                  <input type="hidden" value="{{ Request::get('student_last_name') }}" name="student_last_name">
                  <input type="hidden" value="{{ Request::get('class_id') }}" name="class_id">
                  <input type="hidden" value="{{ Request::get('start_created_date') }}" name="start_created_date">
                  <input type="hidden" value="{{ Request::get('end_created_date') }}" name="end_created_date">
                  <input type="hidden" value="{{ Request::get('payment_type') }}" name="payment_type">
                  <button type="submit" class="btn btn-primary">Export Excel</button>
                </form>
              </div>

              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Nama Kelas</th>
                      <th>Jumlah Total</th>
                      <th>Jumlah Terbayar</th>
                      <th>Jumlah Tersisa</th>
                      <th>Tipe Pembayaran</th>
                      <th>Komentar</th>
                      <th>Dibuat Oleh</th>
                      <th>Tanggal Dibuat</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse($getRecord as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->student_id }}</td>
                          <td>{{ $value->student_name_first }} {{ $value->student_name_last }}</td>
                          <td>{{ $value->class_name }}</td>
                          <td>${{ number_format($value->total_amount, 2) }}</td>
                          <td>${{ number_format($value->paid_amount, 2) }}</td>
                          <td>${{ number_format($value->remaning_amount, 2) }}</td>
                          <td>{{ $value->payment_type }}</td>
                          <td>{{ $value->remark }}</td>
                          <td>{{ $value->created_name }}</td>
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

@section('script')


@endsection
