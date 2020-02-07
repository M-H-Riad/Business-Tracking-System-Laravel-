@extends('admin.layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('js')
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="  https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function () {

            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis', 'excel','pdf'
                ]
            });
        });
    </script>
@endsection
@section('content')

    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Agency List</h3>
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
                                <table id="example" class="table table-striped table-bordered no-margin"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="bg-success">
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Phone</th>
                                        <th>Area</th>
                                        <th>District</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($agency as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->address}}</td>
                                            <td>{{$data->contact}}</td>
                                            <td>{{$data->phone}}</td>
                                            <td>{{$data->area}}</td>
                                            <td>{{$data->district}}</td>
                                            <td>
                                                <a href="{{action('agencyController@edit',$data['id'])}}"><input
                                                            type="button" class="btn btn-warning" name="update"
                                                            value="Update"></a>
                                            </td>
                                            <td>
                                                <form method="post"
                                                      action="{{ action('agencyController@destroy',$data['id'])}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="Delete">
                                                    <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure want to delete this?')">
                                                        Delete
                                                    </button>
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
