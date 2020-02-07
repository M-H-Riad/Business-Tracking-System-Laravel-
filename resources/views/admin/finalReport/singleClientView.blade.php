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
        $(document).ready(function () {

            $('#examplee').DataTable({
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
                    <h3>Details View of <span style="color: #2a9055">{{$clientName->name}}</span></h3>
                    <p>Back to > <a href="javascript:window.history.back();"><b>Client Report</b></a> </p>
                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->


    <!-- Search Bar Starts -->
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="panel">
                <div class="table-responsive" style="width:100%;">
                    <table id="example" class="table table-striped table-bordered no-margin" cellspacing="0"
                    >
                        <thead>
                        <tr class="bg-success">
                            <th>Bill Date</th>
                            <th>Bill Amount</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        @php
                            $totalBill = 0;
                        @endphp
                        @foreach($bill as $value)

                            <tr>
                                <td>
                                    {{$value->billDate}}
                                </td>
                                <td>
                                    @php $totalBill += $value->totalBill @endphp
                                    {{$value->totalBill}}
                                </td>
                                <td>
                                    {{$value->note}}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td> <b>Total Bill:</b> </td>
                            <td><b>{{$totalBill}}</b></td>
                            <td></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="panel">
                <div class="table-responsive" style="width:100%;">
                    <table id="examplee" class="table table-striped table-bordered no-margin" cellspacing="0"
                    >
                        <thead>
                        <tr class="bg-success">
                            <th>Payment Date</th>
                            <th>Payment Amount</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        @php
                            $totalPayment = 0;
                        @endphp
                        @foreach($payment as $pay)

                            <tr>
                                <td>
                                    {{$pay->payDate}}
                                </td>
                                <td>
                                    @php $totalPayment += $pay->payment @endphp
                                    {{$pay->payment}}
                                </td>
                                <td>
                                    {{$pay->note}}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><b>Total Payment: </b></td>
                            <td><b>{{$totalPayment}}</b></td>
                            <td></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
@endsection