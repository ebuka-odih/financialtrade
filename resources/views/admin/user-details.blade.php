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
                            <h4 class="page-title">{{ $user_details->name }} Deposits</h4>
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


                                            <hr/>

{{--                                            <div class="text-left">--}}
{{--                                                <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ml-4">{{ $user_details->name }}</span></p>--}}

{{--                                                <p class="text-muted font-13"><strong>Email :</strong> <span class="ml-4">{{ $user_details->email }}</span></p>--}}

{{--                                                <p class="text-muted font-13"><strong>Joined At :</strong> <span class="ml-4">{{ date('d/m/Y', strtotime($user_details->created_at)) }}</span></p>--}}
{{--                                            </div>--}}


                                        </div>

                                    </div>
                                    <!-- end card-box -->

                                </div>
                                <!-- end col -->

                                <div class="col-xl-9 col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <!-- <div class="panel-heading">
                                                        <h4>Invoice</h4>
                                                    </div> -->
                                                <div class="card-body">
                                                    <!-- end row -->

                                                    <div class="row">
                                                            <div class="table-responsive">
                                                                    <table class="table mt-4">
                                                                        <tr>
                                                                            <th>Title:</th>
                                                                            <td class="text text-capitalize">{{ $user_details->title }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Gender:</th>
                                                                            <td class="text text-capitalize">{{ $user_details->gender }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Email:</th>
                                                                            <td>{{ $user_details->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Phone:</th>
                                                                            <td>{{ $user_details->phone }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Country:</th>
                                                                            <td>{{ $user_details->country }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>State:</th>
                                                                            <td>{{ $user_details->state }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>City & Postal Code:</th>
                                                                            <td>{{ $user_details->city }}, {{$user_details->postal_code}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>BTC Wallet:</th>
                                                                            <td><input class="form-control" id="foo" value="{{ $user_details->btc_wallet }}">
                                                                                <button class="btn" data-clipboard-target="#foo">
                                                                                    <img height="20px" src="{{ asset('assets/clippy.svg') }}" alt="Copy to clipboard">
                                                                                </button>
                                                                            </td><br>
                                                                        </tr>
                                                                        <tr >
                                                                            <th style="margin-top: 20px">Fund Account:</th>
                                                                            <td>
                                                                                @if(session()->has('success_message'))
                                                                                    <div class="alert alert-success">
                                                                                        {{ session()->get('success_message') }}
                                                                                    </div>
                                                                                @endif
                                                                                <form action="{{ route('admin.fund_acct.store', $user_details->id) }}" method="POST">
                                                                                    @csrf
                                                                                    <label>Enter Amount</label>
                                                                                    <input type="number" class="form-control"  name="bonus">
                                                                                    <button type="submit" class="btn btn-sm btn-primary mt-2">Send</button>
                                                                                </form></td>
                                                                        </tr>

                                                                    </table>

                                                            </div>
                                                    </div>

                                                    <hr>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="bio layout-spacing ">
                                        <div style="margin-bottom: 20px" class="widget-content widget-content-area">
                                            <h3 class="">Bio</h3>
                                            <p class="text text-center text-black">{{  $user_details->bio }}</p>
                                            <br>
                                            <hr>
                                            <h4 class="text text-center">User ID Verification</h4>
                                            <p style="color: black">ID Type: <span class="text text-primary">{{ $user_details->id_type ? : 'N/A' }}</span></p>
                                            <img height="300" width="340" class="mb-5" style="color: black" src="/storage/id_images/{{ $user_details->id_image_1 ? : 'N/A'}}" alt="User ID">
                                            <hr>
                                            <table>
                                                <tr>
                                                    <th style="margin-top: 20px">Defund Account:</th>
                                                    <td>
                                                        @if(session()->has('defund'))
                                                            <div class="alert alert-success">
                                                                {{ session()->get('defund') }}
                                                            </div>
                                                        @endif
                                                        <form action="{{ route('admin.defund_acct', $user_details->id) }}" method="POST">
                                                            @csrf
                                                            <label>Enter Amount</label>
                                                            <input type="number" class="form-control col-md-12"  name="defund">
                                                            <button type="submit" class="btn btn-sm btn-primary mt-2">Defund</button>
                                                        </form>
                                                        <br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>



                                    </div>
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
