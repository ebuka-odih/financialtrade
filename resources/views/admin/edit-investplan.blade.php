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
                                            <h4> Edit Investment Plan</h4>
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
                                    <form action="{{ route('admin.investment-plans.update', $investplan->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputName">Name</label>
                                            <input type="text" name="name" value="{{ old('name', optional($investplan)->name) }}" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputDescription">Description</label>
                                                <input type="text" name="desc" value="{{ old('desc', optional($investplan)->desc) }}" class="form-control" id="inputDescription" placeholder="Description">
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputAmount">Min Amount</label>
                                                <input type="number" name="min_amount" value="{{old('min_amount', optional($investplan)->min_amount)}}" class="form-control" id="inputAmount" placeholder="Min Amount">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputMax">Max Amount</label>
                                                <input type="number" name="max_amount" value="{{ old('max_amount', optional($investplan)->max_amount) }}" class="form-control" id="inputMax" placeholder="Max Amount">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputTerm">Term Days</label>
                                                <input type="number" name="term_days" value="{{ old('term_days', optional($investplan)->term_days) }}" class="form-control" id="inputTerm" placeholder="Term Days">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputInterest"> Daily Interest</label>
                                                <input type="number" name="daily_return" value="{{ old('daily_return', optional($investplan)->daily_return) }}" class="form-control" id="inputInterest" placeholder=" Daily Interest">

                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputState">Account Base Currency</label>
                                                <select name="acct_base_currency" id="inputState" class="form-control">
                                                    <option selected value="USD,GPD, EUR">USD,GPD, EUR</option>
                                                    {{--                                                    <option value="USD,GPD, EUR">USD,GPD, EUR</option>--}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-primary ">Submit</button>
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

