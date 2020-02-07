@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Update Client</h3>
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
                                    <form action="{{ action('clientController@update',$id) }}" method="post">
                                        @csrf
                                        <div class=" form-group">
                                            <label>Agency</label>
                                            <input class="form-control" name="name" type="text"
                                                   value="{{$client->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Agency</label>
                                            <select class="form-control" name="company" required>
                                                @foreach($agent as $data)
                                                    @if($client->company == $data->id)
                                                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" type="text"
                                                   value="{{$client->address}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" name="contact" type="text"
                                                   value="{{$client->contact}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="number"
                                                   value="{{$client->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Area/PS</label>
                                            <input class="form-control" name="area" type="text"
                                                   value="{{$client->area}}">
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <input class="form-control" name="district" type="text"
                                                   value="{{$client->district}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                @if($client->status == 1)
                                                    <option value="1" selected>On</option>
                                                    <option value="0" >Off</option>
                                                @else
                                                    <option value="1">On</option>
                                                    <option value="0" selected>Off</option>
                                                @endif
                                            </select>
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