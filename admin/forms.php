<?php
// Include the database configuration file 
include_once 'dbconfig.php'; 
?>
<?php
session_start();
$ausername = $_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { --tw-bg-opacity: 1;
                        background-color: rgba(109, 40, 217, var(--tw-bg-opacity));}
        .cta-btn { --tw-bg-opacity: 1;
                        background-color: rgba(237, 233, 254, var(--tw-bg-opacity)); }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { --tw-bg-opacity: 1;
                            background-color: rgba(167, 139, 250, var(--tw-bg-opacity)); }
        .nav-item:hover { --tw-bg-opacity: 1;
                            background-color: rgba(139, 92, 246, var(--tw-bg-opacity)); }
        .account-link:hover { --tw-bg-opacity: 1;
                            background-color: rgba(139, 92, 246, var(--tw-bg-opacity)); }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="aloggedin.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="forms.html" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Add Product
            </a>
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-purple-200 py-2 px-6 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-purple-400 hover:border-purple-300 focus:border-purple-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Hi,<b><?php echo ucwords($ausername); ?></a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="./aloggedin.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="forms.php" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Add Product
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    Hi,<b><?php echo ucwords($ausername); ?>
                </a>
                <a href="./logout.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col rounded-lg shadow-lg">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Forms</h1>

                <div class="flex flex-wrap">
                    <div class="w-full my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Contact Form
                        </p>
                        <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" action="forms.php" method="post" enctype="multipart/form-data">
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Name</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Product Name" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="email">price</label>
                                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="price" type="text" required="" placeholder="Product Price" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="message">Description</label>
                                    <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="message" name="description" rows="6" required="" placeholder="Product Description" aria-label="Email"></textarea>
                                </div>
                                
                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="message">Select Image Files to Upload:</label>
                                    <input type="file" name="photo" id="fileSelect">
                                    <!-- <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit" name="Upload_button" value="Upload">Upload</button> -->
                                </div>
                                
                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="http://techdogie.k.vu" class="underline">Team Techdogie</a>.
            </footer>
        </div>
        
    </div>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>


<!-- upload-manager -->

<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        //request data
        $uploaded_on = date("Y-m-d H:i:s");
        $name =  $_REQUEST['name'];
        $description =  $_REQUEST['description'];
        $price =  $_REQUEST['price'];
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $filename)){
                echo '<script>alert("$filename .  is already exists.")</script>';
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $filename);
                $insert = $db->query("INSERT INTO products (file_name,name,description,price,uploaded_on) VALUES ('$filename','$name','$description','$price','$uploaded_on')");
                echo '<script>alert("Your file was uploaded successfully.")</script>';
            } 
        } else{
            echo '<script>alert("Error: There was a problem uploading your file. Please try again.")</script>'; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>