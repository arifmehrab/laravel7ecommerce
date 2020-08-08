<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <h1>LWA! Your Order Successfully Done.</h1>
   <table border="1">
       <thead>
           <th>payment Id</th>
           <td>Payment Type</td>
           <td>Payment Amonut</td>
       </thead>
       <tbody>

            <td> {{ $order_details->payment_id }} </td>
            <td>{{ $order_details->payment_type }}</td>
            <td>{{ $order_details->payment_amount }}</td>
       </tbody>
    </table> 
</body>
</html>