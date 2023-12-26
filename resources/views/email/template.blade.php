
{{-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
    
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div style="background-color: #F5F5F4">
        <h1 class="container-mx-7-rem">Taartely</h1>
        <div class="container-mx-7-rem bg-white" style="height: 100vh">
            <div class="container-mx-7-rem mx-5 pt-3">
                <h4>Hi <b>Taartely</b></h4>
                
                <h5 class="pt-5"><b>Rincian pesanan</b></h5>
                

                <h6>Order ini sedang menunggu ketersediaan dari penjual, jangan lewatkan kesempatan untuk menerima pesanan ini dalam kurang dari 1 hari! Pastikan untuk segera menerimanya sehingga pembeli dapat segera melanjutkan dengan pembayaran!</h6>
                <div class="text-center mt-5">
                <a href="/seller/orders" class="text-decoration-none taartely-button">Pergi ke orders</a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
 --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }

        h1 {
            color: #333;
            margin-top: 20px;
            font-size: 3vw;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h4, h5, h6 {
            color: #333;
        }
        a, a:visited{
            background-color: #9E1545;
            border-radius: 30px;
            font-size: 14px;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        
        .taartely-button{
            
        }   
    </style>
</head>
<body>
    <div style="background-color: #F5F5F4">
    <div class="container">
        <h1>Taartely</h1>
        <div>
            <h4>Hi <b>Taartely</b></h4>
            
            <h5 class="pt-5"><b>Rincian pesanan</b></h5>
            <table>
                <tr>
                    <th>Id Pesanan</th>
                    <td>{{ $order->id }}</td>
                </tr>
            
                <tr>
                    <th>Waktu Transaksi</th>
                    <td>{{ $order->created_at }}</td>
                </tr>
            
                <tr>
                    <th>Nama Pembeli</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
            
                <tr>
                    <th>Catatan untuk Penjual</th>
                    <td>{{ $order->note }}</td>
                </tr>
            
                <tr>
                    <th>Produk</th>
                    <td>
                        @foreach ($order->orderDetails as $orderDetail)
                            <li>{{ $orderDetail->product->name }} ({{ $orderDetail->quantity }}x)</li>
                        @endforeach
                    </td>
                </tr>
            </table>

            <h5>Order ini sedang menunggu ketersediaan dari penjual, jangan lewatkan kesempatan untuk menerima pesanan ini dalam kurang dari 1 hari! Pastikan untuk segera menerimanya sehingga pembeli dapat segera melanjutkan dengan pembayaran!</h5>
            
            <div class="text-center mt-5">
                <a style="color:white" href="http://127.0.0.1:8000/seller/orders">Pergi ke orders</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
