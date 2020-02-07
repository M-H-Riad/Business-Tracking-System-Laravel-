@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Add Client</h3>
                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->

    <!-- Row starts -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">

                <div class="panel-body">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <!-- Row starts -->
                        <div class="row gutter">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="panel">
                                    <form action="{{url('type')}}" method="post">
                                        @csrf
                                        <div class=" form-group">
                                            <label>Product Type</label>
                                            <input class="form-control" name="name" type="text"
                                                   placeholder="Enter Product Type">
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                <input type="submit" value="Add Type" style="color: #1b1e21">
                                            </a>
                                        </center>
                                    </form>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row ends -->
@endsection