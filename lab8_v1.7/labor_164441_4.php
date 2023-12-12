<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="pl" />
<meta name="Author" content="Natalia Winnicka" />
<title>lab4php</title>
</head>

<body>
    <div class="div1">
        <table width="100%">
           
        <tr>
            <td>
                <li><a href="index.php">Strona główna<br>
                <img src="roze.gif" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
            </td> 
            <td>
        <li><a href="podstr2.html">Polecane szydełka <br><img src="https://2.bp.blogspot.com/-yiAHn-eqwag/UayNmfm52wI/AAAAAAAAEzY/fZY3UxE-Qbs/s400/hooks1.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
            </td>
            <td>
                <li><a href="podstr3.html">Podstawowe sploty <br><img src="https://blog.weareknitters.pl/files/2018/12/foto_1-1024x683.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
            </td>
            <td>
                <li><a href="podstr4.html">Stosowane skróty <br><img src="https://motekko.weebly.com/uploads/4/0/9/4/40945071/8366078_orig.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
            </td>
            <td>
                 <li><a href="podstr5.html">Wzory <br><img src="https://www.olimoripasmanteria.pl/wp-content/uploads/2023/03/wzor-kangurek-malenstwo-olimori.jpg" alt="nie udało się załadować obrazka" width="150" height="200"></a></li>
            </td>
    </tr>
        </table>
    </div>
    <div>
        <form method="get">
        Imię: <input type="text" name='name'>
        <input type="submit">
        <br />
    </form>
</div>
    <div>
    <form method="post">
        Nazwisko: <input type="text" name='last'>
        <input type="submit">
        <br />
    </form>
    </div>
    <div>
   <?php
        $nr_indeksu = '164441';
        $nrGrupy = '4';
        echo 'Natalia Winnicka '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
        echo 'Zastosowanie metody include() <br />';
         include 'vars.php'; 
        echo "A $color $fruit <br />";
        echo "<br /> Zastosowanie if else elseif ";
        $a=4;
        $b=7;
        if ($a > $b) {
            echo "<br /> a jest wieksze od b <br />";
        } elseif ($a == $b) {
            echo "<br /> a jest rowne b <br />";
        } else {
            echo "<br /> a jest mniejsze od b <br />";
        }
        echo "<br /> Zastosowanie while <br />";
        $i=-1;
        while( ++$i < 10 ); 
        echo "$i <br />"; 
        echo "<br /> Zastosowanie for <br />";
        $i = 1;
        for (; ; ) {
        if ($i > 10) {
        break;
        }
        echo $i;
        $i++;
        }
        echo "<br /><br /> Zastosowanie GET POST SESSION <br />";
        if(isset($_GET['name']))
        {
            echo 'GET<br />';
            echo 'Imie   ';
            echo $_GET['name'];
            echo '<br />';
        }
        if(isset($_POST['last']))
        {
            echo 'POST<br />';
            echo 'Nazwisko   ';
            echo $_POST['last'];
            echo '<br />';
        }

        session_start();

$_SESSION['test'] = 42;
$test = 43;
echo $_SESSION['test'];
       ?>
    </div>
    <footer>
    <?php require_once 'footer.php';?>
</footer>
</body>
</html>