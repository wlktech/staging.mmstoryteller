<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author Yearly Report</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="7" class="text-center">
                {{ $year." Report for ".$author->name }}
                (Email - {{ $author->email }})
                </th>
            </tr>
            <tr>
                <th>No</th>
                <th>Novel</th>
                <th>Chapter</th>
                <th>Author</th>
                <th>Customer</th>
                <th>Gems</th>
                <th>Cost(MMK)</th>
                <th>Author(%)</th>
                <th>Admin(%)</th>
                <th>Remarks</th>
                <th>Ordered Date</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no =1;
            @endphp
            @foreach ($orders as $order)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $order->book->title }}</td>
                <td>{{ $order->chapter->name ?? '' }}</td>
                <td>{{ $order->chapter->user->name ?? '' }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->gem }}</td>
                <td>{{ $order->cost }}</td>
                <td>{{ $order->author_percent }}</td>
                <td>{{ $order->admin_percent }}</td>
                <td>{{ $order->remark }}</td>
                <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-center">Total Amount</th>
                <td>{{ $orders->sum('gem') }} Gem{{ $orders->sum('gem') > 1 ? "s" : "" }}</td>
                <td>{{ $orders->sum('cost') }} MMK</td>
                <td>{{ $orders->sum('author_percent') }} MMK</td>
                <td>{{ $orders->sum('admin_percent') }} MMK</td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
