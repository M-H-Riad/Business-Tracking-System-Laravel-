@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Update Admin Profile</h3>

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
                                    <form action="{{ action('userController@update',$id) }}" method="post">
                                        @csrf
                                        <div class=" form-group">
                                            <label>User Name</label>
                                            <input class="form-control" name="name" type="text"
                                                   value="{{$user->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Set New Password</label>
                                            <input class="form-control" name="password" type="password">
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                {{ method_field('PUT') }}
                                                <input type="submit" value="Update Profile" style="color: #1b1e21">
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