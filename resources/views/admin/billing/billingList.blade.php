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
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <a href="{{url('billing')}}"><h3>All Billing List</h3></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Ends -->


    <!-- Search Bar Starts -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div>
                    <form action="{{url('searchResult')}}" method="get">
                        <table class="table table-striped table-bordered no-margin">
                            <tr>
                                <td>
                                    <select name="agency" id="">
                                        <option value="">Select Agency</option>
                                        @foreach($agency as $agent)
                                            <option value="{{$agent->id}}">{{$agent->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="client" id="">
                                        <option value="">Select Client</option>
                                        @foreach($client as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="type" id="">
                                        <option value="">Select Type</option>
                                        @foreach($type as $types)
                                            <option value="{{$types->id}}">{{$types->name}}</option>
                                        @endforeach

                                    </select>
                                </td>
                                <td>Start Date
                                    <input type="date" name="startDate">
                                </td>
                                <td>End Date
                                    <input type="date" name="endDate">
                                </td>
                                <td>
                                    <input type="submit" value="Search" class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <br>

                <div class="table-responsive" style="width:100%;">
                    <table id="example" class="table table-striped table-bordered no-margin" cellspacing="0"
                    >
                        <thead>
                        <tr class="bg-success">
                            <th>Date</th>
                            <th>Agency</th>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Length</th>
                            <th>Rate</th>
                            <th>Total Bill</th>
                            <th>Note</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        @php
                            $totalBill = 0;
                            $totalLength = 0;
                        @endphp
                        @foreach($billing as $bill)
                            <tr>
                                <td>
                                    {{$bill->date}}
                                </td>
                                <td>
                                    {{$bill->agency}}
                                </td>
                                <td>
                                    {{$bill->client}}
                                </td>
                                <td>
                                    {{$bill->type}}
                                </td>
                                <td>
                                    @php $totalLength += $bill->length  @endphp
                                    {{$bill->length}}
                                </td>
                                <td>
                                    {{$bill->rate}}
                                </td>
                                <td>
                                    @php $totalBill += $bill->length * $bill->rate  @endphp
                                    {{$bill->length * $bill->rate}}
                                </td>
                                <td>
                                    {{$bill->note}}
                                </td>
                                <td>
                                    <a href="{{action('billingController@edit',$bill->id)}}"><input type="button"
                                                                                                      class="btn btn-warning"
                                                                                                      name="update"
                                                                                                      value="Update"></a>
                                </td>
                                <td>
                                    <form method="post" action="{{ action('billingController@destroy',$bill->id)}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="Delete">
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure want to delete this?')">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><b>Total : </b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>{{$totalLength}}</b></td>
                            <td></td>
                            <td><b>{{$totalBill}}</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
@endsection