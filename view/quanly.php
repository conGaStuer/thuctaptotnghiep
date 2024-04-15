<?php
if (isset($_SESSION['id_nv'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý điện</title>
        <link rel="stylesheet" href="../css/quanly.css"> <!-- Thêm đường dẫn đến tệp CSS mới -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="container">
            <b>Xin chào, <?php echo $_SESSION['name'] ?> </b>
            <button class="logout"><a href="../controller/tiendien.php?act=logout">Đăng xuất</a></button>
            <h2>MÀN HÌNH QUẢN LÝ <i class="fa-solid fa-gear"></i> </h2>
            <div class="control">
                <button class="button"><a href="../controller/tiendien.php?act=quanlydien">

                        <img src="../assets/admin.webp" alt="">
                        <div class="manage">
                            <i class="fa-solid fa-clipboard-user"></i>
                            <span>Quản lý điện</span>
                        </div>

                    </a></button>
                <button class="button"><a href="../controller/tracuu.php?act=tracuu">

                        <img src="../assets/admin.webp" alt="">
                        <div class="manage">
                            <i class="fa-solid fa-clipboard-user"></i>
                            <span>Tra cứu</span>
                        </div>

                    </a></button>
            </div>


        </div>
    </body>

    </html>
<?php } else {
    header('location: ../controller/tiendien.php?act=login');
} ?>