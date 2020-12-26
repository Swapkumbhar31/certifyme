<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Created On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
                <tr class="{{$t->status=='failure' ? 'bg-danger' : 'bg-success' }}">
                    <td>{{$t->payuMoneyId}}</td>
                    <td>{{$t->txnid}}</td>
                    <td>{{$t->status}}</td>
                    <td>{{$t->amount}}</td>
                    <td>{{$t->addedon}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
