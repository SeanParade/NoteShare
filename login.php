
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
	<title>NoteShare | Login</title>
    <style>
        body{
            background-image: url("img/loginbg.jpg");
            background-color: #333;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }






/*Page Content*/
        .login-container{
            display: block;
            width: 400px;
            margin: 0 auto;
        }

        .login-container>*{
            text-align: center;
        }

        #loginlogo{
            display: block;
            margin: 0 auto;
        }

        #noteshare{
            margin-top: -12%;
            margin-bottom: -3% ;
            color: white;
            font-family: 'Pompiere', cursive;
            font-size: 4em
        }

        form>*{
            border-radius: 10px;
            border: none;
            padding: 5px;
            margin: 5px;
            color: saddlebrown;
        }

        button{
            border:none;
            border-radius: 10px;
            padding: 5px;
            color: saddlebrown;
            background-color: #ccc;
        }


         


    </style>
    
    
</head>

<body>
<div class="container">



<div class="login-container">
    <img id="loginlogo" src="img/WhiteLogo.png" alt="NoteShare" height="300 vh" width="300 vw">
    <p id="noteshare">NOTE SHARE</p>
    <p><?php echo  isset($_GET['msg']) ? $_GET['msg'] : '' ?> </p>
    <form action="loginUser.php" method="POST">
        <input type="text" name="username" placeholder="User Name" required><br/>
        <input type="password" name="password" placeholder="Password" required><br/>
        <button type="submit" role="button">Login</button>
        <a href="register.php"><button type="button" role="button">Register</button></a>

    </form>

</div>

</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

</body>
<!-- https://www.youtube.com/watch?v=gqOEoUR5RHg -->
</html>
<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>
