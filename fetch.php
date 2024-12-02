<?php
    include_once("connection.php");
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
    <table>
        <tr>
            <th>sports_id</th>
            <th>sports_name</th>
            <th>college_name</th>
            <th>sports_location</th>
            <th>sports_date</th>
            <th>1st_prize</th>
            <th>2nd_prize</th>
            <th>3rd_prize</th>
        </tr>
    <?php
        if($num > 0):
            while($result = $stmnt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $result['sports_id'];?></td>
                        <td><?php echo $result['sports_name'];?></td>
                        <td><?php echo $result['college_name'];?></td>
                        <td><?php echo $result['sports_location'];?></td>
                        <td><?php echo $result['sports_date'];?></td>
                        <td><?php echo $result['1st_prize'];?></td>
                        <td><?php echo $result['2nd_prize'];?></td>
                        <td><?php echo $result['3rd_prize'];?></td>
                    </tr>
            <?php endwhile ?>
        <?php endif ?>
            
       
        </table>
</body>
</html>
        
