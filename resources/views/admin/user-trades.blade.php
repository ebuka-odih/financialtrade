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
                            <div class="table-responsive">
                                <a href="{{ route('admin.create_order', $user_details->id) }}" class="btn btn-primary mb-4">Create Order</a>
                                <table class="table mb-4 contextual-table">
                                    <thead>
                                    <tr class="">
                                        <th>Order Type</th>
                                        <th>Pair</th>
                                        <th>Price</th>
                                        <th>Buy At</th>
                                        <th>Opening Price</th>
                                        <th>Closing Price</th>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trades as $trade)
                                        @if($trade->order == 'buy')
                                    <tr class="table-primary">
                                        <td>{{ $trade->order }}</td>
                                        <td>{{ $trade->pair }}</td>
                                        <td>{{ $trade->price }}</td>
                                        <td>{{ $trade->buy_at }}</td>
                                        <td>{{ $trade->opening_price }}</td>
                                        <td>{{ $trade->closing_price }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                    <a class="dropdown-item" href="{{ route('admin.edit_trade', $trade->id) }}">Edit</a>
                                                    <form method="POST" action="{!! route('admin.investment-plans.destroy', $trade->id) !!}" accept-charset="UTF-8">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-default">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                        @else
                                            <tr class="table-danger">
                                                <td>{{ $trade->order }}</td>
                                                <td>{{ $trade->pair }}</td>
                                                <td>{{ $trade->price }}</td>
                                                <td>{{ $trade->buy_at }}</td>
                                                <td>{{ $trade->opening_price }}</td>
                                                <td>{{ $trade->closing_price }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                            <a class="dropdown-item" href="{{ route('admin.edit_trade', $trade->id) }}">Edit</a>
                                                            <form method="POST" action="{!! route('admin.delete_trade', $trade->id) !!}" accept-charset="UTF-8">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-default">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                    @endforeach
                                    </tbody>
                                </table>

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
