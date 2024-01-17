<div>
    <table width="100%">
       
       <tr>
       <?php
session_start();

if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true) {
    echo '
    <td>
         <li><a href="index.php?idp=sklep&idp1=pokaz_kat"> Pokaz kategorie <br></a></li>
    </td>      
    <td>
    <li><a href="index.php?idp=sklep&idp1=dodaj_kat"> Dodaj kategorie <br></a></li>
    </td>
    <td>
         <li><a href="index.php?idp=sklep&idp1=pokaz_prze"> pokaz przedmioty <br></a></li>
    </td>
    <td>
         <li><a href="index.php?idp=sklep&idp1=dodaj_przed"> dodaj przedmiot <br></a></li>
    </td>
    <td>
         <li><a href="index.php?idp=sklep&idp1=lista_prze"> Pokaz przedmioty (klient) <br></a></li>
    </td>
    <td>
         <li><a href="index.php?idp=sklep&idp1=koszyk"> koszyk <br></a></li>
    </td>';
    // nasze wszystkie przyciski ktore wymagaja zalogowania
}else
{
    echo '
    <td>
         <li><a href="index.php?idp=sklep&idp1=logowanie"> Logowanie <br></a></li>
    </td> '; 
}
?>
   </tr>
       </table>
   </div>   
   <?php

                   function include_sklep($strona1) {
                       if (file_exists($strona1)) {
                           include($strona1);
                       } else {
                           echo "Brak strony.";
                       }
                   }
   
                   if (isset($_GET['idp1'])) {
                       $idp1 = $_GET['idp1'];
                       echo $idp1;
                   
                       if ($idp1 == 'dodaj_kat') {
                           $strona1 = 'php/dodaj_kategorie.php';
                       } elseif ($idp1 == 'edytuj') {
                           $strona1 = 'php/edytuj_sklep.php';
                       } elseif ($idp1 == 'pokaz_kat') {
                           $strona1 = 'php/pokaz_kategorie.php';
                       } elseif ($idp1 == 'dodaj_przed') {
                           $strona1 = 'php/dodaj_przedmiot.php';
                       }  elseif ($idp1 == 'usun') {
                           $strona1 = 'php/usun_sklep.php';
                       } elseif ($idp1 == 'logowanie') {
                           $strona1 = 'php/form_logowania.php';
                       }  elseif ($idp1 == 'pokaz_prze') {
                           $strona1 = 'php/pokaz_przedmioty.php';
                       }  elseif ($idp1 == 'edytuj_kategorie') {
                           $strona1 = 'php/edytuj_kategorie.php';
                       }  elseif ($idp1 == 'usun_kategorie') {
                           $strona1 = 'php/usun_kategorie.php';
                       }  elseif ($idp1 == 'edytuj_przedmiot') {
                           $strona1 = 'php/edytuj_przedmiot.php';
                       }  elseif ($idp1 == 'usun_przedmiot') {
                           $strona1 = 'php/usun_przedmiot.php';
                      }   elseif ($idp1 == 'lista_prze') {
                           $strona1 = 'php/lista_przedmiotow.php';
                      }   elseif ($idp1 == 'koszyk') {
                        $strona1 = 'php/koszyk.php';
                      }
   
                       include_sklep($strona1);
                   }
                   
                   
               ?>