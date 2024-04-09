<?php
function showbanggiacapmahd($id){
    $sql = "SELECT * FROM banggiabacdien WHERE mahd=?";
    return pdo_query($sql, $id);
}

?>