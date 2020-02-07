@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Update Agency</h3>
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
                                    <form action="{{ action('agencyController@update',$id) }}" method="post">
                                        @csrf
                                        <div class=" form-group">
                                            <label>Agency</label>
                                            <input class="form-control" name="name" type="text"
                                                   value="{{$agency->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" type="text"
                                                   value="{{$agency->address}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" name="contact" type="text"
                                                   value="{{$agency->contact}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="number"
                                                   value="{{$agency->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input class="form-control" name="area" type="text"
                                                   value="{{$agency->area}}">
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <input class="form-control" name="district" type="text"
                                                   value="{{$agency->district}}">
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                {{ method_field('PUT') }}
                                                <input type="submit" value="Update Agency" style="color: #1b1e21">
                                            </a>
                                        </center>
                                    </form>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
@endsection