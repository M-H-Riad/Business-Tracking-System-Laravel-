@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Update Billing Info</h3>
                    {{--<p>Small description about billing update </p>--}}
                </div>
            </div>

        </div>
    </div>
    <!-- Top Bar Ends -->

    <script>
            $(document).ready(function () {
                var myBox1 = document.getElementById('length').value;
                var myBox2 = document.getElementById('rate').value;

                var myResult = myBox1 * myBox2;

                document.getElementById('result').value = myResult;
                document.getElementById('result2').value = myResult;
            });

            function calculate() {
                var myBox1 = document.getElementById('length').value;
                var myBox2 = document.getElementById('rate').value;

                var myResult = myBox1 * myBox2;

                document.getElementById('result').value = myResult;
                document.getElementById('result2').value = myResult;
            }

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
                                    <form action="{{ action('billingController@update',$id) }}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control" rows="3" name="date"
                                                       value="{{$billing->date}}" required >
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label for="ex1">Agency</label>
                                                <select class="form-control" name="agency" required>
                                                    @foreach($agency as $data)
                                                        @if($billing->agency == $data->id)
                                                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Client</label>
                                                <select class="form-control" name="client" required>
                                                    @foreach($client as $item)
                                                        @if($billing->client == $item->id)
                                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Bill No</label>
                                                <input class="form-control" name="billNo" type="number"
                                                       value="{{$billing->billNo}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="type" required>
                                                    @foreach($type as $item)
                                                        @if($billing->type == $item->id)
                                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                        @else
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Length</label>
                                                <input class="form-control" id="length" name="length" type="number"
                                                       value="{{$billing->length}}" oninput="calculate();" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 form-group">
                                                <label>Rate</label>
                                                <input class="form-control" id="rate" name="rate" type="number" step="any"
                                                       value="{{$billing->rate}}" oninput="calculate();"  required>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Bill Amount</label>
                                                <input class="form-control" name="" type="number" id="result2" disabled>
                                                <input class="form-control" name="totalBill" type="hidden" id="result" >
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-12 form-group">
                                                <label>Write Note</label>
                                                <input type="text" class="form-control" rows="3" name="note"
                                                       value="{{$billing->note}}" required style="height: 100px; border-radius: 5px;">
                                            </div>
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                {{ method_field('PUT') }}
                                                <input type="submit" value="Update Bill info" style="color: #1b1e21">
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