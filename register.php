<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
	<meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./testc.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
    background: linear-gradient(270deg, #32ff7e, #fffa65, #ffaf40, #7d5fff, #18dcff, #ff4d4d, #ffcccc);
    background-size: 1400% 1400%;

    -webkit-animation: Animationname 9s ease infinite;
    -moz-animation: Animationname 9s ease infinite;
    animation: Animationname 9s ease infinite;
}

@-webkit-keyframes Animationname {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@-moz-keyframes Animationname {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@keyframes Animationname {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
    </style>
    <!-- PWA shiz -->
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/apple-touch-icon.png' rel='apple-touch-icon' sizes='180x180'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-32x32.png' rel='icon' sizes='32x32' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-16x16.png' rel='icon' sizes='16x16' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/site.webmanifest' rel='manifest'/>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="./index.html">
            <h1 class="text-4xl font-bold text-white text-center">Profdogie</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl text-gray-700">Welcome to Profdogie</h3>
            <p class="text-gray-600 pt-2">Let's create your account.</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="register.php">
			<div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">name</label>
                    <input type="text" id="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="YOUR name" name="username" required>
                </div>
			<div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="YOUR EMAIL" name="useremail" required>
				</div>
			<div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Adress</label>
                    <input type="text" id="adress" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="YOUR ADDRESS" name="useraddress" required>
                </div>
			<div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Phone</label>
                    <input type="text" id="Phone" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="YOUR PHONE NUMBER" name="userphone" required>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="PASSWORD PLEASE" name="pass" required>
                </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" value="reg" name="reg">Sign up</button>
            </form>
        </section>
    </main>

    <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">have an account? <a href="login.html.php" class="font-bold hover:underline hover:text-purple-700">Sign in</a>.</p>
    </div>
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
</body>
</html>





<?php 
require_once 'dbconfig.php';

// REGISTER USER
if(isset($_POST['reg'])) 
{
    
    
	// receive all input values from the form
    $username = $_POST['username'];
	$useremail = $_POST['useremail'];
	$password = $_POST['pass'];
    $userphone = $_POST['userphone'];
    $useraddress = $_POST['useraddress'];
    
    if($useremail!='' || $username!=''|| $password!=''|| $userphone!=''|| $useraddress!='' )
    {
       $regi = $db->query("INSERT INTO users(name,email,pass,phone,address) VALUES ('$username', '$useremail', '$password', '$userphone', '$useraddress');");
        
		
        
        $message = "registration done ! ";
         echo "<script type='text/javascript'>alert('$message');</script>";
        
      
    }
	
		

		
	
	
}

 ?>

    	
    	
            