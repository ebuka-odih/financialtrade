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
                            <h4 class="page-title">Create Trade</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title">Make a trade related to this user</h4><br>

                            <div class="row">
                                <div class="col-lg-10">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">Text</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" value="Some text value...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" value="password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">Placeholder</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="placeholder">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">Text area</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                    </form>
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
