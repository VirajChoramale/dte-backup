<style>


</style> 
<?php
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
           Retirement/Superannuation Details
             <div class="btnalign">  <a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">Back</a>	 </div>
         </div>
      <form name="emp_retirement_form" id="emp_retirement_form" role="form" method="post" action="<?php echo base_url('add_emp_retirement_det');?>" enctype="multipart/form-data">
	  <input type="hidden" class="form-control" id="id" name='employee_id' placeholder="Title"  value="<?php echo $empdata[0]["id"];?>" hidden>  
	  <input type="hidden" class="form-control"  name='created_at'   value="<?php echo $datetime;?>" hidden>  
         <div class="subContentbody">
          			 <div class="row">
    					 	
    						  <div class="col-sm-4 po-cert " >
            						 <div class="form-group  required">
            							<label class="control-label">Date Of Retirement(Based on age)</label>
            							<input type="date"  class="form-control" name="retirement_date" required value=<?php echo $empretdata[0]["retirement_date"];?>>							   
            							
            						 </div> 
            					</div>
            					<div class="col-sm-4">
            					     <div class="form-group required">
            							<label class="control-label">Type</label>
											<select class="form-control" name="retirement_type" id="retirement_type" required>
												<option selected disabled>Please select type</option>
												<option <?php echo (isset($empretdata[0])) && $empretdata[0]['retirement_type']=='Retirement' ? 'selected' : ''; ?> value="Retirement">Retirement</option>
												<option <?php echo (isset($empretdata[0])) && $empretdata[0]['retirement_type']=='VRS' ? 'selected' : ''; ?> value="VRS">VRS</option>
												<option <?php echo (isset($empretdata[0])) && $empretdata[0]['retirement_type']=='Death' ? 'selected' : ''; ?> value="Death">Death</option>
											</select>     						 
                        			 </div>
        						 </div>	
        						 <div class="col-sm-4">			
            						 <div class="form-group  ">
            							<label class="control-label">Remarks(if any) </label>
            							<input type="text" placeholder="Enter Remarks" class="form-control" name="remarks"   value=<?php echo $empretdata[0]["remarks"];?>>							   
            							
            						 </div>
            					</div> 
            			</div>	  
		</div>
		  <?php if(isset($empretdata[0])){ ?>
				
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="update">Update</button></center> 
					<?php }else{ ?>
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="add">Submit</button></center>
				<?php } ?> 
            

      </div>
   </form>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
 <script>
        
 
 
 
 </script>  
   
   
   
   