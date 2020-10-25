@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables-dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style-dark.css') }}">
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <h4 class="mb-3"> All Withdrawal</h4>
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><strong>4/8/20</strong></td>
                                            <td><strong>John Doe</strong></td>
                                            <td><strong>John@gmail.com</strong></td>
                                            <td><strong>$500</strong></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-secondary btn-sm">View</a>
                                                    <a href="#" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                        <a class="dropdown-item" href="#">Approve</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


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
