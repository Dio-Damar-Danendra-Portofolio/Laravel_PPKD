<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printed Bill for {{ $order->order_code }}</title>
    <style>
        body{
            width: 70mm;
            margin: 0 auto;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            color: #000;
        }

        header{
            text-align: center;
        }

        header h3{}

        header p{
            font-weight: bold;
        }

        .divider{
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        .item-row{
            display: flex;
            justify-content: space-between;
            margin-bottom: 2px;
        }

        .item-row .left{
            flex: 1;
        }

        .item-row .right{
            flex: 0 0 auto;
            text-align: right;
        }

        .footer{
            margin-top: 10px;
        }

        .text-center{
            text-align: center;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="wrapper">
        <header>
            <h3>Dio's Shop</h3>
            <address>Jl. Mertilang XI Blok KB 3 No. 3, RT 004 RW 012 <br> Phone: 6221 7457809 <br></address>
        </header>
        <div class="divider"></div>
        <div>
            <div>Date       : {{ date('d M Y', strtotime($order->order_date)) }}</div>
            <div>Order No. : {{ $order->order_code }}</div>
        </div>
        <div class="divider"></div>
        @foreach ($orderDetails as $details)
        <div class="item-row">
            <div class="left">{{ $details->kepemilikan_produk->product_name }}</div>
            <div class="right">{{ number_format($details->order_subtotal) }}</div>
        </div>
        <div class="item-row">
            <div class="left">{{ $details->qty }} x {{ number_format($details->order_price) }}</div>
        </div>
        @endforeach
        <div class="item-row">
            <div class="left"></div>
            <div class="right">{{ number_format($details->kepemilikan_pesanan->order_amount) }}</div>
        </div>
        <div class="divider"></div>
        <div class="text-center footer">
            ** Thank you for shopping **
        </div>
        </div>
</body>
</html>
