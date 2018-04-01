<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="definition" content="Organize and share your markdown-flavored findings with others!">
	<meta name="author" content="Dylan Roberts: dylan.roberts@georgebrown.ca / Sean Price: sean.price@georgebrown.ca">
    <?php include_once("favicon.php")?>
    <link rel="stylesheet" href="/css/main.css" >
    <link href="https://fonts.googleapis.com/css?family=Chewy|Homemade+Apple|Pompiere" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NoteShare | Register</title>
    <style>
        body{
            background-image: url("img/loginbg.jpg");
            background-color: #333;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }

        .container{
            padding:0;
        }

        .login-container{
            display: block;
            min-width: 400px;
            margin: 0 auto;
        }

        .login-container>*{
            text-align: center;
        }
        
        #loginlogo{
            display: inline-block;
            margin: 0 auto;
        }

        form{
            min-width: 420px;
            margin: 0 auto;

        }

        form>*{
            border-radius: 10px;
            border: none;
            padding: 5px;
            margin: 5px;
        }

        button{
            border: none;
            border-radius: 10px;
            padding: 5px;
            margin-left: 0;
            margin-top: 4%;
        }

        p{
            color:white;
            font-size:1.8em;
        }
    </style>
    
    
</head>

<body>
<div class="container">

    <div class="page-header">



    </div>

<div class="login-container">
    <a href="index.php"><img id="loginlogo" src="img/WhiteLogo100x100.png" alt="NoteShare" ></a>
    <p>Please Enter Your Information</p>
    <p><?php echo  isset($_GET['msg']) ? $_GET['msg'] : '' ?> </p>
    <form action="createAccount.php" method="POST">
        <input type="text" name="username" placeholder="User Name"  required>
        <input type="text" name="email" placeholder="E-mail Address" required><br/>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="repassword" placeholder="Re-Type Password" required><br/>
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required><br/>
        <button type="submit">Create Account</button>

    </form>

</div>

</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>

</body>
</html>
