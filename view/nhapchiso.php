<?php 
    if(isset($_GET['mahd'])){
        echo 'Thêm hóa đơn thành công';
            if($show_hd_add){ ?>
                 <table border="1">
                  <tr>
                      <th>Mã hóa đơn</th>
                      <th>Mã nhân viên</th>
                      <th>Kỳ</th>
                      <th>Từ ngày</th>
                      <th>Đến ngày</th>
                      <th>Chỉ số đầu</th>
                      <th>Chỉ số cuối</th>
                      <th>Tổng thành tiền</th>
                      <th>Ngày lập hóa đơn</th>
                      <th>Tình trạng</th>
                      <th colspan=2>Công cụ</th>
                  </tr>
                  <tr>
                      <td><?php echo $show_hd_add['mahd'] ?></td>
                      <td><?php echo $show_hd_add['manv'] ?></td>
                      <td><?php echo $show_hd_add['ky'] ?></td>
                      <td><?php echo $show_hd_add['tungay'] ?></td>
                      <td><?php echo $show_hd_add['denngay'] ?></td>
                      <td><?php echo  $show_hd_add['chisodau'] ?></td>
                      <td><?php echo $show_hd_add['chisocuoi'] ?></td>
                      <td><?php echo $show_hd_add['tongthanhtien'] ?></td>
                      <td><?php echo $show_hd_add['ngaylaphd'] ?></td>
                      <td><?php if($show_hd_add['tinhtrang'] == 0){ echo 'Chưa thanh toán [Giấy báo điện]';}else{ echo 'Đã thanh toán [Hóa đơn]';} ?></td>
                      <td><?php echo '<a href="../controller/tiendien.php?act=in&mahd='.$show_hd_add['mahd'].'">In giấy báo</a>'; ?> </td>
                      <td> Đã thanh toán</td>
                      </tr>
              </table>

              <button><a href="../controller/tiendien.php?act=quanlydien">Xong</a></button>
    <?php 
    }
              
    }else{
?>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = time();
$mahd = date("ymdHis", $timestamp);
?>
<h2>Giá điện hiện hành[ĐANG ÁP DỤNG]</h2>
    <table>
        <tr>
        <th>Mã Bậc</th>
            <th>Tên Bậc</th>
            <th>Từ số KW</th>
            <th>Đến số KW</th>
            <th>Đơn giá</th>
            <th>Ngày áp dụng</th>
        </tr>
        <?php
        if ($result1) {
            foreach ($result1 as $row) {
                echo "<tr>";
                echo "<td>".$row['mabac']."</td>";

                echo "<td>".$row['tenbac']."</td>";
                echo "<td>".$row['tusokw']."</td>";
                echo "<td>".$row['densokw']."</td>";
                echo "<td>".$row['dongia']."</td>";
                echo "<td>".$row['ngayapdung']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
<h2>Form tính tiền điện</h2>
<form id="secondForm" method="post" action="">
<label for="mahd">Mã hóa đơn:</label>
<input type="text" id="mahd" name="mahd" value="<?php echo $mahd; ?>" readonly><br><br>
    <label for="madk">Mã điện kế:</label>
    <input type="text" name="selected_madk" id="selected_madk" readonly><br><br>

    <label for="tusokw">Từ ngày</label>
    <input type="datetime-local" id="tungay" name="tungay" value="<?php if(isset($ngaylaphd_show)){ echo $ngaylaphd_show;}else{echo isset($_POST['tungay']) ? $_POST['tungay'] : '';} ?>"><br><br>

    <label for="tusokw">Đến ngày</label>
    <input type="datetime-local" id="denngay" name="denngay" value=" <?php echo isset($_POST['denngay']) ? $_POST['denngay'] : ''; ?>"><br><br>
    
    <label for="tusokw">Từ số KW:</label>
    <input type="text" id="tusokw" name="tusokw" value="<?php if(isset($csc_show)){ echo $csc_show;}else{echo isset($_POST['tusokwP']) ? $_POST['tusokwP'] : '';} ?>" required oninput="tinhTongKW()"><br><br>

    <label for="densokw">Đến số KW:</label>
    <input type="text" id="densokw" name="densokw" value="<?php echo isset($_POST['densokwP']) ? $_POST['densokwP'] : ''; ?>" required oninput="tinhTongKW()"><br><br>

    <label for="kq">Điện năng tiêu thụ (KW):</label>
    <input type="text" id="kq" name="kq" value="<?php echo isset($_POST['kq']) ? $_POST['kq'] : ''; ?>" readonly><br><br>

    <label for="dongia">Đơn giá (VNĐ):</label>
    <input type="text" id="dongia" name="dongia" value="<?php echo isset($_POST['dongia']) ? $_POST['dongia'] : ''; ?>" readonly><br><br>

    <label for="tongtien">Tổng tiền (VNĐ):</label>
    <input type="text" id="tongtien" name="tongtien" value="<?php echo isset($_POST['tongtien']) ? $_POST['tongtien'] : ''; ?>" readonly><br><br>

    <?php
    // Lấy dữ liệu từ hàm showGiaHienHanh()
    $result1 = showGiaHienHanh();

    // Kiểm tra xem có dữ liệu không
    if ($result1) {
        foreach ($result1 as $row) {
            echo "<input type='hidden' name='mabac[]' value='".$row['mabac']."' readonly>";
        }
    } else {
        echo "<p>Không có dữ liệu về giá điện hiện hành.</p>";
    }
    ?>
    <input type="submit" name="submit" value="Tính tiền điện">
    <input type="submit" name="addhd" value="Thêm hóa đơn">
</form>

<?php
    }
?>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
     document.getElementById("autoSubmitButton").click();
    });
</script>
<script>
    window.onload = function() {
        var selectedMadk = localStorage.getItem('selected_id_madk');
        var selectedMadkInput = document.getElementById('selected_madk');
        selectedMadkInput.value = selectedMadk;
    };
</script>
