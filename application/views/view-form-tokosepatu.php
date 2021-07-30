<html>

<head>
    <title>Form Input Toko Sepatu</title>
</head>

<body>
    <center>
        <form action="<?= ('latihan1/hitungSepatu'); ?>"
        method="post">
            <table>
            <tr>
                <th colspan="3">
                    Form Input Toko Sepatu
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
                    <select name="kode" id="kode">
                    <option value="">Pilih Merk Sepatu</option>
                    <option value="Nike">Nike</option>
                    <option value="Adidas">Adidas</option>
                    <option value="Kickers">Kickers</option>
                    <option value="Eiger">Eiger</option>
                    <option value="Bucherri">Bucherri</option>
                </td>
            </tr>
            <tr>
                <th>Ukuran sepatu</th>
                <td>:</td>
                <td>
                    <select name="ukuran" id="ukuran">
                    <option value="">Pilih Ukuran Sepatu</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>
</center>
</body>

</html>