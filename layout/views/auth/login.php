<?php
require_once("../../../config/dbCon.php");
session_start();



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and escape user input from the form
    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    if ($connection) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        echo $query;
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            // Verify the   
            print_r($user);
            $pass = $user['password'];
            if ($pass == $user['password']) {
                // Successful login
                $_SESSION['user_id'] = $user['id'];
                header("Location: ./dashboard.php"); 
                exit;
            }
        }

        // If the username or password is invalid
        $error_message = "Invalid username or password. Please try again.";
    } else {
        $error_message = "Database connection error. Please try again later.";
    }

    $DB->closeConnection();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://0therwa.web.app/imgs/favicon.ico">
    <title>WebNote-Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.css"
        integrity="sha512-/S+MqXMTR8S7bZjjPgdyKms8X5zQcJ9uMzRmw28A6o3drTqZhk7sgIwEvebMkzdLjBdGF6LkPXtZ/CPR8XYzeQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>

<body>
    <div class="container-fluid d-flex flex-column  justify-content-center align-items-center"
        style="min-height: 100vh;">
        <!--header -->
        <div class="col-12">
            <?php include_once('../../components/header/admin_login/header.php'); ?>
        </div>
        <!-- login-modal -->
        <div class="w-50 font-monospace border-2 rounded-2 p-4">
            <div>
                <h2 class="display-6">Login</h2>
                <img src="https://i.pinimg.com/originals/80/7b/5c/807b5c4b02e765bb4930b7c66662ef4b.gif" alt="hello"
                    style="width:60px;height:auto">
                <br>
                <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Username</label>
                        <input type="username" id="username" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="admin" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password (admin)</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>