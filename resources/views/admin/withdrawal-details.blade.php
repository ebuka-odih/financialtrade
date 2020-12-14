@extends('admin.layouts.app2')
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <h4 class="page-title">Withdrawal Invoice</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="panel-heading">
                                    <h4>Invoice</h4>
                                </div> -->
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <h3 class="mt-0"><img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="24" class="mr-1">
                                            {{ optional($show_withdraw->user)->name }}</h3>
                                    </div>
{{--                                    <div class="float-right">--}}
{{--                                        <h5 class="mt-0">Invoice # <br>--}}
{{--                                            <strong>2016-04-23654789</strong>--}}
{{--                                        </h5>--}}
{{--                                    </div>--}}
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 col-lg-10">
                                        <div class="float-right mt-3">
                                            <p><strong>Order Date: </strong> {{ date('d/m/Y', strtotime($show_withdraw->created_at)) }}</p>
                                            <p><strong>Approved Date: </strong> {{ date('d/m/Y', strtotime($show_withdraw->approved_date)) }}</p>
                                            <p><strong>Order Status: </strong> <span>{!! $show_withdraw->admin_status() !!}</span></p>
                                        </div>

                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                                @if(session()->has('success'))
                                    <span class="text text-success">{{ session('success') }}</span>
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">

                                            <table class="table mt-4">
                                                <tr>
                                                    <th colspan="2"> Amount:</th>
                                                    <td>$@convert($show_withdraw->amount)</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Trans Hash:</th>
                                                    <td>{{ $show_withdraw->trans_hash }}%</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Payment Method:</th>
                                                    <td>{{ $show_withdraw->payment_method }}</td>
                                                </tr>

                                                <tr>

                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Payment Hash</th>
                                                    <td>
                                                        <form action="">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Enter Payment Hash" name="trans_hash">
                                                                <small>This is way to send your client the real bitcoin transaction hash if you want to</small>
                                                            </div>

                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @if($show_withdraw->status == "pending")
                                                <tr>
                                                    <th colspan="2">Action:</th>
                                                    <td><a href="{{ route('admin.accept_withdrawal', $show_withdraw->id) }}" class="btn btn-primary">Approve Withdrawal</a></td>
                                                </tr>
                                                @else
                                                @endif
                                            </table>

                                        </div>
                                    </div>
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <p class="text-right"><b>Progress:</b> Day {{ $deposit->progress() }}</p>--}}
{{--                                        <hr>--}}
{{--                                       <h3 class="text-right"> Earned: ${{ $deposit->total_earned() }}</h3>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <hr>
                                <div class="hidden-print">
                                    <div class="float-right d-print-none">
                                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2018 - 2020 &copy; Zircos theme by <a href="#">Coderthemes</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
