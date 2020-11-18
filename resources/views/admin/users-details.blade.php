@extends('admin.layouts.app')

@section('content')
    @section('style')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>{{ env('APP_NAME') }} Admin</title>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin2_assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin2_assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    @endsection

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-spacing">

                <!-- Content -->
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-between">
                                <h3 class="">Info</h3>
                            </div>
                            <div class="text-center user-info">
                                <img height="100" width="100" src="{{ $user_details->profile_image }}" alt="avatar">
                                <p class="">{{ $user_details->name }}</p>
                            </div>
                            <h5 class="text text-center mb-2">Account Balance: ${{$user_details->acct_wallet}}</h5>
                            @if( $user_details->user_status == 0)
                                <h5 class="text text-center mb-2">User Status: <span class="badge badge-danger">Unverified</span></h5>
                            @else
                                <h5 class="text text-center mb-2">User Status:  <span class="badge badge-success">Verified</span></h5>
                            @endif
                            <h5 class="text text-center">User Role: {{$user_details->user_role}}</h5>
                            <hr>
                            <h5 class="mb-4 text text-center">User's Action</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    @if( $user_details->user_status == 0)
                                        <a class="btn btn-success mb-2" href="{{ route('admin.verify_user', $user_details->id) }}" role="button" title="Verify this user"><i class="fa fa-check"></i></a>
                                    @else
                                    @endif


                                    <a class="btn btn-primary" href="#" role="button">Deposits</a>
                                    <a class="btn btn-primary " href="{{ route('admin.user_withdraw.show', $user_details->id) }}" role="button">Withdraws</a>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary "  href="{{ route('admin.list_orders', $user_details->id) }}" role="button">User Orders</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                    <div class="work-experience layout-spacing ">

                        <div class="widget-content widget-content-area">

                            <h3 class="">{{ $user_details->name }} Details</h3>

                            <table class="table table-striped" style="width:100%">
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

                    <div class="bio layout-spacing ">
                        <div style="margin-bottom: 20px" class="widget-content widget-content-area">
                            <h3 class="">Bio</h3>
                            <p class="text text-center text-black">{{  $user_details->bio }}</p>
                            <br>
                            <hr>
                            <h4 class="text text-center">User ID Verification</h4>
                            <p style="color: black">ID Type: <span class="text text-primary">{{ $user_details->id_type ? : 'N/A' }}</span></p>
                            <img height="300" width="340" class="mb-5" style="color: black" src="/storage/id_images/{{ $user_details->id_image_1 ? : 'N/A'}}" alt="User ID">

                        </div>

                    </div>

                </div>

            </div>
        </div>

    <!--  END CONTENT AREA  -->

        <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
        <script>
            new ClipboardJS('.btn');
        </script>
@endsection
