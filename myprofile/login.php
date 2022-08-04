<?php
session_start();
    include("connection.php");
    include("function.php");

    if ($_SERVER ['REQUEST_METHOD']=="POST")
    {
       $user_name = $_POST ['user_name'];
       $password = $_POST ['password'];

       if (!empty ($user_name) && !empty ($password) && !is_numeric($user_name))
       {
            
            $query = "select *from users where user_name ='$user_name' limit 1";
            $result = mysqli_query($con , $query);
            if ($result){
                            if ($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        if ($user_data['password']=== $password)
                        {
                            $_SESSION ['user_id'] = $user_data['user_id']; 
                            header ("Location: index.php");
                            die;
                        }

                    }
            }
           // header ("Location: login.php");
            //die;
       }else{
         echo "Please enter some valid information!";
       }
    }




?>



<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- custom js and css for slideshow-->
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div id = "frm">
        <form method= "POST">
            <p>
            <p>Sign-In</p>
                <label>Username:</label>
                <input type="text" id="user" name="user_name"/>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="password"/>
            </p>
            <p>
                <input type="submit" id="btn" name="Login"/>
            </p>
            <p>
                <a href ="signup.php">Sign Up</a>
            </p>
        

</form>
</div>










</html>
