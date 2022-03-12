<?php

funtcion pertambahan($angka1, $angka2)
{
	$a= $angka1;
	$b= $angka2;
	$hasil= $a+$b;
	return $hasil;
}

//pemanggilan fungsi pertama
$hasil=pertambahan(2, 3);
echo "2 + 3 = $hasil";
echo <br>;

//pemanggilan fungsi kedua
$hasil=pertambahan(5, 79);
echo "5 + 79 = $hasil";

//pemanggilan fungsi ketiga
echo "6 + 11 =".pertambahan(6, 11);

?>