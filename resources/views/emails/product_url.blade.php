<html>
    <head>
        <title>Product Link | VVV Luxury</title>
    </head>
    <body>
        <table>
            <tr><td>Dear {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Please click on below link to check product:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><a href="{{ url('/product/'.$id.'/'.$token) }}">PRODUCT URL</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>VVV Luxury</td></tr>
        </table>
    </body>
</html>