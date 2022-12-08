<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>My Phone Book</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddSMSPhonebookGroup_model">
            Add List
            </button>     
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Contact</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Phone Book</a>
               </li>
            </ol>
         </div>
        <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-sm-12">
                        <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                           -->
                        <table class="table table-striped" id="example4">
                           <thead>
                              <tr role="row">
                                 <th>List Id</th>
                                 <th>List Name</th>
                                 <th>List Descreption </th>
                                 <th> Status </th>
                                 <th> Action </th>
                              </tr>
                           </thead>
                           <tbody id="fetch_sms_phonebook_group">
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

<div class="modal fade" id="AddSMSPhonebookGroup_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Add List</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
                  	<div class="card card-box">
                     	<form action="" method="post" id="add_sms_phonebook_group">
                           	<div class="row">
                              	<div class="col-md-12">
                                	<div class="form-group row">
	                                    <label for="group_name" class="col-sm-4 control-label">List Name</label>
	                                    <div class="col-sm-8">
	                                       <input type="text" class="form-control" id="group_name" name="group_name" required="">
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12">
                                	<div class="form-group row">
	                                    <label for="group_descreption" class="col-sm-4 control-label">List Descreption</label>
	                                    <div class="col-sm-8">
	                                       <input type="text" class="form-control" id="group_descreption" name="group_descreption">
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12">
                                	<div class="form-group row">
	                                    <label for="active" class="col-sm-4 control-label">Active</label>
	                                    <div class="col-sm-8">
	                                       <select class="form-control"  name="active">
	                                          <option value="Y">Y</option>
	                                          <option value="N">N</option>
	                                       </select>
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12 text-center pt-3 pb-2">
                                	<button type="submit" class="btn btn-primary">Save</button>    
                              	</div>
                           	</div>
                  		</form>
                  	</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="ModifySMSPhonebookGroup_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Modify List</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
                  	<div class="card card-box">
                     	<form action="" method="post" id="modify_sms_phonebook_group">
                           	<div class="row">
                           		<input type="hidden" name="group_id" id="edit_group_id" value="">
                              	<div class="col-md-12">
                                	<div class="form-group row">
	                                    <label for="group_name" class="col-sm-4 control-label">List Name</label>
	                                    <div class="col-sm-8">
	                                       <input type="text" class="form-control" id="edit_group_name" readonly>
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12">
                                	<div class="form-group row">
	                                    <label for="group_descreption" class="col-sm-4 control-label">List Descreption</label>
	                                    <div class="col-sm-8">
	                                       <input type="text" class="form-control" id="edit_group_descreption" name="group_descreption">
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12">
                                	<div class="form-group row">
	                                    <label for="active" class="col-sm-4 control-label">Active</label>
	                                    <div class="col-sm-8">
	                                       <select class="form-control"   id="edit_active" name="active">
	                                          <option value="Y">Y</option>
	                                          <option value="N">N</option>
	                                       </select>
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12 text-center pt-3 pb-2">
                                	<button type="submit" class="btn btn-primary">Save</button>    
                              	</div>
                           	</div>
                  		</form>
                  	</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

