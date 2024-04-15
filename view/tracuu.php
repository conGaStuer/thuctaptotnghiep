<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="../css/tracuu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="sidebar">
        <img src="../assets/user.jpg" alt="User Avatar">
        <a href="#">Quản lý khách hàng</a>
    </div>
    <div class="content">
        <h2>Thông tin khách hàng</h2>
        <!-- Nút Quay lại -->
        <button class="btn"><a href="../controller/tiendien.php?act=quanly">Quay lại</a></button><br>

        <!-- Liên kết điều hướng -->
        <div class="search">
            <button>
                <a href="../controller/tracuu.php?act=tracuukhachhang">Tra cứu khách hàng</a>
            </button>|
            <button>
                <a href="../controller/tracuu.php?act=tracuudienke">Tra cứu điện kế</a>
            </button>|
            <button>
                <a href="../controller/tracuu.php?act=tracuuhoadon">Tra cứu hóa đơn</a>
            </button>
            |
            <button>
                <a href="../controller/theodoino.php?act=theodoino">Theo dõi nợ</a>
            </button>

        </div>

    </div>
</body>

</html>