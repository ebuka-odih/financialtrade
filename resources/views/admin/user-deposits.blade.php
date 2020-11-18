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
                                    <a class="btn btn-success mb-2" href="{{ route('admin.verify_user', $user_details->id) }}" role="button"><i class="fa fa-check"></i></a>
                                    @else
                                        @endif


                                       <a class="btn btn-primary" href="#" role="button">Deposits</a>
                                       <a class="btn btn-primary " href="#" role="button">Withdraws</a>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-primary "  href="{{ route('admin.list_orders', $user_details->id) }}" role="button">User Orders</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                    <h4 class="mb-3"> All Withdrawal for ({{ $user_details->name }})</h4>
                    @if(session()->has('reject'))
                        <div class="alert alert-danger">
                            {{ session()->get('reject') }}
                        </div>
                    @endif
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Approved Date</th>
                                    <th>Amount</th>
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
