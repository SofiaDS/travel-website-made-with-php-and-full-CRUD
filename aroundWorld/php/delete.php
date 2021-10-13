<?php
require('connection.php');
//DELETE
$id = intval($_POST['id']);
$sqlD="DELETE from trips WHERE id=$id"; 
$queryD = $db->prepare($sqlD);
if($queryD->execute()){
    echo'<script>
    window.location.href = "admin.php" ;
    </script>';
    
}else{
    echo('not success');
}?>