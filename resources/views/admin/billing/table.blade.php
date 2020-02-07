{{--<h2 class="text-center" colspan="11">All Billing Report</h2>--}}
<table id="responsiveTable" class="table table-striped table-bordered no-margin" cellspacing="0"
       width="100%">
    <thead>
    <tr class="bg-success">
        <th><b>Date</b></th>
        <th><b>Agency</b></th>
        <th><b>Client</b></th>
        <th><b>Bill No</b></th>
        <th><b>Type</b></th>
        <th><b>Length</b></th>
        <th><b>Rate</b></th>
        <th><b>Bill Amount</b></th>
        <th><b>Payment</b></th>
        <th><b>Due</b></th>
        <th><b>Note</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($billing as $bill)
        <tr>
            <td>{{$bill->date}}</td>
            <td>
                {{$bill->agentName}}
            </td>
            <td>
                {{$bill->clientName}}
            </td>
            <td>{{$bill->billNo}}</td>
            <td>
                {{$bill->typeName}}
            </td>
            <td>{{$bill->length}}</td>
            <td>{{$bill->rate}}</td>
            <td>
                {{$bill->length*$bill->rate}}
            </td>
            <td>
                {{$bill->payment}}
            </td>
            <td>
                {{$bill->length*$bill->rate-$bill->payment}}
            </td>
            <td>{{$bill->note}}</td>
        </tr>
        <br>
    @endforeach
    </tbody>
</table>