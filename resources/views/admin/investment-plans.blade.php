@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables-dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style-dark.css') }}">
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <h4 class="mb-3"> Investment Plans</h4>
                        <div class="col-6">
                            <a href="{{ route('admin.investment-plans.create') }}" class="btn btn-primary mb-3">Add Plan</a>
                        </div>
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Desc</th>
{{--                                            <th>Leverage</th>--}}
                                            <th>Min Amt</th>
                                            <th>Max Amt</th>
                                            <th>Daily Profit (%)</th>
                                            <th>Total Return (%)</th>
                                            <th>Term Days</th>
                                            <th>Base CUR</th>
{{--                                            <th>Spread</th>--}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invest_plans as $invest_plan)
                                        <tr>
                                            <td><strong>{{ $invest_plan->name }}</strong></td>
                                            <td><strong>{{ $invest_plan->desc }}</strong></td>
{{--                                            <td><strong>{{ $invest_plan->leverage }}</strong></td>--}}
                                            <td><strong>${{ $invest_plan->min_amount }}</strong></td>
                                            <td><strong>${{ $invest_plan->max_amount }}</strong></td>
                                            <td><strong>{{ $invest_plan->daily_return}}%</strong></td>
                                            <td><strong>{{ $invest_plan->total_return }}%</strong></td>
                                            <td><strong>{{ $invest_plan->term_days}} Day(s)</strong></td>
                                            <td><strong>{{ $invest_plan->acct_base_currency}}</strong></td>
{{--                                            <td><strong>{{ $invest_plan->spread}}</strong></td>--}}
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                        <a class="dropdown-item" href="{{ route('admin.investment-plans.edit', $invest_plan->id) }}">Edit</a>
                                                        <form method="POST" action="{{ route('admin.investment-plans.destroy', $invest_plan->id) }}" accept-charset="UTF-8">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-default">Delete</button>
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


        <!--  END CONTENT AREA  -->


    <!-- END PAGE LEVEL SCRIPTS -->

@endsection
