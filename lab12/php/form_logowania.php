<div>
    <h2>Logowanie</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Submit</button>
    </form>
    <h3>Zapomniales hasla?</h3>
    <form method="post" action="">
    <label for="email">email:</label>
    <input type="text" name="email" required>
    <br>
    <button type="submit">przypomnij haslo</button>
    </form>
</div>

<?php
    include('authconfig.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])){

        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username === $myusername && $password === $mypassword)
    {
        $_SESSION['isloggedin'] = true;
        header("Location: index.php?idp=lab7");
        exit;
    }
    else
    { 
        echo "Błąd logowania";
    }
    }elseif(isset($_POST['email'])){
        $mail['subject']='Przypomnienie hasla';
            $mail['body']='To twoje haslo: '.$mypassword;
            $mail['sender']='ddasdsadas168@gmail.com';
            $mail['reciptient']=$_POST['email'];

            $header = "From: Formularz kontaktowy <".$mail['sender']."\n";
            $header .= "Mime-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: 8bit";
            $header .= "X-Sender: <".$mail['sender'].">\n";
            $header .= "X-Mailer: PRapWWW mail 1.2\n";
            $header .= "X-Priority: 3\n";
            $header .= "Return-Path: <".$mail['sender'].">\n";

            if(mail($mail['reciptient'],$mail['subject'],$mail['body'],$header)){
                echo 'wiadomosc wyslana';
        }else{
        echo 'wiadomosc nie wyslana';
        }
}
        }
        
?>