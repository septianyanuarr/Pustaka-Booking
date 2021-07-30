<?php
class Model_tokosepatu extends CI_Model
{
    public function $nilai1, $nilai2, $hasil, $harga, $ukuran, $merk;

    public function jumlah($n1 = null, $n2 = null)
    {
        $this->nilai1 = $n1;
        $this->nilai2 = $n2;
        $this->hasil = $this->nilai1 + $this->nilai2;
        return $this->hasil;
    }

    public function total($merk)
    {
        if($merk =='Nike')
        $this->harga ="375000";
        
		else if($merk =='Adidas')
        $this->harga ="300000";

		else if($merk =='Kickers')
        $this->harga ="250000";

		else if($merk =='Eiger')
        $this->harga ="275000";

        else
        $this->harga ="400000";

        $this->hasil = $this->harga;
        return $this->hasil;
    }
}