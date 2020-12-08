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
                            <h4 class="page-title">{{ $user_details->name }} Messages</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xl-3 col-md-4">
                                    <div class="text-center card-box shadow-none border border-secoundary">
                                        <div class="member-card">
                                            <div class="avatar-xl member-thumb mb-3 mx-auto d-block">
                                                <img src="{{ $user_details->profile_image }}" class="rounded-circle img-thumbnail" alt="profile-image">
                                                <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                            </div>

                                            <div class="">
                                                <h5 class="font-18 mb-1">{{ $user_details->name }}</h5>
                                                <p class="text-muted mb-2">{{ $user_details->email }}</p>
                                            </div>
                                            <a href="{{ route('admin.user_message', $user_details->id) }}" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Messages</a>
                                            <a href="{{ route('admin.list_orders', $user_details->id) }}" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">User Trades</a>
                                            <a href="{{ route('admin.user_deposits', $user_details->id) }}" class="btn btn-primary btn-sm width-sm waves-effect mt-2 waves-light">Deposits</a>
                                            <a href="{{ route('admin.user_withdraw.show', $user_details->id) }}" class="btn btn-primary btn-sm width-sm waves-effect mt-2 waves-light">Withdrawal</a>


                                            <hr/>


                                        </div>

                                    </div>
                                    <!-- end card-box -->

                                </div>
                                <!-- end col -->

                                <div class="col-xl-9 col-md-8">

                                    <h4 class="text text-center">Create Message</h4>
                                        <form class="form-horizontal" action="{{ route('admin.mesg_store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $user_details->id }}" name="user_id">
                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" class="form-control" placeholder="The title of your message">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-2 control-label">Message Body</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="message" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary">Submit</button>

                                        </form>
                                </div>
                                <!-- end col -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->

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
