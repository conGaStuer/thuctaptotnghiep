<?php
    function themcthd($mahd, $madk, $dntt, $dongia){
        $sql = "INSERT INTO cthoadon (mahd,madk,dntt,dongia) VALUES (?, ?, ?,?)";
        pdo_execute($sql, $mahd, $madk, $dntt, $dongia);
    }
    function showhdct($id){
        $sql = "SELECT * FROM cthoadon WHERE mahd=?";
        return pdo_query($sql, $id);
    }
    
?>