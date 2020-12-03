@extends('admin.layouts.app')

@section('content')


    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">

                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-one">
                        <div class="widget-heading">
                            <h6 class="">Approved Transactions</h6>
                        </div>
                        <div class="w-chart">
                            <div class="w-chart-section">
                                <div class="w-detail">
                                    <p class="w-title">Total Deposited</p>
                                    <p class="w-stats">$@convert($total_deposit)</p>
                                </div>
                                <div class="w-chart-render-one">
                                    <div id="total-users"></div>
                                </div>
                            </div>

                            <div class="w-chart-section">
                                <div class="w-detail">
                                    <p class="w-title">Total Withdraw</p>
                                    <p class="w-stats">$ @convert($total_withdraw)</p>
                                </div>
                                <div class="w-chart-render-one">
                                    <div id="paid-visits"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-content">
                                <div class="w-info">
                                    <h6 class="value">{{ $users_count }}</h6>
                                    <p class="">Total Users</p>
                                </div>
                                <div class="">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <h4 class="mb-3">All Users</h4>
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="table_id" class="table table-hover non-hover display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Joined date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><strong>{{ $user->name }}</strong></td>
                                        <td><strong>{{ $user->username }}</strong></td>
                                        <td><strong>{{ $user->email }}</strong></td>
                                        @if( $user->user_status == 0)
                                            <td><span class="badge badge-danger">Unverified</span></td>
                                        @else
                                            <td> <span class="badge badge-success">Verified</span></td>
                                        @endif
                                        <td><strong>{{ date('d.M.y h:i A', strtotime($user->created_at ))}}</strong></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.users_details', $user->id) }}" class="btn btn-secondary btn-sm">Open</a>
                                                <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                    @if( $user->user_status == 0)
                                                        <a class="dropdown-item" href="{{ route('admin.verify_user', $user->id) }}"><i class="fa fa-check fa-x1"></i></a>
                                                    @else
                                                    @endif
                                                    <a class="dropdown-item" href="#">Deposits</a>
                                                    <a class="dropdown-item" href="{{ route('admin.user_withdraw.show', $user->id) }}">Withdrawal</a>
                                                        <form method="POST" action="{!! route('admin.delete_user', $user->id) !!}" accept-charset="UTF-8">
                                                            <input name="_method" value="DELETE" type="hidden">
                                                            {{ csrf_field() }}

                                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                                <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete User?&quot;)">
                                                                    Delete
                                                                </button>

                                                            </div>

                                                        </form>
                                                </div>
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




@endsection
