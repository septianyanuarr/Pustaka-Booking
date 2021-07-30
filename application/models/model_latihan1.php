<?php
class Model_latihan1 extends CI_Model
{
    //membuat variable untuk menampung nilai
    public $nilai1, $nilai2, $hasil;

    //method penjumlahan
    public function jumlah($n1 = null, $n2 = null)
    {
        $this->nilai1 = $n1;
        $this->nilai2 = $n2;
        $this->hasil = $this->nilai1 + $this->nilai2;
        return $this->hasil;
    }

    public function total($kode)
    {
        if($kode =='Nike')
        $this->harga ="375000";
        else if($kode == 'Adidas')
        $this->harga ="300000";
        else if($kode == 'Kickers')
        $this->harga ="250000";
        else if($kode == 'Eiger')
        $this->harga ="275000";
        else
        $this->harga ="400000";

        return $this->harga;
    }
}