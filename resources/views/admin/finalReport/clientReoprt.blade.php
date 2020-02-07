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
                    <h3>All Clients Report</h3>

                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->


    <!-- Search Bar Starts -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">

               <br>

                <div class="table-responsive" style="width:100%;">
                    <table id="example" class="table table-striped table-bordered no-margin" cellspacing="0"
                    >
                        <thead>
                        <tr class="bg-success">
                            <th>Client</th>
                            <th>Agency</th>
                            <th>Total Bill</th>
                            <th>Total Payment</th>
                            <th>Total Due</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        @foreach($clients as $client)
                            @php
                                $totalBill = 0;
                                $totalPayment = 0;
                            @endphp
                            <tr>
                                <td>
                                    {{$client->clientName}}
                                </td>
                                <td>
                                    {{$client->agentName}}
                                </td>
                                <td>
                                    @foreach($billing as $bill)
                                        @if( $client->clientId == $bill->client)
                                            @php $totalBill += $bill->totalBill @endphp
                                        @endif
                                    @endforeach
                                    {{$totalBill}}
                                </td>
                                <td>
                                    @foreach($payment as $pay)
                                        @if( $client->clientId == $pay->clientId)
                                            @php $totalPayment += $pay->totalPayment @endphp
                                        @endif
                                    @endforeach
                                    {{$totalPayment}}
                                </td>
                                <td>
                                    {{$totalBill - $totalPayment}}
                                </td>
                                <td>
                                    <a href="{{url('viewDetails',$client->clientId)}}"><input type="button" class="btn btn-success"
                                                                                              name="update"
                                                                                              value="View Details"> </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection