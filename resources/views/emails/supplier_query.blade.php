<html>

<head>
    <title>Supplier Query | VVV Luxury</title>
</head>

<body>
    <table>
        <tr>
            <td>Dear {{ $supplier_name }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>One user query about you on VVV Luxury.</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>{{ $phone }}</td>
        </tr>
        <tr>
            <td>Location:</td>
            <td>{{ $location }}</td>
        </tr>
        <tr>
            <td>Message:</td>
            <td>{{ $query_message }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Thanks & Regards,</td>
        </tr>
        <tr>
            <td>VVV Luxury</td>
        </tr>
    </table>
</body>

</html>