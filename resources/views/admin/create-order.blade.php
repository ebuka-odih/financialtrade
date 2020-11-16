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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.create_order_store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $user_details->id }}" name="user_id">
                            <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Order Type</label>
                                    <select name="order" id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option value="buy">Buy</option>
                                        <option value="sell">Sell</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Price</label>
                                    <input type="number" step="any" name="price" class="form-control" id="inputPassword4" placeholder="Price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Pair</label>
                                    <input type="text" name="pair" step="any" class="form-control" id="inputPassword4" placeholder="Market Pair">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Opening Price</label>
                                    <input type="number" step="any" name="opening_price" class="form-control" id="inputPassword4" placeholder="Opening Price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Closing Price</label>
                                    <input type="number" step="any" name="closing_price" class="form-control" id="inputPassword4" placeholder="Closing Price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Buy At</label>
                                    <input type="number" step="any" name="buy_at" class="form-control" id="inputPassword4" placeholder="Buy At">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Profit</label>
                                    <input type="number" step="any" name="profit" class="form-control" placeholder="Profit">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </form>

                    </div>

                </div>
            </div>

            <!--  END CONTENT AREA  -->

            <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
            <script>
                new ClipboardJS('.btn');
            </script>
@endsection
