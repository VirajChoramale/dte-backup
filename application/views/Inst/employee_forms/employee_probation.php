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
            Employee Probation Details
              <div class="btnalign">  <a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">Back</a>	 </div>
         </div>
<form name="emp_probation_form" action="<?php echo base_url('add_emp_probation_det');?>" id="emp_probation_form" role="form" method="post"  enctype="multipart/form-data">
<input type="hidden" class="form-control" id="id" name='employee_id' placeholder="Title"  value="<?php echo $empdata[0]["id"];?>" hidden>  
<input type="hidden" class="form-control"  name='created_at'   value="<?php echo $datetime;?>" hidden> 
       <div class="subContentbody">
          			 <div class="row">
    					 	<div class="col-sm-3">
        					    <div class="form-group  required">
                                                  <label class="control-label" for="">Employee on Probation?</label>
                                              		<div>
                                                   	<input  type="radio" id="prob_y" name="is_probation" value="1" <?php echo (isset($empprobdata[0])) && $empprobdata[0]['is_probation']==1 ? 'checked' : '' ?> required>
                                                      <label for="html">Yes</label>
                                                      <input  type="radio" id="prob_n" name="is_probation" value="0" <?php echo (isset($empprobdata[0])) && $empprobdata[0]['is_probation']==0 ? 'checked' : '' ?> >
                                                      <label for="css">NO</label>
                                                  </div>
                                              </div> 
    						 </div>
    						  <div class="col-sm-3 prob " style="<?php echo(isset($empprobdata[0])) && $empprobdata[0]['is_probation']==1 ? 'display:block' : 'display:none'; ?>">
            						 <div class="form-group  required">
            							<label class="control-label">Probation completion Date </label>
            							<input type="date"  class="form-control" name="prob_compl_date" value=<?php echo $empprobdata[0]['prob_compl_date'];?> >							   
            							
            						 </div>
            					</div>
            					<div class="col-sm-3 prob" style="<?php echo(isset($empprobdata[0])) && $empprobdata[0]['is_probation']==1 ? 'display:block' : 'display:none'; ?>">
            						 <div class="form-group  required">
            							<label class="control-label">Govt Letter Number </label>
            							<input type="text"  class="form-control" name="gov_cert_num"   maxLength="20" value=<?php echo $empprobdata[0]['gov_cert_num'];?> >							   
            							
            						 </div>
            					</div>	
            					<div class="col-sm-3 prob" style="<?php echo(isset($empprobdata[0])) && $empprobdata[0]['is_probation']==1 ? 'display:block' : 'display:none'; ?>">
            						 <div class="form-group  required">
            							<label class="control-label">Govt Letter date </label>
            							<input type="date"  class="form-control" name="gov_letter_date" value=<?php echo $empprobdata[0]['gov_letter_date'];?>>							   
            						  </div>
            					</div>	 
            			</div>		 
                
		</div>
			 <?php if(isset($empprobdata[0])){ ?>
				
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="update">Update</button></center> 
					<?php }else{ ?>
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="add">Submit</button></center>
				<?php } ?> 
      </div>
   </form>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
 <script>
         $("#prob_y").click(function(){
        
         		$(".prob").css("display","block")
         		$(".form-control").prop("required",true);
        	 });
         $("#prob_n").click(function(){
         		$(".prob").css("display","none")
         		$(".form-control").prop("required",false);
        	 });
          
 
 
 
 
 
 </script>  
   
   
   
   