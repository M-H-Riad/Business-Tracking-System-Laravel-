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
                                    <form action="{{url('client')}}" method="post">
                                        @csrf
                                        <div class=" form-group">
                                            <label>Client Name</label>
                                            <input class="form-control" name="name" type="text"
                                                   value="{{ old('name') }}"  placeholder="Enter Client Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Agency Name</label>
                                            <select class="form-control" name="company">
                                                <option value="">Select Agency</option>
                                                @foreach($agent as $list)
                                                    <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" type="text"
                                                   value="{{ old('address') }}" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" name="contact" type="text"
                                                   value="{{ old('contact') }}" placeholder="Enter Contacts">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="number"
                                                   value="{{ old('phone') }}" placeholder="Enter Contacts">
                                        </div>
                                        <div class=" form-group">
                                            <label>PS/Area</label>
                                            <input class="form-control" name="area" type="text"
                                                   value="{{ old('area') }}" placeholder="Enter Area Name">
                                        </div>
                                        <div class=" form-group">
                                            <label>District</label>
                                            <input class="form-control" name="district" type="text"
                                                   value="{{ old('district') }}" placeholder="Enter Client Name">
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                <input type="submit" value="Add Client" style="color: #1b1e21">
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