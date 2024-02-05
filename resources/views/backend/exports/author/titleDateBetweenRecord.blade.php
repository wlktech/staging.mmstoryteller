<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $start }}-{{ $end }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="7" class="text-center">
                    {{ date('d M, Y', strtotime($start)) }} to {{ date('d M, Y', strtotime($end)) }} Report for {{ $novel->title }} of {{ $author->name }}
                </th>
            </tr>
            <tr>
                <th>No</th>
                <th>Novel</th>
                <th>Chapter</th>
                <th>Customer</th>
                <th>Gems</th>
                <th>Author(%)</th>
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
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->gem }}</td>
                <td>{{ $order->author_percent }}</td>
                <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-center">Total Amount</th>
                <td>{{ $orders->sum('gem') }} Gem{{ $orders->sum('gem') > 1 ? "s" : "" }}</td>
                <td>{{ $orders->sum('author_percent') }} MMK</td>
                <td></td>
            </tr>
        </tfoot>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>
