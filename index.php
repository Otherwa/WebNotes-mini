<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebNotes</title>
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body></body>
<div class="body">
    <!-- Header Section -->
    <div class="d-flex flex-column">
        <div class="col-12">
            <?php include_once('./layout/components/header/user/header.php'); ?>
        </div>

        <!-- Body Content Section -->
        <!-- Your page content goes here -->
        <?php include_once('./layout/components/sidebar/index/sidebar.php'); ?>

        <!-- hero page -->
        <div class="jumbotron jumbotron-fluid p-5 bg-dark jumbotron-cus">
            <div class="jumborton-content p-4">
                <div class="container pt-5 text-white">
                    <p class="display-4 jumbotron-cust-p pt-5">Your Lowkey Gateway <br> to Web Development</p>
                    <p class="text-white font-monospace">Explore the world of HTML, CSS, Bootstrap, and PHP
                        <br> with our comprehensive resources and tutorials.
                    </p>
                </div>
                <div class="imgs">
                    <img class="jumbotron-img-1" src="./public/imgs/marin.jpeg" alt="Image" class="jumbotron-image">
                    <img class="jumbotron-img-2" src="./public/imgs/html.jpeg" alt="Image" class="jumbotron-image">
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <?php include_once('./layout/components/footer.php'); ?>
    </div>
</div>
</body>
<!-- Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<!-- Scroll Reveal -->
<script type="text/javascript" src="https://unpkg.com/scrollreveal"></script>
<script type="text/javascript" src="./public/js/index.js"></script>

</html>