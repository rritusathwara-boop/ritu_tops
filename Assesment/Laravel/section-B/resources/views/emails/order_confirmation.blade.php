<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 20px; color: #333; }
        .card { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .header { border-bottom: 2px solid #e5e7eb; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #16a34a; font-size: 24px; }
        .badge { background-color: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 9999px; font-weight: bold; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #f3f4f6; }
        th { background-color: #f9fafb; font-size: 14px; color: #4b5563; }
        .total { font-size: 18px; font-weight: bold; color: #111827; text-align: right; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>Order Confirmed!</h1>
            <p>Hi {{ $order->user->name }}, thank you for your order!</p>
        </div>

        <p><strong>Order ID:</strong> #{{ $order->id }}</p>
        <p><strong>Restaurant:</strong> {{ $order->restaurant->name }}</p>
        <p><strong>Status:</strong> <span class="badge">{{ ucfirst($order->status) }}</span></p>

        <h3>Order Summary</h3>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->menuItem->name ?? 'Menu Item' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->price, 2) }}</td>
                        <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total Amount: ₹{{ number_format($order->total_amount, 2) }}
        </div>

        <p style="margin-top: 30px; font-size: 14px; color: #6b7280; text-align: center;">
            Thank you for dining with us!
        </p>
    </div>
</body>
</html>