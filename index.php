<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Website</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/blogs.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/coffees.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/dathang.css">
    
</head>

<body>
    <?php
        session_start();
        include("config/connect.php");
        include("views/menu.php");
        include("views/main.php");
        include("views/listsp.php");
        include("views/footer.php");
    ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>