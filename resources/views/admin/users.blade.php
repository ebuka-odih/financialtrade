@extends('admin.layouts.app')

@section('content')
    @section('style')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @endsection
    <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <h4 class="mb-3">All Users</h4>
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
{{--                                            <th>Username</th>--}}
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
{{--                                            <td><strong>{{ $user->username }}</strong></td>--}}
                                            <td><strong>{{ $user->email }}</strong></td>
                                            @if( $user->user_status == 0)
                                                <td><span class="badge badge-danger">Unverified</span></td>
                                            @else
                                                <td> <span class="badge badge-success">Verified</span></td>
                                            @endif
                                            <td>
                                                <strong>{{ date('d.M.y h:i A', strtotime($user->created_at ))}}</strong>
                                            </td>
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


        <!--  END CONTENT AREA  -->


    <!-- END PAGE LEVEL SCRIPTS -->

@endsection
