<html>

<head>
    <title>Tampil Data Toko Sepatu</title>
</head>

<body>
    <center>
        <table>
            <tr>
                <th colspan="3">
                    Tampil Data Toko Sepatu
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <th>Merk Sepatu</th>
                <th>:</th>
                <td>
                    <?= $kode; ?>
                </td>
            </tr>
            <tr>
                <td>Harga Sepatu</td>
                <td>:</td>
                <td>
                    <?= $hasil; ?>
                </td>
            </tr>
            <tr>
                <td>Ukuran Sepatu</td>
                <td>:</td>
                <td>
                    <?= $ukuran; ?>
                </td>
            </tr>
                <td colspan="3" align="center">
                    <a href="http://localhost/code-igniter/index.php/latihan1">Kembali</a>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>