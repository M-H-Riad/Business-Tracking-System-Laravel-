@extends('admin.layouts.admin')

@section('content')
    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="row gutter">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-title">
                    <h3>Create Payment</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Ends -->

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
                            console.log(result);
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
                                    <form action="{{url('payment')}}" method="post">
                                        @csrf
                                        <div class=" form-group">
                                            <label>Date</label>
                                                <input type="date" class="form-control" name="date">
                                        </div>
                                        <div class=" form-group">
                                            <label>Select Agency</label>
                                            <select class="form-control agency" name="agency" id="agency"
                                                    data-dependent="client">
                                                <option value="0">Select Agency</option>
                                                @foreach($agent as $list)
                                                    <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Client</label>
                                            <select class="form-control client" name="client" id="client">
                                                <option value="0">Select Client</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Payment</label>
                                            <input class="form-control" name="payment" type="number"
                                                   placeholder="Enter Amount">
                                        </div>
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control" rows="3" name="note"
                                                      placeholder="Write Note here..."></textarea>
                                        </div>
                                        <center><a href="javascript:void(0)" class="btn btn-info btn-lg">
                                                <input type="submit" value="Save Payment" style="color: #1b1e21">
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