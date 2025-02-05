<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Về chúng tôi</title>

</head>

<body>
    <!-- contact section starts  -->

    <section class="contact" id="contact" style="margin-top: 10em;">

        <h1 class="heading"> <span>Liên hệ với</span> chúng tôi </h1>

        <div class="row">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476799.8647812248!2d105.65400699549845!3d20.992679463777606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1658455255963!5m2!1svi!2s" width="580" height="540" style="border:0; margin-top: 2em; margin-left: 2em;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="/cafena/actions/add_phanhoi.php" method="POST">
                <h3>liên hệ ngay</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" name="fullname" placeholder="Tên đầy đủ">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" name="email" placeholder="Email">
                </div>

                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="text" name="title" placeholder="Tiêu đề">
                </div>

                <div class="inputBox">
                    <span class="fas fa-comment"></span>
                    <textarea style="text-transform: none;" name="message" placeholder="Nội dung"></textarea>
                </div>

                <button class="btn" name="themphanhoi" style="text-transform: none;" onclick="return Add()"><i class="fa-solid fa-paper-plane"></i> Gửi phản hồi</button>

            </form>

        </div>

    </section>

    <!-- contact section ends -->

    <script>
        function Add(){
            alert("Gửi phản hồi thành công!");
        }
    </script>

</body>

</html>