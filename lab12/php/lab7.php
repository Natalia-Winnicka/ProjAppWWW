<div>
    <table width="100%">
       
       <tr>
       <?php
session_start();

if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true) {
    echo '
    <td>
         <li><a href="index.php?idp=lab7&idp1=pokaz"> Pokaz <br></a></li>
    </td>      
    <td>
    <li><a href="index.php?idp=lab7&idp1=dodaj"> Dodaj <br></a></li>
    </td>
    <td>
         <li><a href="index.php?idp=lab7&idp1=kontakt"> Kontakt <br></a></li>
    </td>';
    // nasze wszystkie przyciski ktore wymagaja zalogowania
}else
{
    echo '
    <td>
         <li><a href="index.php?idp=lab7&idp1=logowanie"> Logowanie <br></a></li>
    </td> '; 
}
?>
   </tr>
       </table>
   </div>   
   <?php

                   function include_lab7($strona1) {
                       if (file_exists($strona1)) {
                           include($strona1);
                       } else {
                           echo "Brak strony.";
                       }
                   }
   
                   if (isset($_GET['idp1'])) {
                       $idp1 = $_GET['idp1'];
                       echo $idp1;
                   
                       if ($idp1 == 'dodaj') {
                           $strona1 = 'php/form_dodaj.php';
                       } elseif ($idp1 == 'edytuj') {
                           $strona1 = 'php/form_edytuj.php';
                       } elseif ($idp1 == 'pokaz') {
                           $strona1 = 'php/form_pokaz.php';
                       } elseif ($idp1 == 'usun') {
                           $strona1 = 'php/form_usun.php';
                       } elseif ($idp1 == 'logowanie') {
                           $strona1 = 'php/form_logowania.php';
                       } elseif ($idp1 == 'filmy') {
                           $strona1 = '../html/filmy.html';
                       } elseif ($idp1 == 'kontakt') {
                        $strona1 = 'php/form_kontakt.php';
                    }
   
                       include_lab7($strona1);
                   }
                   
               ?>