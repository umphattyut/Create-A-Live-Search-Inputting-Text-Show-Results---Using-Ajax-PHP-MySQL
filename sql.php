<?php
require 'db.php';
$output = '';
if(isset($_POST["searchName"])){
    $get_name = $_POST["searchName"];
    $sql = "SELECT * FROM `users` WHERE `fName` LIKE '%$get_name%' OR `lName` LIKE '%$get_name%'";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $output .= '
            <tr>
                <td id="">'.$row['id'].'</td>
                <td>'.$row['fName'].'</td>
                <td>'.$row['lName'].'</td>
                <td>'.$row['createdDate'].'</td>
            </tr>';
        }
    }
    else{
        $output .= '<div>No results found</div>';
    }
    ?>
<table id="Table2" class="table" border="1" cellpadding="0" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>ID</th> 
            <th>First Name</th> 
            <th>Last Name</th> 
            <th>Created Date</th>
        </tr>
    <thead>
    <tbody>
    <?php
    echo $output;
    ?>
    </tbody>
</table>
<?php
}
$mysqli->close();
?>