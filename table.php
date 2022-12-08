<?php 


$sel="SELECT * FROM `vertage_closer_log`"; 

$res= mysqli_query($conn,$sel);

$array=mysqli_fetch_array($res);

$row=mysqli_num_rows($res);

?>
 
<table style="width:100%" >

  <tr>
    <th><input type="checkbox" id="#" ></th>
    <th></th>
    <th>app</th>
    <th>time</th>
    <th>dur</th>
    <th>campaign</th>
    <th>assigned to</th>
    <th>transferred to</th>
    <th>status</td>
    <th>rec</th>
  </tr>


  <tbody>
            <?php
                while($row = mysqli_fetch_assoc($res)){?>
                <tr>
                  <td></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                  <td><?php echo $row["status"]; ?></td>
                <tr>
            <?php }?>
        </tbody>
</table>

                
    
  

