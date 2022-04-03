<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p style="font-weight: bold; color: grey;">Hi {{ $order->firstname }} {{ $order->lastname }}</p>
    <p>Your order has been successfully placed.</p>
    <br>

    <table style="width: 600px; text-align:right;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderitem as $item)
                <tr>
                    <td>
                        {{ $item->product->name }}
                    </td>
                    <td>
                        {{ $item->quantity }}
                    </td>
                    <td>
                        ₱ {{ $item->price * $item->quantity}}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" style="border-top: 1px solid #ccc"></td>
                <td style="font-size:15px; font-weight:bold; border-top: 1px solid #ccc">Subtotal : ₱ {{ $order->subtotal }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td style="font-size:15px; font-weight:bold;">Tax : ₱ {{ $order->tax }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td style="font-size:22px; font-weight:bold;">Total : ₱ {{ $order->total }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>