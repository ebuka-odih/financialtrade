@extends('admin.layouts.app')
@section('content')
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">

                    <div class="row mt-5">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4> Add Investment Plan</h4>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="container">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    <form action="{{ route('admin.investment-plans.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group col-md-12">
                                            <label for="inputName">Name</label>
                                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputAmount">Min Amount</label>
                                                <input type="number" name="min_amount" class="form-control" id="inputAmount" placeholder="Min Amount">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputMax">Max Amount</label>
                                                <input type="number" name="max_amount" class="form-control" id="inputMax" placeholder="Max Amount">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputTerm">Term Days</label>
                                                <input type="number" name="term_days" class="form-control" id="inputTerm" placeholder="Term Days">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputInterest"> Daily Interest</label>
                                                <input type="number" name="daily_interest" class="form-control" id="inputInterest" placeholder=" Daily Interest">

                                            </div>
                                        </div>

                                        <div class="form-row mb-4">

                                            <div class="form-group col-md-6">
                                                <label for="inputState">Capital Return</label>
                                                <select name="capital_return" id="inputState" class="form-control">
                                                    <option selected value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                                <small class="text text-primary">Choose if capital deposit will be returned at the end of the plan</small>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-primary ">Sign in</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
        <!--  END CONTENT AREA  -->
@endsection

