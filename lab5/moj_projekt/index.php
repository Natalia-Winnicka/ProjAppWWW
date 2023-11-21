<!DOCTYPE html>
<?
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="pl" />
<meta name="Author" content="Natalia Winnicka" />
<title> Moje hobby to szydełkowanie</title>

</head>
<body>
<h1><i>Mam nadzieje ze z nami zaczniesz swoja przygode</i></h1>
<div class="div1">
    <table width="100%">
       
    <tr>
        <td>
            <li><a href="index.php?idp=podstr1">Polecane włóczki <br>
            <img src="https://eore4vit998.exactdn.com/wp-content/uploads/2019/08/MC19_cotton_glam_01-2.jpg?strip=all&lossy=1&ssl=1" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
        </td> 
        <td>
    <li><a href="index.php?idp=podstr2">Polecane szydełka <br><img src="https://2.bp.blogspot.com/-yiAHn-eqwag/UayNmfm52wI/AAAAAAAAEzY/fZY3UxE-Qbs/s400/hooks1.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
        </td>
        <td>
            <li><a href="index.php?idp=podstr3">Podstawowe sploty <br><img src="https://blog.weareknitters.pl/files/2018/12/foto_1-1024x683.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
        </td>
        <td>
            <li><a href="index.php?idp=podstr4">Stosowane skróty <br><img src="https://motekko.weebly.com/uploads/4/0/9/4/40945071/8366078_orig.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
        </td>
        <td>
             <li><a href="index.php?idp=podstr5">Wzory <br><img src="https://www.olimoripasmanteria.pl/wp-content/uploads/2023/03/wzor-kangurek-malenstwo-olimori.jpg" alt="nie udało się załadować obrazka"width="150" height="200"></a></li>
        </td>
</tr>
    </table>
</div>

<li><a href="index.php?idp=filmy">Filmy <br><img src="https://i.ytimg.com/vi/TlBMcexUwjE/maxresdefault.jpg"width="300" height="200"></a></li>

<?php
                function includeOption($strona) {
                    if (file_exists($strona)) {
                        include($strona);
                    } else {
                        echo "Brak strony.";
                    }
                }

                if (isset($_GET['idp'])) {
                    $idp = $_GET['idp'];
                
                    if ($idp == 'podstr1') {
                        $strona = 'html/podstr1.html';
                    } elseif ($idp == 'podstr2') {
                        $strona = 'html/podstr2.html';
                    } elseif ($idp == 'podstr3') {
                        $strona = 'html/podstr3.html';
                    } elseif ($idp == 'podstr4') {
                        $strona = 'html/podstr4.html';
                    } elseif ($idp == 'podstr5') {
                        $strona = 'html/podstr5.html';
                    } elseif ($idp == 'filmy') {
                        $strona = 'html/filmy.html';
                    } elseif ($idp == 'php') {
                        $strona = 'labor_164441_4.php';
                    } 

                    includeOption($strona);
                }
            ?>
</body>
<footer>

<br><b>Kontakt</b><br>
    <form action="mailto:164441@student.uwm.edu.pl" method="post" enctype="text/plain">
        <label for="imie">Imię:</label><br>
        <input type="text" id="imie" name="imie" value="Kamil"><br>
        <label for="naz">Nazwisko:</label><br>
        <input type="text" id="naz" name="naz" value="Kowalski"><br>
        <label for="opis">Opis</label><br>
        <textarea>Opis...</textarea><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Reset">
  </form>
  <?php
        $nr_indeksu = '164441';
        $nrGrupy = '4';
        echo 'Natalia Winnicka '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
        
?>
</footer>
</html>