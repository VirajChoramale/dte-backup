<style>


</style>
<?php
$emp_id=$empdata[0]['id'];
//print_r($empdeptdata[0]);
$datetime=date('Y-m-d H:i:s');
 ?>
<div class="subContent" >
		<?php if(!empty($this->session->flashdata('add_empp_msg'))){?>
		   <div class="col-lg-12 col-md-12 col-sm-12">
			  <div class="alert alert-success">
				 <?php echo $this->session->flashdata('add_empp_msg');?>
			  </div>
		   </div> <?php } ?>
         <div class="subcontentTitle">
            Employee Deparmental Enquiry Details
              <div class="btnalign">  <a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">Back</a>	 </div>
         </div>
      <form name="emp_dept_form" id="emp_dept_form" role="form" method="post" action="<?php echo base_url('add_emp_dept_details');?>" enctype="multipart/form-data">
	  <input type="hidden" class="form-control" id="id" name='employee_id'  value="<?php echo $empdata[0]["id"];?>" hidden>  
	   <input type="hidden" class="form-control"  name='created_at'   value="<?php echo $datetime;?>" hidden> 
         <div class="subContentbody">
          			 <div class="row">
    					 	<div class="col-sm-6">
        					    <div class="form-group  required">
									  <label class="control-label" for="">Employee have/has deparmental enquiry ?</label>
										<div>
										<input  type="radio" id="enq_y" name="is_dept_enq" <?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==1 ? 'checked' : ''; ?> value="1" required>
										  <label for="html">Yes</label>
										  <input  type="radio" id="enq_n" name="is_dept_enq" <?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==0 ? 'checked' : ''; ?> value="0">
										  <label for="css">NO</label>
									  </div>
                                 </div> 
    						 </div>
    						  
            			</div>			 
            			<div class="row">
            				 <div class="col-sm-4 depart" style="<?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==1 ? 'display:block' : 'display:none'; ?>"  >
        					    <div class="form-group  required">
                                    <label class="control-label">Reason </label>
            							<input type="text"  class="form-control" name="enq_reason" value="<?php echo $empdeptdata[0]['enq_reason'] ?>" >		                 
                                  </div> 
    						 </div>
    					
            				 <div class="col-sm-4 depart" style="<?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==1 ? 'display:block' : 'display:none'; ?>" >
            						 <div class="form-group  required">
            							<label class="control-label">Enquiry Start Date </label>
            							<input type="date"  class="form-control" name="enq_start_date" value="<?php echo $empdeptdata[0]['enq_start_date']; ?>" >		
            						 </div>
            				</div>	
            					
            				<div class="col-sm-4">
        					     <div class="form-group required depart" style="<?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==1 ? 'display:block' : 'display:none'; ?>" >
        							<label class="control-label">Status of Enquiry</label>
									<select class="form-control " name="enq_status" id="status" >
										<option selected disabled>Please Select</option>
										<option <?php echo $empdeptdata[0]['enq_status']=='Initiated' ? 'selected' : ''; ?> value="initiated">To be Initiated</option>
										<option <?php echo $empdeptdata[0]['enq_status']=='In-Progress' ? 'selected' : ''; ?> value="In-Progress">In-Progress</option>
										<option <?php echo $empdeptdata[0]['enq_status']=='Completed' ? 'selected' : ''; ?> value="Completed">Completed</option>
										
									 </select>     						 
                    			 </div>
    						 </div>
    						
	                      </div>				
        			<div class="row">
                			<div class="col-sm-4 med-cert depart" style="<?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==1 ? 'display:block' : 'display:none'; ?>" >
            						 <div class="form-group  required">
            							<label class="control-label">Final Decision </label>
            							<input type="text"  class="form-control " name="enq_decision"  value="<?php echo $empdeptdata[0]['enq_decision'] ?>">							   
            							
            						 </div>
            				</div>
            				<div class="col-sm-4 depart" style="<?php echo(isset($empdeptdata[0])) && $empdeptdata[0]['is_dept_enq']==1 ? 'display:block' : 'display:none'; ?>" >
            						 <div class="form-group  required">
            							<label class="control-label">Punitive action taken if any </label>
            							<input type="text"  class="form-control" name="enq_action"  value="<?php echo $empdeptdata[0]['enq_action'] ?>">							   
            							
            						 </div>
            				</div>
    						  
                </div>
                 <?php if(isset($empdeptdata[0])){ ?>
				
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="update">Update</button></center> 
					<?php }else{ ?>
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="add">Submit</button></center>
				<?php } ?> 
      </div>
   </form>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
 <script>
         $("#enq_y").click(function(){
        
         		$(".depart").css("display","block")
         		$('.form-control').prop("required",true);
        	 });
         $("#enq_n").click(function(){
         		$(".depart").css("display","none");
         		$('.form-control').prop("required",false);
         		
        	 });
          
 
 
 
 </script>  
   
   
   
   