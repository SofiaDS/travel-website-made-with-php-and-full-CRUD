    <?php
    require('connection.php');
    $connection = mysqli_connect("localhost","root","","card");
    $id=$_POST['id'];   
    $title=$_POST['title'];
    $descrizione=$_POST['descrizione'];
    $price=$_POST['price'];
    $Immagine=$_FILES['file']['name'];
    $target_dir = "imgCard/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
    {
        $sql="Update `trips` set title='$title',descrizione='$descrizione',price='$price',Immagine='$target_file' where id='".$id."'";
        if(mysqli_query($connection,$sql))
        {
            echo'<script>
            window.location.href = "admin.php" ;
            </script>';
        }
        else 
        {
            echo 'not updated';
        }
    }
    ?>