<div>
    <h2>Logowanie</h2>
    <form method="post" action="">
        <label for="temat">temat:</label>
    <input type="text" name="temat" required>
    <br>
    <label for="tresc">tresc:</label>
    <textarea name="tresc" required></textarea>
    <br>
    <label for="email">email:</label>
    <input type="email" name="email" required>
    <br>
    <button type="submit">wyslij</button>
    </form>
</div>

<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
        {
            echo 'nie wypełniles pola';
        }
        else
        {
            $odbiorca='ddasdsadas168@gmail.com';
            $mail['subject']=$_POST['temat'];
            $mail['body']=$_POST['tresc'];
            $mail['sender']=$_POST['email'];
            $mail['recipient']=$odbiorca; 

            $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
            $header .= "Mime-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: 8bit";
            $header .= "X-Sender: <".$mail['sender'].">\n";
            $header .= "X-Mailer: PRapWWW mail 1.2\n";
            $header .= "X-Priority: 3\n";
            $header .= "Return-Path: <".$mail['sender'].">\n";
            if(mail($mail['recipient'],$mail['subject'],$mail['body'],$header)){
                echo 'wiadomosc wyslana';
            }else{
                echo'wiadomosc nie wyslana';
            }
        }
    }
?>