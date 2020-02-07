@extends('admin.layouts.admin')

@section('content')

    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Product Type List</h3>

                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->

    <!-- Row starts -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Row Starts -->
            <div class="row gutter">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <h4>View Price List</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="responsiveTable" class="table table-striped table-bordered no-margin"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name of Type</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($type as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>
                                                <a  href="{{action('typeController@edit',$data['id'])}}"><input type="button" class="btn btn-warning" name="update" value="Update"></a>
                                                <hr>
                                                <form method="post" action="{{ action('typeController@destroy',$data['id'])}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="Delete">
                                                    <button  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this?')" >Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row Ends -->
        </div>
    </div>
    <!-- Row ends -->

@endsection
