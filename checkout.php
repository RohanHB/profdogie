<?php
session_start();
$username = $_SESSION['s_name'];
if (empty($_SESSION['s_name'])) {
    header('Location: login.html.php');
    exit;
  }
?>
<?php 
// Include the database config file 
require_once 'dbconfig.php'; 
 
// Initialize shopping cart class 
include_once 'cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if($cart->total_items() <= 0){ 
    header("Location: loggedin.php"); 
} 
 
// Get posted data from session 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />   
    <link rel="stylesheet" href="./testc.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
    
    <style>
                             
    </style>

    <style>
        

    </style>
    <!-- PWA shiz -->
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/apple-touch-icon.png' rel='apple-touch-icon' sizes='180x180'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-32x32.png' rel='icon' sizes='32x32' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-16x16.png' rel='icon' sizes='16x16' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/site.webmanifest' rel='manifest'/>
<meta name="theme-color" content="#7c3aed">
    <meta name="apple-mobile-web-app-status-bar-style" content="#7c3aed">
    
</head>
<body>
    <!-- navigation -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
  <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
        <img src="./admin/uploads/buskyT.png" alt="" class="realtive overflow-hidden rounded-full  w-12 h-12 ">
            <a href="./loggedin.php" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Profdogie</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">             
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>               
            </button>
            <a href="viewcart.php">
              <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24">
                  <path
                      d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                  <circle cx="10.5" cy="18.5" r="1.5" />
                  <circle cx="17.5" cy="18.5" r="1.5" />
              </svg>
          </a>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./loggedin.php">Home</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./Aboutus.html">About</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./Contact.html">Contact us</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./logout.php">Logout</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="#">Hi,<b><?php echo ucwords($username); ?></a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                  <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>More</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                  <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right    rounded-md shadow-lg md:w-48 ">
                    <div class="px-2 py-2 bg-white sticky z-20 rounded-md shadow dark-mode:bg-gray-800 ">
                      <a class="block  px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./Aboutus.html">About</a>
                      <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./python_blog.html">Python</a>
                      <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./ruby_blog.html">Ruby</a>
                    </div>
                  </div>
                </div>       
        </nav>
  </div>
</div>

<!-- body -->
<main class="my-8">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
            <h4 class="text-gray-700 text-xl font-medium">Contact Details</h4>
            <div class="flex flex-col lg:flex-row mt-8">
                <div class="w-full lg:w-1/2 order-2">
                    <form class=" lg:w-3/4" method="post" action="cartAction.php">
                        
                        <div class=" ">
                            <h4 class="text-sm text-gray-500 font-medium">Name</h4>
                            <div class="mt-6 flex">
                                <label class="block  flex-1 ml-3 ">
                                    <input type="text" class="form-input mt-1 block w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="First Name" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" required>
                                </label>
                                <label class="block flex-1 ml-3">
                                    <input type="text" class="form-input mt-1 block w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="Last Name" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']:''; ?>" required>
                                </label>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="text-sm text-gray-500 font-medium">Email</h4>
                            <div class="mt-6 flex">
                                <label class="block flex-1 ml-3">
                                    <input type="text" class="form-input mt-1 block w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="Email" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                                </label>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="text-sm text-gray-500 font-medium">Phone</h4>
                            <div class="mt-6 flex">
                                <label class="block flex-1 ml-3">
                                    <input type="text" class="form-input mt-1 block w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="Phone" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                                </label>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="text-sm text-gray-500 font-medium">Delivery address</h4>
                            <div class="mt-6 flex">
                                <label class="block flex-1 ml-3">
                                    <input type="text" class="form-input mt-1 block w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="Address" name="address" value="<?php echo !empty($postData['address'])?$postData['address']:''; ?>" required>
                                </label>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-xl text-center  text-gray-500 font-medium">Payment</h3>
                            <h4 class="text-sm text-gray-500 font-medium">UPI ID</h4>
                            <div class="mt-6 flex">
                                <label class="block flex-1 ml-3">
                                    <input type="text" class="form-input mt-1 block w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" placeholder="UPI id" name="upi_id">
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-8">
                            <button class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none ">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                                <span class="mx-2">Back step</span>
                            </button>
                            <button type="button" onclick="openModal('mymodalcentered')"  class="modal-open flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                Card payment</button>

                            <button  class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <input type="hidden" name="action" value="placeOrder"/>
                               <input type="submit" class="invisible" name="checkoutSubmit" value="Payment"> <span>Confrim Order</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
                    <div class="flex justify-center lg:justify-end">
                        <div class="border rounded-md max-w-md w-full px-4 py-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-gray-700 font-medium">Order </h3>
                                <span class="text-gray-700 text-md">Total (<?php echo $cart->total_items(); ?>)</span>
                            </div>
                            <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                              <?php 
                                if($cart->total_items() > 0){ 
                                    //get cart items from session 
                                    $cartItems = $cart->contents(); 
                                    foreach($cartItems as $item){ 
                                        $imid = $item["id"];                               
                                ?>
                                <div class="flex">
                                <?php 
                                    $res = $db->query("SELECT id,file_name FROM products WHERE id= $imid ");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $imageURL2 = 'admin/uploads/'.$row["file_name"];
                                        }
                                    
                                    ?>
                                    <img class="h-20 w-20 object-cover rounded" src="<?php echo $imageURL2; ?>" alt="">
                                    <div class="mx-3">
                                        <h3 class="text-sm text-gray-600"><?php echo $item["name"]; ?></h3>
                                        <span class="text-gray-600"><?php echo '₹'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</span> 
                                    </div>
                                </div>
                                <span class="text-gray-600"><?php echo '₹'.$item["subtotal"]; ?></span>             
                                <?php } } ?>
                                <div class="flex items-center ">
                                        <h3 class="text-xl text-gray-600">Total</h3> 
                                        <h3 class="text-xl ml-2 text-gray-600"><?php echo '₹'.$cart->total(); ?></h3>
                                </div>
                            </div>
                            <a href="./loggedin.php">
                        <button class="px-4 py-1 mt-2 text-white font-light tracking-wider bg-gray-900 rounded"  >Add Items</button></a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



<!-- body end -->



<!-- footer -->

<div class="flex flex-wrap justify-center bg-purple-700 p-6">
  <div class="flex flex-wrap mb-4 w-full">
    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 ">
      <h3 class="text-3xl py-4">About Us</h3>
      <p>
      Profdogie is a materialistic Design based website designed to provide best e-source for learning.
      </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 pl-8">
      <h3 class="text-3xl py-4">More</h3>
      <ul>
      <li><a href="C++_blog.html">C++</a></li>
        <li><a href="java_blog.html">Java</a></li>
        <li><a href="php_blog.html">PHP</a></li>
        <li><a href="python_blog.html">Python</a></li>
        <li><a href="ruby_blog.html">Ruby</a></li>
      </ul>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 ">
      <h3 class="text-3xl py-4">Social</h3>
      <ul>
      <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i>&nbsp;Facebook</a></li>
        <li><a href="https://api.whatsapp.com/send?text=http://tshz.c1.biz"><i class="fab fa-whatsapp"></i>&nbsp;Whatsapp</a></li>
        <li><a href="https://www.Instagram.com/"><i class="fab fa-instagram"></i>&nbsp;Instagram</a></li>
        <li><a href="https://www.Twitter.com/"><i class="fab fa-twitter"></i>&nbsp;Twitter</a></li>
        <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i>&nbsp;Youtube</a></li>
      </ul>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
      <h3 class="text-3xl py-4">Subscribe</h3>
      <form action="#">
        <div class="mb-4">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Email">
        </div>
        <button  class="bg-purple-800 hover:bg-indigo-700  text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
      </form>
    </div>
  </div>
</div>
<div class="bg-purple-900 p-2 pl-6">
  <p class="bottom">© Copyright 2021 - <a href="./loggedin.php">Profdogie.com</a></p>
</div> 
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous">
</script>

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
<!-- modal -->


<dialog id="mymodalcentered" class=" bg-transparent z-0 relative w-screen h-screen">
    <div  class="p-7  flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
        <div class="bg-transparent flex rounded-lg w-1/3 relative">
            <div class="flex flex-col items-start">
                <div class="p-7 flex items-center w-full">
                    <div class="text-white font-bold text-lg">Card payment</div>
                    <svg onclick="modalClose('mymodalcentered')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                    </svg>
                </div>

                <div class="px-2  overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">

                    <!-- main -->

                    <style>
                        /*
                        module.exports = {
                            plugins: [require('@tailwindcss/forms'),]
                        };
                        */
                        .form-radio {
                        -webkit-appearance: none;
                            -moz-appearance: none;
                                appearance: none;
                        -webkit-print-color-adjust: exact;
                                color-adjust: exact;
                        display: inline-block;
                        vertical-align: middle;
                        background-origin: border-box;
                        -webkit-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                                user-select: none;
                        flex-shrink: 0;
                        border-radius: 100%;
                        border-width: 2px;
                        }

                        .form-radio:checked {
                        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                        border-color: transparent;
                        background-color: currentColor;
                        background-size: 100% 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                        }

                        @media not print {
                        .form-radio::-ms-check {
                            border-width: 1px;
                            color: transparent;
                            background: inherit;
                            border-color: inherit;
                            border-radius: inherit;
                        }
                        }

                        .form-radio:focus {
                        outline: none;
                        }

                        .form-select {
                        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
                        -webkit-appearance: none;
                            -moz-appearance: none;
                                appearance: none;
                        -webkit-print-color-adjust: exact;
                                color-adjust: exact;
                        background-repeat: no-repeat;
                        padding-top: 0.5rem;
                        padding-right: 2.5rem;
                        padding-bottom: 0.5rem;
                        padding-left: 0.75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        background-position: right 0.5rem center;
                        background-size: 1.5em 1.5em;
                        }

                        .form-select::-ms-expand {
                        color: #a0aec0;
                        border: none;
                        }

                        @media not print {
                        .form-select::-ms-expand {
                            display: none;
                        }
                        }

                        @media print and (-ms-high-contrast: active), print and (-ms-high-contrast: none) {
                        .form-select {
                            padding-right: 0.75rem;
                        }
                        }
                        ::-webkit-scrollbar {
                                width: 20px;
                                }

                                ::-webkit-scrollbar-track {
                                background-color: transparent;
                                }

                                ::-webkit-scrollbar-thumb {
                                background-color: transparent;
                                border-radius: 20px;
                                border: 6px solid transparent;
                                background-clip: content-box;
                                }

                                ::-webkit-scrollbar-thumb:hover {
                                background-color: transparent;
                                }
                        </style>

                        <!-- Component Code -->

  <div  class="min-w-screen min-h-screen custom-scrollbar bg-transparent flex items-center justify-center px-5 pb-10 pt-16">
    <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
        <div class="w-full pt-1 pb-5">
            <div class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                <i class="mdi mdi-credit-card-outline text-3xl"></i>
            </div>
        </div>
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2">
                <label for="type1" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Card number</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="text"/>
            </div>
        </div>
        <div class="mb-3 -mx-2 flex items-end">
            <div class="px-2 w-1/2">
                <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                <div>
                    <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-1/2">
                <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                </select>
            </div>
        </div>
        <div class="mb-10">
            <label class="font-bold text-sm mb-2 ml-1">Security code</label>
            <div>
                <input class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
            </div>
        </div>
        <div>
            <button type="button" onclick="modalClose('mymodalcentered')" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
        </div>
    </div>
</div>
<!-- componet end -->
</div>
                
                <div class="p-7 flex justify-end items-center w-full">
                    <button type="button" onclick="modalClose('mymodalcentered')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">
                        Ok
                    </button>
                    <button type="button" onclick="modalClose('mymodalcentered')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</dialog>





                    <!-- main ends here -->

<script>
    function openModal(key) {
        document.getElementById(key).showModal(); 
        document.body.setAttribute('style', 'overflow: hidden;'); 
        document.getElementById(key).children[0].scrollTop = 0; 
        document.getElementById(key).children[0].classList.remove('opacity-0'); 
        document.getElementById(key).children[0].classList.add('opacity-100')
    }

    function modalClose(key) {
        document.getElementById(key).children[0].classList.remove('opacity-100');
        document.getElementById(key).children[0].classList.add('opacity-0');
        setTimeout(function () {
            document.getElementById(key).close();
            document.body.removeAttribute('style');
        }, 100);
    }
</script>
               

</body>
</html>