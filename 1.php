<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<h1 align="center"> DAFTAR HARGA BBM </h1>
    <form name="FBBM" action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    <table border="2" align="center"> 
    	<tr>
		 
        	<td>Liter Awal</td>
            <td>Liter Akhir</td>
            <td>Bensin</td>
            <td>Solar</td>
            <td>Minyak Tanah</td>
        </tr>
        <tr>
        	<td><select name="cb_liter_awal" size="1" selected = "1">
        		<option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9</option>
                <option value="10"> 10 </option>
             	</select></td>
            <td><select name="cb_liter_akhir" size="1" selected = "1">
        		<option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9</option>
                <option value="10"> 10 </option>
             	</select></td>
             <td align="center"><input type = "checkbox" name="ck_bensin" value="Bensin"  /></td>
             <td align="center"><input type = "checkbox" name="ck_solar" value="Solar" /></td>
             <td align="center"><input type = "checkbox" name="ck_minyak" value="Minyak Tanah" /></td>
    	</tr>
        <tr>
        	<td colspan="5" align="center"> <input type="submit" name="btn_submit" value="Tampilkan" /> </td>
             
    </table>
  	</form>
    

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$literAwal = $_POST["cb_liter_awal"];
		$literAkhir = $_POST["cb_liter_akhir"];
		
		$ck_bensin = isset($_POST['ck_bensin']) ? $_POST['ck_bensin'] : NULL;
		$ck_solar = isset($_POST['ck_solar']) ? $_POST['ck_solar'] : NULL;
		$ck_minyak = isset($_POST['ck_minyak']) ? $_POST['ck_minyak'] : NULL;
				
		//Pertukaran kalau liter awal > liter akhir
		if($literAwal > $literAkhir)
		{
			$temp = $literAwal;
			$literAwal = $literAkhir;
			$literAkhir = $temp;
		}
		
		if ($ck_bensin && $ck_solar == null && $ck_minyak == null)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Bensin</td></tr>";
			$bensin = 6000 * $literAwal;
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $bensin </td> </tr>";
				$bensin = $bensin + 6000;
			}
			echo"</table>";
		}
		elseif ($ck_bensin == null && $ck_solar && $ck_minyak == null)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Solar</td></tr>";
			$solar = 5500 * $literAwal;
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $solar </td> </tr>";
				$solar = $solar + 5500;
			}
			echo"</table>";
		}
		elseif ($ck_bensin == null && $ck_solar == null && $ck_minyak)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Minyak Tanah</td></tr>";
			$minyakTanah = 2500 * $literAwal;
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $minyakTanah </td> </tr>";
				$minyakTanah = $minyakTanah + 2500;
			}
			echo"</table>";
		}
		elseif ($ck_bensin && $ck_solar && $ck_minyak == null)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Bensin</td> <td> Solar</td> </tr>";
			$bensin = 6000 * $literAwal;
			$solar = 5500 * $literAwal;
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $bensin </td> <td> $solar </td></tr>";
				$bensin = $bensin + 6000;
				$solar = $solar + 5500;
			}
			echo"</table>";
		}
		elseif ($ck_bensin && $ck_solar == null && $ck_minyak)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Bensin</td> <td> Minyak Tanah</td> </tr>";
			$bensin = 6000 * $literAwal;
			$minyak = 2500 * $literAwal;
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $bensin </td> <td> $minyak </td></tr>";
				$bensin = $bensin + 6000;
				$minyak = $minyak + 2500;
			}
			echo"</table>";
		}
		elseif ($ck_bensin == null && $ck_solar && $ck_minyak)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Solar</td> <td> Minyak</td> </tr>";
			$minyak = 2500 * $literAwal;
			$solar = 5500 * $literAwal;
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $solar </td> <td> $minyak </td></tr>";
				$minyak = $minyak + 2500;
				$solar = $solar + 5500;
			}
			echo"</table>";
		}
		elseif ($ck_bensin && $ck_solar && $ck_minyak)
		{
			echo"<table border = \"2\" align=\"center\"> <tr> <td>Liter</td> <td>Bensin</td> <td> Solar </td> <td>Minyak</td></tr>";
			$minyak = 2500 * $literAwal;
			$solar = 5500 * $literAwal;
			$bensin = 6000 * $literAwal;
			
			for($a=$literAwal; $a<=$literAkhir; $a++)
			{
				echo"<tr> <td> $a </td>";
				echo"<td> $bensin </td> <td> $solar </td> <td> $minyak </td></tr>";
				$bensin = $bensin + 6000;
				$minyak = $minyak + 2500;
				$solar = $solar + 5500;
			}
			echo"</table>";
		}
		
	}
	else
	{
		echo"<table border=\"2\" align=\"center\">"; 
		echo"<tr> <td>Liter</td> <td>Bensin</td> <td>Solar</td> <td>Minyak Tanah</td> </tr>";
		$bensin = 6000;
		$solar = 5500;
		$minyakTanah = 2500;
		for($a=1; $a<=10; $a++)
		{
			echo"<tr> <td> $a </td>";
			echo"<td> $bensin </td>";
			echo"<td> $solar </td>";
			echo"<td> $minyakTanah </td> </tr>";
			$bensin = $bensin + 6000;
			$solar = $solar + 5500;
			$minyakTanah = $minyakTanah + 2500;
		}
		
	}

?>

</body>
</html>