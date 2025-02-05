<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Blogs</title>

</head>

<body>
    <!-- blogs section starts  -->

    <section class="blogs" id="blogs" style="margin-top: 10em;">

        <h1 class="heading"> our <span>blogs</span> </h1>

        <div class="box-container">
            <?php

            $sql = "select * from tbl_blog";
            $kq = mysqli_query($kn, $sql);
            if (!$kq) {
                echo 'Lỗi truy vấn';
            }

            while ($row = mysqli_fetch_array($kq)) {
            ?>

                <div class="box">
                    <div class="image">
                        <img src="images/<?php echo $row['pictures'] ?>">
                    </div>
                    <div class="content">
                        <a href="#" class="title"><?php echo $row['name'] ?></a>
                        <span><td><?php echo date('d - m - Y', strtotime($row['created_at'])) ?></td></span>
                        <p style="text-transform: none; text-align: justify;"><?php echo $row['content'] ?></p>
                        <a href="#" class="btn">Đọc thêm</a>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </section>

    <!-- blogs section ends -->

</body>

</html>