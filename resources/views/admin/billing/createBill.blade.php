@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Create New Bill</h3>
                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->

    <script>
        function calculate() {
            var myBox1 = document.getElementById('length').value;
            var myBox2 = document.getElementById('rate').value;
            var myResult = myBox1 * myBox2;
            document.getElementById('result').value = myResult;
            document.getElementById('result2').value = myResult;
        }
    </script>
    <!-- Data Dependent -->
    <script>

        $(document).ready(function () {
            $('.agency').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    url = '{{URL::to('/depend')}}';

                    $.ajax({
                        url: url,
                        method: "post",
                        data: {select: select, value: value, _token: _token, dependent: dependent},
                        success: function (result) {
                            //console.log(result);
                            $('#client option:gt(0)').remove();
                            $.each(result,function(key,value){
                                $("#client").append('<option value="'+value['id']+'">'+value['name']+'</option>');
                            });
                        }
                    })
                }
            });

        });
    </script>

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
                                    <form action="{{url('billing')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="form-group row">

                                            <div class="col-xs-6 form-group">
                                                <label>Date</label>
                                                <input class="form-control" name="date" type="date">
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label for="ex1">Agency</label>
                                                <select class="form-control agency" name="agency" id="agency"
                                                        data-dependent="client">
                                                    <option value="0">Select Agency</option>
                                                    @foreach($agency as $list)
                                                        <option value="{{$list->id}}">{{$list->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Client</label>
                                                <select class="form-control client" name="client" id="client">
                                                    <option value="0">Select Client</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Bill No</label>
                                                <input class="form-control" name="billNo" type="number"
                                                       placeholder="Enter Bill No">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="type">
                                                    <option>Select Type</option>
                                                    @foreach($type as $item)
                                                        <option value="{{$item->id}}">{{$item->name}} ({{$item->id}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Length</label>
                                                <input class="form-control" id="length" name="length" type="number"
                                                       placeholder="Enter Length" oninput="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Rate</label>
                                                <input class="form-control" id="rate" name="rate" type="number" step="any"
                                                       placeholder="Enter Rate" oninput="calculate();">
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Total Bill</label>
                                                <input class="form-control" name="" type="text" id="result2" disabled>
                                                <input class="form-control" name="totalBill" type="hidden" id="result" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-12 form-group">
                                                <label>Write Note</label>
                                                <textarea class="form-control" rows="3" name="note"
                                                          placeholder="Write Note here..."></textarea>
                                            </div>
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                <input type="submit" value="Submit Bill info" style="color: #1b1e21">
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