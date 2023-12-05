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
</div>

<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('authconfig.php');
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
        }
        
?>