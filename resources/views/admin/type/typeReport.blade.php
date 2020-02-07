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
                    <h3>Type Details</h3>

                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->


    <!-- Search Bar Starts -->
    <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="table-responsive" style="width:100%;">
                    <table id="example" class="table table-striped table-bordered no-margin" cellspacing="0"
                    >
                        <thead>
                        <tr class="bg-success">
                            <th>Type</th>
                            <th>Total Length</th>
                            <th>Total Bill</th>
                        </tr>
                        </thead>
                        @foreach($type as $data)
                            @php
                                $totalBill = 0;
                                $totalLength = 0;
                            @endphp
                            <tr>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    @foreach($billing as $bill)
                                        @if( $data->id == $bill->type)
                                            @php $totalLength += $bill->length @endphp
                                        @endif
                                    @endforeach
                                    {{$totalLength}}
                                </td>
                                <td>
                                    @foreach($billing as $bill)
                                        @if( $data->id == $bill->type)
                                            @php $totalBill += $bill->totalBill @endphp
                                        @endif
                                    @endforeach
                                    {{$totalBill}}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection