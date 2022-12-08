<div class="modal fade" id="audio_model">
  <input type="hidden" name="hide_audio_id" id="hide_audio_id">
  <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header card-head">
        <h4 class="modal-title ml-2 ">Audio chooser</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
   
        <div class="col-lg-12">
          <div class="card card-box">
           <div class="table-responsive"  style="overflow-y:scroll; overflow-x: none; max-height: 500px;">
            <table class="table table-striped" id="example4">
             <thead>
              <tr role="row">
               <th>
                 File Name
               </th>
               <th> Date</th>
               <th>Size </th>
               <th> Play </th> 

             </tr>
           </thead>
           <tbody  id="fetch_announcement">
            <?php 
            $sql = "SELECT * FROM `audio_store_details` where 1";
            $res = mysqli_query($conn, $sql);
            $rowscount = mysqli_num_rows($res);
            while($row=mysqli_fetch_array($res)){
             $group_id=$row['id'];
             ?>
             <tr class="gradeX odd" role="row"  >
              <td><a href="javascript:void(0);" onclick="audio_chooser('<?php echo $row['audio_filename'];?>')"><?php echo $row['audio_filename'];?></a></td>
               <td><a href="javascript:void(0);"><?php echo $row['audio_format'];?> </a></td>
               <td><a href="javascript:void(0);"><?php echo$row['audio_filesize'];?> </a></td>
               <td> <a  href="../audio/<?php echo ($row['audio_filename'].".".$row['audio_format']);?>" target="_blank"> Play</a> </td> 
             </tr> 
           <?php }?>
         </tbody>
       </table>
     
   </div>
 </div>

</div>
</div>


</div>
</div>
</div>