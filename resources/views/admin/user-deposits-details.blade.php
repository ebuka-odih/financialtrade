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
                        <h4 class="mb-3">Deposit Details</h4>
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
                                            <div class="table-responsive">
                                                @if($deposit->status == 'pending')
                                                <table class="table table-bordered mb-4" style="width: 100%">
                                                    <tr>
                                                        <th>Created Date:</th>
                                                        <td>{{ date('d/m/y', strtotime($deposit->created_at)) }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Approved Date:</th>
                                                        <td>{{ date('d/m/y', strtotime($deposit->approved_date())) }}</td>
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
                                                        <th>Deposited Amount:</th>
                                                        <td>$@convert($deposit->amount)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Investment Plan:</th>
                                                        <td>{{ $deposit->invest_plan->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Investment Interval:</th>
                                                        <td>{{ $deposit->invest_plan->term_days }} Day(s)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Daily Interest:</th>
                                                        <td>{{ $deposit->invest_plan->daily_return }}%</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Interest:</th>
                                                        <td>{{ $deposit->total_return() }}%</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Status:</th>
                                                        <td>{!! $deposit->admin_status() !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payment Proof:</th>
                                                        <td><img height="400" width="400" src="/storage/payment-proof/{{ $deposit->payment_proof }}" alt="Payment Proof"></td>
                                                    </tr>
                                                </table>
                                                @else
                                                    <table class="table table-bordered mb-4" style="width: 100%">
                                                        <tr>
                                                            <th>Created Date:</th>
                                                            <td>{{ date('d/m/y', strtotime($deposit->created_at)) }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Approved Date:</th>
                                                            <td>{{ date('d/m/y', strtotime($deposit->approved_date())) }}</td>
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
                                                            <th>Deposited Amount:</th>
                                                            <td>$@convert($deposit->amount)</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Investment Plan:</th>
                                                            <td>{{ $deposit->invest_plan->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Investment Interval:</th>
                                                            <td>{{ $deposit->invest_plan->term_days }} Day(s)</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Daily Interest:</th>
                                                            <td>{{ $deposit->invest_plan->daily_return }}%</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Interest:</th>
                                                            <td>{{ $deposit->total_return() }}%</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Start Date:</th>
                                                            <td colspan="2">{{ date('d-M-y', strtotime($deposit->approved_date() )) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Ending Date:</th>
                                                            <td>{{ date('d-M-y', strtotime($deposit->ending_date())) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PROFIT EARNED:</th>
                                                            <td colspan="2">$ @convert($deposit->earning) <span style="margin-left: 20px">(without capital)</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>TOTAL EARNED:</th>
                                                            <td colspan="2">$ @convert($deposit->total_earned()) <span style="margin-left: 20px">(plus capital)</span></td>
                                                        </tr>

{{--                                                        <tr>--}}
{{--                                                            <th> PROGRESS :</th>--}}
{{--                                                            @if($deposit->invest_plan->term_days == $i)--}}
{{--                                                                <td colspan="2">Plan Ended</td>--}}
{{--                                                            @else--}}
{{--                                                                <td colspan="2">Plan In Progress...</td--}}
{{--                                                            @endif--}}
{{--                                                        </tr>--}}

                                                        <tr>
                                                            <th>Status:</th>
                                                            <td>{!! $deposit->admin_status() !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Payment Proof:</th>
                                                            <td><img height="400" width="400" src="/storage/payment-proof/{{ $deposit->payment_proof }}" alt="Payment Proof"></td>
                                                        </tr>
                                                    </table>
                                                @endif
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
