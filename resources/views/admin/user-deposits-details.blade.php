@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables-dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style-dark.css') }}">
    <style>
        .table > tbody > tr > td{
            color: #53555d;
        }
    </style>
    <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <h4 class="mb-3">Withdrawal Details</h4>
                        @if(session()->has('reject'))
                            <div class="alert alert-danger">
                                {{ session()->get('reject') }}
                            </div>
                        @endif
                        <div class="widget-content widget-content-area br-6">
                            <div id="card_1" class="col-lg-12 layout-spacing layout-top-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Deposit Details</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">

                                        <div class="card component-card_1">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-4">
                                                    <tr>
                                                        <th>Created Date:</th>
                                                        <td>{{ date('d/m/y', strtotime($deposit->created_at)) }}
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                        <th>Approved Date:</th>
                                                        @if($deposit->status >= 100)
                                                            <td>{{ date('d/m/y', strtotime($deposit->approved_date)) }}</td>

                                                        @else
                                                            <td>"dd/mm/yy"</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>{{ $deposit->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>{{ $deposit->user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Requested Amount:</th>
                                                        <td>$@convert($deposit->amount)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Transaction ID:</th>
                                                        <td>{{ $deposit->txn_id }}</td>
                                                    </tr>
                                                        <tr>
                                                            <th>Transaction Hash:</th>
                                                            <td>{{ $deposit->trans_hash }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status:</th>
                                                            <td>{!! $deposit->admin_status() !!}</td>
                                                        </tr>
                                                </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>


        <!--  END CONTENT AREA  -->


    <!-- END PAGE LEVEL SCRIPTS -->

@endsection
