@extends('admin.layouts.app')

@section('content')
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <h4 class="mb-3"> All Deposits</h4>
                        @if(session()->has('reject'))
                            <div class="alert alert-danger">
                                {{ session()->get('reject') }}
                            </div>
                        @endif
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="table_id" class="table table-hover non-hover display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Approved Date</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users_deposits as $users_deposit)
                                        <tr>
                                            <td><strong>{{ date('d/m/y', strtotime($users_deposit->created_at)) }}</strong></td>
                                            <td><strong>{{ date('d/m/y', strtotime($users_deposit->approved_date() )) }}</strong></td>
                                            <td><strong>{{ $users_deposit->user->name }}</strong></td>
                                            <td><strong>{{ $users_deposit->amount }}</strong></td>
                                            <td><strong>{!! $users_deposit->admin_status() !!}</strong></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.deposit_details', $users_deposit->id) }}" class="btn btn-secondary btn-sm">View</a>
                                                    @if($users_deposit->status != 'pending')
                                                    @else
                                                    <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                    </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                            <a class="dropdown-item" href="{{ route('admin.approve_deposit', $users_deposit->id) }}">Approve</a>
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


    <!-- END PAGE LEVEL SCRIPTS -->

@endsection
