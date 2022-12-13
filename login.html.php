<?php
session_start();
require_once 'dbconfig.php';

if(isset($_POST["login"])){

if(!empty($_POST['useremail']) && !empty($_POST['pass'])) {
    
	$useremail=$_POST['useremail'];
	$pass=$_POST['pass'];
    
    
	$query=mysqli_query($db,"SELECT * FROM users WHERE email= '".$useremail."' AND pass='".$pass."'");
    
   	$numrows=mysqli_num_rows($query);
    
	if($numrows !=0)
	{
        while($row=mysqli_fetch_assoc($query))
        {
            $dbuseremail=$row['email'];
            $dbpass=$row['pass'];
            $dbusername=$row['name'];
            $dbuserid=$row['id'];    
	    }

        
        if($useremail == $dbuseremail && $pass == $dbpass)
        {

            $_SESSION['s_name']= $dbusername;
            $_SESSION['userid']= $dbuserid;

            /* Redirect browser */
            header("Location: loggedin.php");
        }
	} 
    else 
    {
	   $message = "Invalid credentials !";
        echo "<script type='text/javascript'>alert('$message');</script>";
	}

} 
    else {
	echo "All fields are required!";
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
	<meta name="author" content="">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./testc.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
            video {
                    object-fit: cover;
                    width: 100vw;
                    height: 100vh;
                    position: fixed;
                    top: 0;
                    left: 0;
                   }
            .viewport-header {
                                position: relative;
                                width: 70vh;
                                height: 100vh;
                                text-align: center;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }
    </style>
    <!-- PWA shiz -->
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/apple-touch-icon.png' rel='apple-touch-icon' sizes='180x180'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-32x32.png' rel='icon' sizes='32x32' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-16x16.png' rel='icon' sizes='16x16' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/site.webmanifest' rel='manifest'/>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
<video id="myVideo" src="img/My3-1.m4v" autoplay loop playsinline muted></video>
<header class="viewport-header">
    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl text-gray-700">Welcome to Electrodogie</h3>
            <p class="text-gray-600 pt-2">Sign in to your account.</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="login.html.php">
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label><a onclick="unmute()">
                    <input type="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="YOUR EMAIL" name="useremail" required></a>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="PASSWORD PLEASE" name="pass" required>
                </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" value="login" name="login">Sign In</button>
            </form>
            <div class="max-w-lg mx-auto text-center mt-12 mb-6">
                <p class="text-black">Don't have an account? <a href="register.php" class="font-bold text-gray-700 hover:underline hover:text-purple-700">Sign up</a>.</p>
                </div>
        </section>
        <div class="toggler">
        <button id="toggler" class="toggler" >Audio</button>
                    </div>
    </main>  
</header> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>
  $("body").addClass("thin");
// If user has Javascript disabled, the thick scrollbar is shown
$("body").mouseover(function(){
  $(this).removeClass("thin");
});
$("body").mouseout(function(){
  $(this).addClass("thin");
});
$("body").scroll(function () {
  $("body").addClass("thin");
});
</script>


<script>
    $(document).ready(function(e) {
    
    $('video').on('loadeddata', function(e) {
        console.log('onloadeddata', e.target);
        $(this).prop("muted", true);
     });
    var isMuted = true; 
     $('#toggler').click(function(e) {
         isMuted = !isMuted;
         $('video').prop("muted", isMuted);
     });

     

     
     
 });
</script>
<script>
    
    let input = document.querySelector('input');
    let log = document.getElementById('log');

    input.oninput = unmute;
    var video = document.getElementById('video');
    var isMuted = true;
    function unmute(e) {
        console.log("umuted");
        isMuted = !isMuted;
        $('video').prop("muted", isMuted);
        document.getElementById("myVideo").setAttribute('src', 'img/Dogo.mp4');
    }
</script>
</body>
</html>