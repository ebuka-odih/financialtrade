
@extends('admin.layouts.app2')
@section('content')
    <!-- Table datatable css -->




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
                            <h4 class="page-title">All Deposits</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title"><b>Deposit of All Users</b></h4>

                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Wallet Id</th>
                                    <th>Wallet QrCode</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-capitalize">Start Amount</td>
                                    <td>
                                        <form action="{{ route('admin.start_amount') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control col-md-5" name="start_amount" value="{{ setting('start_amount') }}" /><br>
                                                <small>You can enter your start amount here and it will show on your homepage and any place your start amount is</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </td>
                                    <td>{{ setting('start_amount') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-capitalize">Wallet ID</td>
                                    <td>
                                        <form action="{{ route('admin.setting.store') }}" method="POST">
                                            @csrf
                                            <input class="form-control col-md-7" name="wallet_id" value="{{ setting('wallet_id') }}" /><br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </td>
                                    <td>${{ setting('wallet_id') }}</td>
                                </tr>

                                <tr>
                                    <td class="text-capitalize">Wallet Qrcode</td>
                                    <td>
                                        <form action="{{ route('admin.qrcode') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="file" class="form-control" value="{{ setting('qrcode') }}" name="qrcode">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </td>
                                    <td><img src="/storage/qrcode/{{ setting('qrcode') }}" alt=""></td>
                                </tr>

                                </tbody>
                            </table>
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




    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );

    </script>
@endsection
