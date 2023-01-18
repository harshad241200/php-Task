<?php
$conn=mysqli_connect("localhost", "root","","harshadp");
if(isset($_POST["import"])){
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"]>0)
    
     {
        $file=fopen($filename, "r");
        while(($column=fgetcsv($file, '100000', ",")) !==FALSE){
            $sql="INSERT INTO `csv`(`name`,`lname`,`email`,`contact` ,`age`, `location`) values('".$column[0]."',  '".$column[1]."' ,  '".$column[2]."' ,  '".$column[3]."' ,  '".$column[4]."' ,  '".$column[5]."')";
            $result=mysqli_query($conn, $sql);

            if(!empty($result)){
                echo "CSV data imported in database";
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
 
    <div>
<label>Choose CSV file</label>
<input type="file" name="file" accept=".csv">
<button type="submit" name="import">import</button>
  </div>

    </form> 
    <?php 
    $sqlSelect="SELECT * from csv ";
    $result=mysqli_query($conn, $sqlSelect);
    // (mysqli_num_rows($result)>0)
        ?>
        <table>
            <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Lname</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Age</th>
                    <th>Location</th>
                </tr>
            </thead>
            <?php 
            while($row=mysqli_fetch_array($result)){
                ?>
                <tbody>
                    <tr>
                        <td> <?php echo $row['id'];?> </td>
                        <td> <?php echo $row['name'];?> </td>
                        <td> <?php echo $row['lname'];?> </td>
                        <td> <?php echo $row['email'];?> </td>
                        <td> <?php echo $row['contact'];?> </td>
                        <td> <?php echo $row['age'];?> </td>
                        <td> <?php echo $row['location'];?> </td>
                    </tr>
                </tbody>
                <?php }?>
        
        </table>
    
    
</body>
</html>

