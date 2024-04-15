function showDienKe(makh) {
    var dienke_row = document.getElementById('dienke_row_' + makh);
    var button = document.getElementById('button_' + makh);
    if (dienke_row.style.display === 'none') {
        dienke_row.style.display = 'table-row';
        button.innerHTML = 'Đóng';
    } else {
        dienke_row.style.display = 'none';
        button.innerHTML = 'Xem';
    }
}
window.onload = function () {
    var radios = document.getElementsByName('selected_id');
    for (var i = 0; i < radios.length; i++) {
        radios[i].addEventListener('click', function () {
            var madk = this.parentNode.parentNode.cells[0].innerText;
            localStorage.setItem('selected_id_madk', madk);
        });
    }
};
function kiemTraChon() {
    var radios = document.getElementsByName('selected_id');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return true;
            lapHoaDon();
        }
    }
    alert('Vui lòng chọn một điện kế để lập hóa đơn.');
    return false;
}
function lapHoaDon() {
    var selectedMadk = localStorage.getItem('selected_id_madk');
    var xhr = new XMLHttpRequest();
    var form = document.getElementById('hoadon'); // Lấy thẻ form
    var url = form.getAttribute('action'); // Lấy URL từ action của form
    xhr.open('POST', url, true); // Sử dụng URL từ action của form
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    var data = JSON.stringify({
        selected_madk: selectedMadk
    });
    xhr.send(data);
}

