@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Supermarket Bill</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price ($)</th>
                <th>Total ($)</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($bill as $item)
                @php
                    $itemTotal = $item['quantity'] * $item['price'];
                    $total += $itemTotal;
                @endphp
                <tr>
                    <td>{{ $item['item'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['price'], 2) }}</td>
                    <td>{{ number_format($itemTotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end"><strong>Grand Total:</strong></td>
                <td><strong>{{ number_format($total, 2) }} $</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
