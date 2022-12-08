
<?php
$smtp1="SELECT status,status_name FROM vertage_statuses where selectable='Y'  ";
             $res1=mysqli_query($conn,$smtp1);
             $html='';
             while($row1=mysqli_fetch_array($res1)){
                 $dail_dispo[$row1[0]]=$row1['status'];
                }
?>

<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header> Voice Campaign Invoices</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">voice</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage voice Data</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="table-scrollable">
                     <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                                 -->
                               <table  class="display table datatable-example">
              <thead>
                <tr>
                  <th>Camp id</th>
                   <th>User</th>
                  <th>Msg</th>
                 
                  <th>Info</th>   
                  <th>  Refund</th>    
                  <th>Credits</th>
                  <th>Schedule</th>
                  <th>Status</th>
                   <?php
                      foreach ($dail_dispo as $key => $value) {
                        echo "<th>".$key."</th>";
                      }
             
                   ?> 
                   <th>Action</th>
                </tr>
              </thead>
               
              <tbody>
               <?php   


                 $smtp="SELECT count(lead_id) as Total,list_id,Duration,sum(amount)as amount,redu,palus_rate,No_of_Pulse,entry_date,user_id,entry_date FROM vertage_list  where 1 group by list_id order by entry_date";
            $res=mysqli_query($conn,$smtp);
           while($row=mysqli_fetch_array($res)){  
              $list_id=$row['list_id'];
              $audio_file_id=$row['audio_file_id']; 
              $Duration=$row['Duration']; 
               $status=$row['status']; 
             
                ?>
                <tr>
                  <td><?php echo $row['list_id']; ?></td>
                  <td><?php echo $row['list_id']; ?></td>
                   <td><?php echo audio_file_name("audio_store_details","audio_ext","id='".$audio_file_id."'",$conn) ?><br/><b>Duration : <?php echo $Duration; ?></b></td>
                  <td><i class="sidebar-item-icon fa fa-th-large"></i></td>
                  <td><i class="sidebar-item-icon fa fa-th-large"></i></td>
                  <td>  <span> Total Contacts:<?php echo $row['Total']; ?> </span><br/> <span>Credit Used: 4 </span> </td>
                  <td><?php echo date('Y-M-d',strtotime($row['entry_date'])); ?><br/><?php echo date('H:i:s A',strtotime($row['entry_date'])); ?></td>
                  <td><span><?php if($status=='NEW'){echo 'Inprocess';}else{ echo 'complate';}?></span></td>
                  <?php 
                      foreach ($dail_dispo as $key => $value) {
                         $smtp1="SELECT  vertage_statuses FROM lucky_log where list_id='$list_id' and dial_status='$value'";
                         $res1=mysqli_query($conn,$smtp1);
                         $count=mysqli_num_rows($res1);
                         echo "<td>".$count."</td>";

                      }
                  ?>
                   
                </tr>
            <?php } ?>
              </tbody>
            </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         
         </div>
      </div>
   </div>
</div>
 