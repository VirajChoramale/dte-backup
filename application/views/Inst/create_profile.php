<div class="subContent" >
         <div class="subcontentTitle">
            Employee Details
         </div>
      <form name="institute_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url('add_inst_vacency_details');?>" enctype="multipart/form-data">
         <div class="subContentbody">
          			 <div class="row">
    					 	<div class="col-sm-4">
        					     <div class="form-group required">
        							<label class="control-label">Enter Sevarth no.</label>
        							<input type="number" placeholder="Enter Sevarth No." class="form-control" name="senction_post" id="senction_post" required >						
        						 </div>
    						 </div>
    						  <div class="col-sm-2">
            						 <div class="form-group required">
            								<label class="control-label">Select Title</label>
                    							<select class="form-control" name="inst" id="inst" required onchange="getlevel(this)">
                    								<option value="Mr">Mr</option>
                    								<option value="Ms">Mrs</option>
                    								<option value="other">other</option>
                    							    
                    							</select>
            						 </div>	
            						 </div>	
            						  <div class="col-sm-6">			
            						 <div class="form-group  required">
            							<label class="control-label">Full Name </label>
            							<input type="text" placeholder="Enter Full Name" class="form-control" name="senction_post" id="senction_post" required >							   
            							</select>
            						 </div>
            						 </div>
    						 </div>
					
        						 <div class="row">
                					 <div class="col-sm-6">
                						 <div class="form-group required">
                							<label class="control-label">Gender</label>
                							<select class="form-control" name="inst" id="inst" required onchange="getlevel(this)">
                								<option value="Male">Male</option>
                								<option value="Female">Female</option>
                							    
                							</select>
                						 </div>
                						 </div>
                						  <div class="col-sm-6">
                						  <div class="form-group  required">
                							<label class="control-label" for='dob'>Date of Birth</label>
                							<input class="form-control" placeholder="Enter DOB" type="date" id="dob" name="dob">
                						 </div>
                						 </div>
        						 </div>
						 	 <div class="row">
                					 <div class="col-sm-6">
                						  <div class="form-group  required">
                							<label class="control-label">Email</label>
                							<input type="email" class="form-control" name="senction_post" id="email" required>
                						 </div>
                						 
                                     </div>
                                  <div class="col-sm-6">					
        						 	 <div class="form-group required">
                							<label class="control-label">Contact Number</label>
                							<input type="email" class="form-control" name="senction_post" id="email" required>
						 			</div>
					 			</div>
							</div>
				<center>	
				<button class="btn btn-primary send_password text-center" type="submit" name="send_password" >Submit</button></center>
            </div>

         </div>
         </form>
      <br><br>
      	<div class="table table-responsive">
			<table class="table table-hover table-striped table-bordered" id="ps_table" width="100%">
				<thead>	
				   <tr class="header">
					  <th >Sr.No</th>
					   
					  <th >Employee Name</th>
					  <th >Sevarth No.</th>
					  <th >Designation</th>
					  <th >Action</th>
					  
					  
				   </tr>
				</thead>
				
				<tbody>
				<tr>
				<td>1</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td><button class="btn btn-primary">ADD Details</button></td>
				</tr>
				</tbody>
			 </table>
	   </div>


 
