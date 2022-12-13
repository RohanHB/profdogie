<?php
session_start();
$username = $_SESSION['s_name'];

?>
<?php 
// Initialize shopping cart class 
include_once 'cart.class.php'; 
$cart = new Cart; 
 
// Include the database config file 
require_once 'dbconfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#7c3aed">
    <meta name="apple-mobile-web-app-status-bar-style" content="#7c3aed">
    <title>Profdogie</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />   
    <link rel="stylesheet" href="./testc.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <style>
        

    </style>
    <!-- PWA shiz -->
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/apple-touch-icon.png' rel='apple-touch-icon' sizes='180x180'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-32x32.png' rel='icon' sizes='32x32' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/favicon-16x16.png' rel='icon' sizes='16x16' type='image/png'/>
<link href='https://raw.githubusercontent.com/techdogie/Profdogie/main/site.webmanifest' rel='manifest'/>
    
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
            <a href="./viewcart.php">
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
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:bg-purple-500" href="./orders.php">Orders </a>
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

<!-- Carousel Slider With Owl -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>


<div class="owl-carousel ">
  <div class="h-64 lg:h-100 relative ">
      <div class="w-full h-full relative  ">
          <img class="rounded-lg " src="https://picsum.photos/850/450.webp?random=1">
      </div>
  </div>
  <div class="h-64 lg:h-100  relative ">
      <div class="w-full h-full relative  ">
          <img class="rounded-lg" src="https://picsum.photos/850/450.webp?random=2">
      </div>
  </div>
  <div class="h-64 lg:h-100  relative ">
      <div class="w-full h-full relative  ">
          <img class="rounded-lg" src="https://picsum.photos/850/450.webp?random=3">
      </div>
  </div>
</div>




<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

</script>
<script>
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        nav: true,
        navContainerClass: 'mx-10 absolute inset-0 flex justify-between text-8xl text-white rounded-lg ',
        navClass: [
            'focus:outline-none',
            'focus:outline-none'
            
        ],

    });
});
</script>

<!-- Carousel Slider With Owl end -->

<!-- enlarged cards -->

<div class="container ">
  <div class="px-2 mx-auto">
  <div class="h-64 rounded-md shadow-lg overflow-hidden bg-cover bg-center " style="background-image: url('./admin/uploads/react_new.png')">
      <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
          <div class="px-10 max-w-xl">
              <h2 class="text-2xl text-white font-semibold">React JS</h2>
              <p class="mt-2 text-gray-400">React is a JavaScript library created by Facebook. React is a tool for building UI components.</p>
              <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                  <a href="cartAction.php?action=addToCart&id=2"><span>Shop Now</span></a>
                  <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
              </button>
          </div>
      </div>
  </div>
  <div class="md:flex mt-8 md:-mx-4">
      <div class="w-full h-64 md:mx-4 rounded-md shadow-lg overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('./admin/uploads/C++_img.jpg')">
          <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
              <div class="px-10 max-w-xl">
                  <h2 class="text-2xl text-white font-semibold">C++</h2>
                  <p class="mt-2 text-gray-400">C++ is a cross-platform language that can be used to create high-performance applications.</p>
                  <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                  <a href="cartAction.php?action=addToCart&id=8"><span>Shop Now</span></a>
                  <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
              </button>
              </div>
          </div>
      </div>
      <div class="w-full h-64 mt-8 md:mx-4 rounded-md shadow-lg overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('./admin/uploads/Python_img.jpg')">
          <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
              <div class="px-10 max-w-xl">
                  <h2 class="text-2xl text-white font-semibold">Python</h2>
                  <p class="mt-2 text-gray-400">Python is a popular programming language. It was created by Guido van Rossum, and released in 1991.</p>
                  <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                  <a href="cartAction.php?action=addToCart&id=10"><span>Shop Now</span></a>
                  <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
              </button>
              </div>
          </div>
      </div>
    </div>
  </div>
<!-- enlarged cards end-->

      <!-- <section class="banner">
     </section> -->

     

    <!-- ui cards -->
    
    <div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap flex-sticky mx-1 lg:mx-4 ">
      <?php 
      function get_first_num_of_words($string, $num_of_words)
      {
          $string = preg_replace('/\s+/', ' ', trim($string));
          $words = explode(" ", $string); // an array
  
          // if number of words you want to get is greater than number of words in the string
          if ($num_of_words > count($words)) {
              // then use number of words in the string
              $num_of_words = count($words);
          }
  
          $new_string = "";
          for ($i = 0; $i < $num_of_words; $i++) {
              $new_string .= $words[$i] . " ";
          }
  
          return trim($new_string);
      }
      
      ?>
    
    <!-- Card with image -->
    <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./ADA_blog.html">
              <img src="./img/Ada_img2.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./ADA_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">ADA</h2>
                </a>
                <div class="text-gray-800 leading-relaxed overflow-clip overflow-hidden">
                  <?php 
                echo get_first_num_of_words("algorithm is a set of steps of operations to solve a problem performing calculation....", 25);
                ?>                
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./ADA_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                    Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
    <!-- Card with image -->
    <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-xl rounded-xl relative">
            <a href="./C++_blog.html">
              <img src="./img/C++_img.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./C++_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">C++</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("C++ is a cross-platform language that can be used to create high-performance applications....", 25);
                ?>
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./C++_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        <!-- Card with image -->
        <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./CSharp_blog.html">
              <img src="./img/Csharp_img.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./CSharp_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">CSharp</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("It is an object-oriented programming language created by Microsoft that runs on the .NET Framework....", 25);
                ?>
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                        Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./CSharp_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        <!-- Card with image -->
        <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./java_blog.html">
              <img src="./img/Java_img.png" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./java_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">JAVA</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("Java is a popular programming language, created in 1995,it is majorly used by android.....", 25);
                ?>
              </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./java_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        <!-- Card with image -->
        <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./php_blog.html">
              <img src="./img/php_img.png" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./php_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">PHP</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("PHP is a server side scripting Language. PHP is widely-used, open source scripting language....", 25);
                ?>
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./php_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        <!-- Card with image -->
        <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./python_blog.html">
              <img src="./img/Python_img.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./python_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">Python</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("Python is a popular programming language. It was created by Guido van Rossum, and released in 1991.....", 25);
                ?>
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./python_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        <!-- Card with image -->
        <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./Reactjs_blog.html">
              <img src="./img/React_img.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./Reactjs_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">React JS</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("React is a JavaScript library created by Facebook. React is a tool for building UI components.....", 25);
                ?>
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./Reactjs_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        <!-- Card with image -->
        <div class="lg:w-1/4 w-full lg:pr-3 mt-6">
            <div class="bg-gray-50 shadow-lg rounded-xl relative">
            <a href="./ruby_blog.html">
              <img src="./img/ruby_img.png" alt="" class="object-cover h-48 w-full rounded-t-xl">
            </a>
              <div class="p-6">
                <a href="./ruby_blog.html">  
                <h2 class="text-2xl font-bold mb-2 hover:text-purple-800 ">Ruby</h2>
                </a>
                <div class="text-gray-800 leading-relaxed">
                <?php 
                echo get_first_num_of_words("Ruby is a object-oriented, reflective, general-purpose, dynamic programming language.....", 25);
                ?>
                </div>
                
                  <a class="flex items-center mt-2 no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 text-gray-800 text-sm">
                          Professor Scary
                      </p>
                  </a>
                  <div class="relative ">
                    <div class="absolute bottom-0 right-0 ">                  
                  <a href="./ruby_blog.html" class="text-indigo-500 px-4 py-3 bg-gray-300 rounded hover:bg-indigo-500 hover:text-white transition duration-300  leading-snug">
                  Read More</a>
                </div>
                </div>
              </div>     
            </div>
          </div>
        
        

    </div>
    
</div>
<!-- Shopping -->

<div class="  flex  " >
<div class="content " >

    <div class="flex items-center justify-between w-full my-4 pl-4 sm:pr-4  ">
      
        <div class="mr-6 " id="perm1">
          <h2 class="text-2xl md:text-4xl font-semibold tracking-tight leading-7 md:leading-10 mb-1 truncate"><span class="bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500  text-transparent "> Our premium Products </span></h2>
          <div class="font-base tracking-tight text-gray-600"></div>
        </div>
        <div class="flex items-center">
          <!-- <button class="bg-gray-900 px-5 py-2 text-sm shadow-sm font-semibold tracking-wider text-white rounded-full hover:bg-gray-800">Add Shop</button> -->
        </div>
      </div>
      
    <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2   ">
    <?php 
        // Get products from database 
        $result = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10"); 
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){
              $imageURL = 'admin/uploads/'.$row["file_name"] ;

              
                        
                  
        ?>
        
        <div class="flex flex-col">
            <div class="bg-white shadow-md  rounded-3xl p-4">
                <div class="flex-none lg:flex">
                    <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                    

                        <img src="<?php echo $imageURL;
                        
                        
                         ?>"
                            alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl"> 
                        
                    </div>
                    <div class="flex-auto ml-3 justify-evenly py-2">
                        <div class="flex flex-wrap ">
                            
                            <h2 class="flex-auto text-lg font-medium"><?php echo $row["name"]; ?></</h2>
                        </div>
                        <p class="mt-3 text-blue-700"><?php echo $row["description"]; ?></p>
                        
                        <div class="flex p-4 pb-2 border-t border-gray-200 ">
                        <p class="mt-3 text-gray-700 hover:bg-indigo-500">Price: <?php echo '₹'.$row["price"].' '; ?></p>
                        </div>
                        
                        <div class="flex space-x-3 text-sm font-medium">
                          
                            <div class="flex-auto flex space-x-3">
                                
                            <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">
                            <button
                                class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-indigo-500"
                                type="button" aria-label="like">Buy Now</button></a>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p class="mt-3 text-gray-700 hover:bg-indigo-500">Product(s) not found.....</p>
        <?php } ?>
        
        
        
    </div>
</div>
</div>

    </div>
</div>

<!-- Shopping End -->


<!-- testimonials-block -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="pt-6"><path fill="#7C3AED" fill-opacity="1" d="M0,192L60,213.3C120,235,240,277,360,272C480,267,600,213,720,181.3C840,149,960,139,1080,154.7C1200,171,1320,213,1380,234.7L1440,256L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
<div class="min-w-screen min-h-screen  flex items-center justify-center py-5">
  
  <div class="w-full bg-white   px-5 py-16 md:py-24 text-gray-800">
      <div class="w-full max-w-6xl mx-auto">
          <div class="text-center max-w-xl mx-auto">
              <h1 class="text-6xl md:text-7xl font-bold mb-5 text-gray-600">What people <br>are saying.</h1>
              <h3 class="text-xl mb-5 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
              <div class="text-center mb-10">
                  <span class="inline-block w-1 h-1 rounded-full bg-indigo-500 ml-1"></span>
                  <span class="inline-block w-3 h-1 rounded-full bg-indigo-500 ml-1"></span>
                  <span class="inline-block w-40 h-1 rounded-full bg-indigo-500"></span>
                  <span class="inline-block w-3 h-1 rounded-full bg-indigo-500 ml-1"></span>
                  <span class="inline-block w-1 h-1 rounded-full bg-indigo-500 ml-1"></span>
              </div>
          </div>
          <div class="-mx-3 md:flex items-start">
              <div class="px-3 md:w-1/3">
                  <div class="w-full mx-auto rounded-lg shadow-md bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                      <div class="w-full flex mb-4 items-center">
                          <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                              <img src="https://i.pravatar.cc/100?img=1" alt="">
                          </div>
                          <div class="flex-grow pl-3">
                              <h6 class="font-bold text-sm uppercase text-gray-600">Kenzie Edgar.</h6>
                          </div>
                      </div>
                      <div class="w-full">
                          <p class="text-sm leading-tight"><span class="text-lg leading-none italic font-bold text-gray-800 mr-1">"Love Your Stuff, the quality has been incredible year after year. I tell everyone i Know that they have to try reading Python And C++."</span></p>
                      </div>
                  </div>
                  <div class="w-full mx-auto rounded-lg shadow-md bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                      <div class="w-full flex mb-4 items-center">
                          <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                              <img src="https://i.pravatar.cc/100?img=2" alt="">
                          </div>
                          <div class="flex-grow pl-3">
                              <h6 class="font-bold text-sm uppercase text-gray-600">Stevie Tifft.</h6>
                          </div>
                      </div>
                      <div class="w-full">
                          <p class="text-sm leading-tight"><span class="text-lg leading-none italic font-bold text-gray-800 mr-1">"You Guys Were so helpful. The Books are really good to read. The source you given is the Best."</span></p>
                      </div>
                  </div>
              </div>
              <div class="px-3 md:w-1/3">
                  <div class="w-full mx-auto rounded-lg shadow-md bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                      <div class="w-full flex mb-4 items-center">
                          <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                              <img src="https://i.pravatar.cc/100?img=3" alt="">
                          </div>
                          <div class="flex-grow pl-3">
                              <h6 class="font-bold text-sm uppercase text-gray-600">Tommie Ewart.</h6>
                          </div>
                      </div>
                      <div class="w-full">
                          <p class="text-sm leading-tight"><span class="text-lg leading-none italic font-bold text-gray-800 mr-1">"You Guys Rocked on the Design. I love the design you made and the effort behind it."</span></p>
                      </div>
                  </div>
                  <div class="w-full mx-auto rounded-lg shadow-md bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                      <div class="w-full flex mb-4 items-center">
                          <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                              <img src="https://i.pravatar.cc/100?img=4" alt="">
                          </div>
                          <div class="flex-grow pl-3">
                              <h6 class="font-bold text-sm uppercase text-gray-600">Charlie Howse.</h6>
                          </div>
                      </div>
                      <div class="w-full">
                          <p class="text-sm leading-tight"><span class="text-lg leading-none italic font-bold text-gray-800 mr-1">"We Developed a great partnership with Profdogie and their dedication to our queries are well answered. i appreciate your effort towards clients."</span></p>
                      </div>
                  </div>
              </div>
              <div class="px-3 md:w-1/3">
                  <div class="w-full mx-auto rounded-lg shadow-md bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                      <div class="w-full flex mb-4 items-center">
                          <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                              <img src="https://i.pravatar.cc/100?img=5" alt="">
                          </div>
                          <div class="flex-grow pl-3">
                              <h6 class="font-bold text-sm uppercase text-gray-600">Nevada Herbertson.</h6>
                          </div>
                      </div>
                      <div class="w-full">
                          <p class="text-sm leading-tight"><span class="text-lg leading-none italic font-bold text-gray-800 mr-1">"I just wanted to share a quick note and let you know that. Now it’s almost like having a designer right here with me. I just choose the page to read, make my time effective. It’s so simple.

Thanks, guys!"</span></p>
                      </div>
                  </div>
                  <div class="w-full mx-auto rounded-lg shadow-md bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                      <div class="w-full flex mb-4 items-center">
                          <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                              <img src="https://i.pravatar.cc/100?img=6" alt="">
                          </div>
                          <div class="flex-grow pl-3">
                              <h6 class="font-bold text-sm uppercase text-gray-600">Kris Stanton.</h6>
                          </div>
                      </div>
                      <div class="w-full">
                          <p class="text-sm leading-tight"><span class="text-lg leading-none italic font-bold text-gray-800 mr-1">"After using Profdogie, i feel great to buy their products bcz its quality of content makes them Special."</span></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
</div>



<!-- footer -->

<div class="flex flex-wrap justify-center bg-purple-700 p-6">
  <div class="flex flex-wrap mb-4 w-full">
    <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 ">
      <h3 class="text-3xl py-4">About Us</h3>
      <p>Profdogie is a materialistic Design based website designed to provide best e-source for learning.
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