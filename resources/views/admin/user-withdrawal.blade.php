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
                            <h4 class="page-title">{{ $user_details->name }} Withdrawals</h4>
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
                                                <a href="{{ route('admin.user_details', $user_details->id) }}">
                                                    <img src="{{ $user_details->profile_image }}" class="rounded-circle img-thumbnail" alt="profile-image">
                                                </a>
                                            </div>

                                            <div class="">
                                                <h5 class="font-18 mb-1">{{ $user_details->name }}</h5>
                                                <p class="text-muted mb-2">{{ $user_details->email }}</p>
                                                <p class="text-muted mb-2">{!! $user_details->admin_status() !!}</p>
                                                <p class="text-muted mb-2">Balance: $@convert($user_details->acct_wallet)</p>
                                            </div>
                                            <hr>
                                            <a href="{{ route('admin.user_message', $user_details->id) }}" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Messages</a>
                                            <a href="{{ route('admin.list_orders', $user_details->id) }}" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">User Trades</a>
                                            <a href="{{ route('admin.user_deposits', $user_details->id) }}" class="btn btn-primary btn-sm width-sm waves-effect mt-2 waves-light">Deposits</a>
                                            <a href="{{ route('admin.user_withdraw.show', $user_details->id) }}" class="btn btn-primary btn-sm width-sm waves-effect mt-2 waves-light">Withdrawal</a>

                                            @if( $user_details->user_status == 0)
                                                <a href="{{ route('admin.verify_user', $user_details->id) }}" title="Verify this user" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Verify</a>
                                            @else
                                            @endif



                                            <hr/>
                                        </div>

                                    </div>
                                    <!-- end card-box -->

                                </div>
                                <!-- end col -->

                                <div class="col-xl-9 col-md-8">
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Approved Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_withdrawals->withdrawal as $user_withdrawal)
                                            <tr>
                                                <td><strong>{{ date('d/m/y', strtotime($user_withdrawal->created_at)) }}</strong></td>
                                                @if($user_withdrawal->status == 'pending')
                                                    <td><strong>"dd/mm/yy"</strong></td>
                                                @else
                                                    <td><strong>{{ date('d/m/y', strtotime($user_withdrawal->approved_date)) }}</strong></td>
                                                @endif
                                                {{--                                        <td><strong>{{ $user_withdrawal->user->name }}</strong></td>--}}
                                                <td><strong>{{ $user_withdrawal->amount }}</strong></td>
                                                <td><strong>{!! $user_withdrawal->admin_status() !!}</strong></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.withdrawal_details', $user_withdrawal->id) }}" class="btn btn-secondary btn-sm">View</a>
                                                        @if($user_withdrawal->status != 'pending')
                                                        @else
                                                            <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                                <a class="dropdown-item" href="{{ route('admin.accept_withdrawal', $user_withdrawal->id) }}">Approve</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
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
