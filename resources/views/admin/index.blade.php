@extends('admin.layouts.admin')

@section('content')


    <script>
        window.onload = function () {
            setTimeout(function () {
                salesOdometer.innerHTML = {{ $billing->count() }};
            }, 500);

            setTimeout(function () {
                expensesOdometer.innerHTML = {{ $agency->count() }};
            }, 500);

            setTimeout(function () {
                profitsOdometer.innerHTML = {{ $client->count() }};
            }, 500);

            setTimeout(function () {
                totalBill.innerHTML = {{ $totalBill }};
            }, 500);

            setTimeout(function () {
                totalPayment.innerHTML = {{ $totalPay }};
            }, 500);

            setTimeout(function () {
                totalDue.innerHTML = {{ $totalBill - $totalPay }};
            }, 500);
        }
    </script>

    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <p>Welcome to Poly Cables Admin Dashboard</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Ends -->


    <!-- Row starts -->
    <div class="row gutter">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="website-performance">
                    <div class="row gutter">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance">
                                <h5><b>Total Agencies</b></h5>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance-stats">
                                <h3 id="expensesOdometer" class="odometer">0</h3>
                                <a href="{{url('agency')}}"> <button class="btn btn-gp">View</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="website-performance">
                    <div class="row gutter">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance">
                                <h5><b>Total Clients</b></h5>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance-stats">
                                <h3 id="profitsOdometer" class="odometer">0</h3>
                                <a href="{{url('client')}}"> <button class="btn btn-gp">View</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="website-performance">
                    <div class="row gutter">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance">
                                <h5><b>Total Bill Records</b> </h5>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance-stats">
                                <h3 id="salesOdometer" class="odometer">0</h3>
                                <a href="{{url('billing')}}"> <button class="btn btn-gp">View</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
    <br> <br>
    <!-- Row starts -->
    <div class="row gutter">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="website-performance">
                    <div class="row gutter">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance">
                                <h5><b>Total Bill Amount</b></h5>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance-stats">
                                <h3 id="totalBill" class="odometer">0</h3>
                                <a href="{{url('billing')}}"> <button class="btn btn-gp">View</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="website-performance">
                    <div class="row gutter">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance">
                                <h5><b>Total Payment Amount</b></h5>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance-stats">
                                <h3 id="totalPayment" class="odometer">0</h3>
                                <a href="{{url('payment')}}"> <button class="btn btn-gp">View</button> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="panel">
                <div class="website-performance">
                    <div class="row gutter">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance">
                                <h5><b>Total Due Amount</b> </h5>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                            <div class="performance-stats">
                                <h3 id="totalDue" class="odometer">0</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
@endsection