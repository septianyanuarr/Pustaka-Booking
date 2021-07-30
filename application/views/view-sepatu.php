<html> 
<head> 
    <title>Data Sepatu</title> 
</head> 

<body> 
    <center> 
        <form action="<?= base_url('sepatu/cetak'); ?>" method="post"> 
            <table> 
            <tr> 
                <th colspan="3">
                            Input Data Sepatu 
                </th>
            </tr> 
            <tr> 
                        <td colspan="3">
                <hr>
                        </td>
        <tr>
                            <th>Nama Sepatu</th>
            <td>:</td>
            <td>            <select name="merk" id="merk">
                            <option value="">Pilih Sepatu</option>
                            <option value="Nike">Nike</option>
                            <option value="Adidas">Adidas</option>
                            <option value="Kickers">Kickers</option>
                            <option value="Eiger">Eiger</option>
                            <option value="Bucherri">Bucherri</option>
                            </select>
            </td>
        </tr>
        <tr>
                            <th>Ukuran Sepatu</th>
        <td>:</td>
        <td>                <select name="ukuran" id="ukuran">
                            <option value="">Pilih Ukuran</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            </select>
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