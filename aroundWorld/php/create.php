
    <?php
    require('connection.php');
    $connection = mysqli_connect("localhost","root","","card");
    $sql ="INSERT INTO trips(Immagine, title, descrizione, price) VALUES(:Immagine,:title,:descrizione,:price)"; 
    
    $query = $db->prepare($sql);

    $Immagine = $_FILES["Immagine"]['name'];
    $title = $_POST["title"];
    $descrizione = $_POST["descrizione"];
    $price = intval($_POST["price"]);
    $target_dir = "imgCard/newTrip/";
    $target_file = $target_dir . basename($_FILES["Immagine"]["name"]);
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["Immagine"]["tmp_name"], $target_file)) 
    //  {
    //      $sql="Insert into `trips` title='$title',descrizione='$descrizione',price='$price',Immagine='$target_file'";
    //      if(mysqli_query($connection,$sql))
    //      {
    //         echo'ce l hai fatta cazzo';
    //      }
    //      else 
    //      {
    //         $status = $query->errorInfo();
    //         print_r($status);
    //      }
    //  }

    $query->bindParam(':Immagine', $target_file, PDO::PARAM_STR);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':descrizione', $descrizione, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_INT);

    if($query->execute()){
        echo'<script>
        window.location.href = "admin.php" ;
        </script>';
        
    } else{
        $status = $query->errorInfo();
        print_r($status);
    }
    ?>