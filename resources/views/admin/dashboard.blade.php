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
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <div class="col-xl-4 col-md-6">
                            <div class="card widget-box-one border border-primary bg-soft-primary">
                                <div class="card-body">

                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Total Deposit</p>
                                        <h2>USD @convert($total_deposit)<i class="mdi mdi-arrow-down text-success font-24"></i></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card widget-box-one border border-warning bg-soft-warning">
                                <div class="card-body">

                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Total Withdrawal</p>
                                        <h2>USD @convert($total_withdraw)<i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4 col-md-6">
                            <div class="card widget-box-one border border-danger bg-soft-danger">
                                <div class="card-body">
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Users</p>
                                        <h2> {{ $users_count }} <i class="mdi mdi-arrow-down text-success font-24"></i></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

{{--                        <div class="col-xl-3 col-md-6">--}}
{{--                            <div class="card widget-box-one border border-success bg-soft-success">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="float-right avatar-lg rounded-circle mt-3">--}}
{{--                                        <i class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="wigdet-one-content">--}}
{{--                                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User Today">User Today</p>--}}
{{--                                        <h2><span data-plugin="counterup">895</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- end col -->
                    </div>

                    <!-- end row -->

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
