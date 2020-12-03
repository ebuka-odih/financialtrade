@extends('admin.layouts.app')

@section('content')


    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <h4 class="mb-3">All Users</h4>
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="table_id" class="table table-hover non-hover display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Wallet Id</th>
                                    <th>Wallet QrCode</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-capitalize">Wallet ID</td>
                                    <td>
                                        <form action="{{ route('admin.setting.store') }}" method="POST">
                                            @csrf
                                            <input class="form-control" name="wallet_id" value="{{ setting('wallet_id') }}" /><br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </td>
                                    <td>{{ setting('wallet_id') }}</td>
                                </tr>

                                <tr>
                                    <td class="text-capitalize">Wallet Qrcode</td>
                                    <td>
                                        <form action="{{ route('admin.qrcode') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="file" class="form-control" value="{{ setting('qrcode') }}" name="qrcode">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </td>
                                    <td><img src="/storage/qrcode/{{ setting('qrcode') }}" alt=""></td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>




@endsection
