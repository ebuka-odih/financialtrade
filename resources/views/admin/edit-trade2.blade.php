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
                                            {{--                                            <a href="{{ route('admin.user_message', $user_details->id) }}" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Message</a>--}}
                                            <a href="" class="btn btn-success btn-sm width-sm waves-effect mt-2 waves-light">Messages</a>
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
                                                            <form class="form-horizontal" action="{{ route('admin.update_trade', $trade->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                                <input type="hidden" value="{{ $user_details->id }}" name="user_id">
                                                                <div class="form-row mb-4">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputState">Order Type</label>
                                                                        <select name="order" id="inputState" class="form-control">
                                                                            <option selected>Choose...</option>
                                                                            <option value="buy" {{ old('order', $trade->order) == "buy" ? 'selected' : '' }}>Buy</option>
                                                                            <option value="sell" {{ old('order',  $trade->order) == "sell" ? 'selected' : '' }}>Sell</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Price</label>
                                                                        <input type="number" step="any" name="price" value="{{ old('price', optional($trade)->price) }}" class="form-control" id="inputPassword4" placeholder="Price">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-4">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4">Opening Price</label>
                                                                        <input type="number" step="any" name="opening_price" value="{{ old('opening_price', optional($trade)->opening_price) }}" class="form-control" id="inputPassword4" placeholder="Opening Price">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Closing Price</label>
                                                                        <input type="number" step="any" name="closing_price" value="{{ old('closing_price', optional($trade)->closing_price) }}" class="form-control"  placeholder="Closing Price">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputPassword4">Buy At</label>
                                                                        <input type="number" step="any" name="buy_at" value="{{ old('buy_at', optional($trade)->buy_at) }}" class="form-control" id="inputPassword4" placeholder="Buy At">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-4">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Pair</label>
                                                                        <input type="text" name="pair" value="{{ old('pair', optional($trade)->pair) }}" autocomplete="on" class="form-control" id="inputPassword4" placeholder="Market Pair">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Profit</label>
                                                                        <input type="number" step="any" name="profit" value="{{ old('profit', optional($trade)->profit) }}" class="form-control" placeholder="Profit">
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary mt-3">Create</button>


                                                            </form>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

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
