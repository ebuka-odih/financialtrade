
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

                            <h5 class="text text-center mt-5">Change Admin Password</h5>
                            <form id="form-settings-password" class="form-horizontal col-md-10" method="POST" action="{{ route('admin.change.password') }}" autocomplete="false">
                                @csrf

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group field-passwordchangeform-password required">
                                    <label class="control-label col-xs-4 col-md-3" for="passwordchangeform-password">New password</label>
                                    <div class='col-xs-8 col-md-6'>
                                        <input type="password" id="passwordchangeform-password" class="form-control" name="new_password" autocomplete="current-password"  aria-required="true"><span class='eye-password'></span>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-passwordchangeform-password_repeat required">
                                    <label class="control-label col-xs-4 col-md-3" for="passwordchangeform-password_repeat">Confirm new password</label>
                                    <div class='col-xs-8 col-md-6'>
                                        <input type="password" id="passwordchangeform-password_repeat" class="form-control" name="new_confirm_password" autocomplete="current-password" aria-required="true"><span class='eye-password'></span>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-passwordchangeform-password_old required">
                                    <label class="control-label col-xs-4 col-md-3" for="passwordchangeform-password_old">Enter your current password</label>
                                    <div class='col-xs-8 col-md-6'>
                                        <input type="password" id="passwordchangeform-password_old" class="form-control" name="current_password" autocomplete="current-password" aria-required="true"><span class='eye-password'></span>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-12 mb-10 text-center">
                                        <button type="submit" class="btn btn-wide btn-success demo-notice">Set a new password</button>
                                    </div>
                                </div>
                            </form>
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
