<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Por Mes</title>
</head>
<body>
    <h4>Lista de Pedidos</h4>
    <table>
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Bidones Pedidos</th>
                <th scope="col">Bidones Pago</th>
                <th scope="col">Bidones Debe</th>
                <th scope="col">Fecha Entrega</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->client->name }}</td>
                    <td>{{ $order->delivery }}</td>
                    <td>{{ $order->pay }}</td>
                    <td>{{ $order->debt }}</td>
                    <td>{{ $order->created_at->format('d-M-Y') }}</td>
                </tr>
            @endforeach
                <tr>
                    <th>Monto Total Pago:</th>
                    <td>{{ $pays }}</td>
                </tr>
                <tr>
                    <th>Monto Total Deuda:</th>
                    <td>{{ $debts }}</td>
                </tr>
        </tbody>
    </table>
</body>
</html>
