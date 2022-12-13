<?php
session_start();
$username = $_SESSION['s_name'];
$uoid = $_SESSION['userid'];
?>
<?php 
 
 
// Include the database config file 
require_once 'dbconfig.php'; 
 
// Fetch order details from database 
$result = $db->query("SELECT r.*, c.name, c.last_name, c.email, c.phone FROM orders as r INNER JOIN users as c ON c.id = $uoid WHERE customer_id = $uoid"); 
$result_for_jk = $db->query("SELECT id FROM orders WHERE customer_id = $uoid ");
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderSuccess</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />   
    <link rel="stylesheet" href="./testc.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <style>
        

    </style>
    
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
<!-- alert -->
<div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
                            <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                              <span class="text-green-500">
                                <svg fill="currentColor"
                                  viewBox="0 0 20 20"
                                  class="h-6 w-6">
                                  <path fill-rule="evenodd"
                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                      clip-rule="evenodd"></path>
                                </svg>
                              </span>
                            </div>
                            <div class="alert-content ml-4">
                              <div class="alert-title font-semibold text-lg text-green-800">
                                Success
                              </div>
                              <div class="alert-description text-sm text-green-600">
                                Your orders have been placed successfully...!
                              </div>
                            </div>
                          </div>
<!-- alert end -->
<div class="w-full mt-1 ">
                    <p class="text-xl text-gray-700 pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Latest Orders of
                        <?php echo ucwords($username);?>
                    </p>
                    <div class="bg-white overflow-auto rounded-lg shadow-lg">
                      <table class="table-auto border-collapse w-full">
                      <thead class="bg-gray-800 text-white">
                          <tr class="rounded-lg text-sm font-medium text-left" style="font-size: 0.9674rem">
                          <th class="px-4 py-2 ">Product</th>
                          <th class="px-4 py-2 "></th>
                          <th class="px-4 py-2 " >Price</th>
                          <th class="px-4 py-2 " >QTY</th>
                          <th class="px-4 py-2 " >Sub Total</th>                        
                          </tr>
                      </thead>
                      <tbody class="text-sm font-normal text-gray-700">
                          
                      <?php 
                          // Get order items from the database 
                          foreach($result_for_jk as $orderinfo2) {
                          $result_jk = $db->query("SELECT i.*, p.name, p.price ,p.id  FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id WHERE i.order_id = ".$orderinfo2['id']);
                          if($result_jk->num_rows > 0){  
                              while($item = $result_jk->fetch_assoc()){ 
                                  $name = $item["name"];
                                  $price = $item["price"]; 
                                  $quantity = $item["quantity"]; 
                                  $sub_total = ($price*$quantity); 
                                  $imid = $item["id"];
                                  
                              }?>
                              <?php 
                              
                              $res = $db->query("SELECT id,file_name FROM products WHERE id= $imid ");
                              while ($row = mysqli_fetch_assoc($res)) {
                                $imageURL2 = 'admin/uploads/'.$row["file_name"];
                                }?>
                
                              
                              <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                <td class=""><img src="<?php echo $imageURL2; ?>" class="w-20 rounded" alt="Thumbnail"><p class="text-gray-700 text-lg"><?php echo $name; ?></p><td>
                                <td class="px-4 py-4"><?php echo '₹'.$price.' '; ?></td>
                                <td class="px-4 py-4"><?php echo $quantity; ?></td>
                                <td class="px-4 py-4"><?php echo '₹'.$sub_total.' '; ?></td>
                              </tr>
                              <?php } 
                                }?>   
                          </div>
                      </tbody>
                      </table>
                    </div>
                </div>
<style>
  
thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}

tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}


</style>



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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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