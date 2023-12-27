<style>
 
</style> 
<?php
  
?>
<div class="subContent" >
		 <?php if(!empty($this->session->flashdata('edu-msg'))){?>
		   <div class="col-lg-12 col-md-12 col-sm-12">
			  <div class="alert alert-success">
				 <?php echo $this->session->flashdata('edu-msg');?>
			  </div>
		   </div> <?php } ?>
         <div class="subcontentTitle"> 
            Employee Certificate & Verification
            <div class="btnalign">  <a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">Back</a>	 </div>
         </div> 
<form name="emp_verification_form" action="<?php echo base_url('add_emp_verification_det');?>" id="emp_verification_form" role="form" method="post" action="" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="id" name='employee_id' placeholder="Title"  value="<?php echo$empdata[0]["id"];?>" hidden>
 
         <div class="subContentbody">
          			 <div class="row">
    					 	<div class="col-sm-3">
        					    <div class="form-group">
                                                  <label class="control-label" for="">Police Verification</label>
                                              		<div>
                                                   	<input  type="radio" id="po_y" name="policeVerif" value="1" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['policeVerif']==1 ? 'checked' : '' ?> required>
                                                      <label for="html">Yes</label>
                                                     	 <input  type="radio" id="po_n" name="policeVerif" value="0" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['policeVerif']==0 ? 'checked' : '' ?>>
                                                      <label for="css">NO</label>
                                                  </div>
                                              </div> 
    						 </div>
    						  <div class="col-sm-3 po-cert " style="<?php echo(isset($empverifidata[0])) && $empverifidata[0]['policeVerif']==1 ? 'display:block' : 'display:none'; ?>">
            						 <div class="form-group">
            							<label class="control-label">Certificate issue Dates </label>
            							<input type="date"  class="form-control" name="police_certi_date"  value=<?php echo $empverifidata[0]['police_certi_date'];?>>							   
            							
            						 </div>
            					</div>	
            					
            			</div>		
            						 
            			<div class="row">
            				 <div class="col-sm-3 ">
        					    <div class="form-group ">
                                                  <label class="control-label" for="">Medical Certificate</label>
                                              		<div>
                                                   	<input  type="radio"  name="medicalVerif" id='medVerif_y' value="1" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['medicalVerif']==1 ? 'checked' : '' ?> required>
                                                      <label for="html">Yes</label>
                                                      <input  type="radio"  name="medicalVerif" id="medVerif_n" value="0" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['medicalVerif']==0 ? 'checked' : '' ?> >
                                                      <label for="css">NO</label>
                                                  	</div>
                                  </div> 
    						 </div>
    					
            				 <div class="col-sm-3 med-cert" style="<?php echo(isset($empverifidata[0])) && $empverifidata[0]['medicalVerif']==1 ? 'display:block' : 'display:none'; ?>">
            						 <div class="form-group">
            							<label class="control-label">Certificate issue Date </label>
            							<input type="date"  class="form-control" name="medical_certi_date" value=<?php echo $empverifidata[0]['medical_certi_date'];?>>							   
            							
            						 </div>
            					</div>	
    						
	                      </div>				
        			<div class="row">
                			<div class="col-sm-3" >
        					    	<div class="form-group">
                                         <label class="control-label" for="mscitVerif">MS-CIT Certificate</label>
                                              	<div>
                                                   	<input  type="radio" id="msCit_y" name="mscitVerif" value="1" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['mscitVerif']==1 ? 'checked' : '' ?> required>
                                                      <label for="html">Yes</label>
                                                      <input  type="radio" id="msCit_n" name="mscitVerif" value="0" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['mscitVerif']==0 ? 'checked' : '' ?>>
                                                      <label for="css">NO</label>
                                                </div>
                                      </div> 
    						 </div>
    						  <div class="col-sm-3 msCit" style="<?php echo(isset($empverifidata[0])) && $empverifidata[0]['mscitVerif']==1 ? 'display:block' : 'display:none'; ?>">
            						 <div class="form-group  ">
            							<label class="control-label">Certificate issue Date </label>
            							<input type="date" placeholder="Enter Certificate Number" class="form-control" name="mscit_issue_date" value=<?php echo $empverifidata[0]['mscit_issue_date'];?>>							   
            							
            						 </div>
            					</div>	
                				<div class="col-sm-3 msCit " style="<?php echo(isset($empverifidata[0])) && $empverifidata[0]['mscitVerif']==1 ? 'display:block' : 'display:none'; ?>">
                						  <div class="form-group  ">
                							<label class="control-label" for="">Exemption Letter Date</label>
                							<input type="date"  class="form-control" name="mscit_excemp_date"  value=<?php echo $empverifidata[0]['mscit_excemp_date'];?>>
                						 </div>
                				</div>
                </div>
                <div class="row">
                			<div class="col-sm-3">
        					    	<div class="form-group">
                                         <label class="control-label" for="langExemp">Marathi/Hindi Exemption Certificate</label>
                                              	<div>
                                                   	<input  type="radio" id="exemp_y" name="langExemp" value="1" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['langExemp']==1 ? 'checked' : '' ?>>
                                                      <label for="html">Yes</label>
                                                      <input  type="radio" id="exemp_n" name="langExemp" value="0" <?php echo (isset($empverifidata[0])) && $empverifidata[0]['langExemp']==0 ? 'checked' : '' ?>>
                                                      <label for="css">NO</label>
                                                </div>
                                      </div> 
    						 </div>
							 <div class="col-sm-3 langExemp" style="<?php echo(isset($empverifidata[0])) && $empverifidata[0]['langExemp']==1 ? 'display:block' : 'display:none'; ?>">
								 <div class="form-group">
									<label class="control-label">Certificate issue Date </label>
									<input type="date" class="form-control" name="langExempDate"  value=<?php echo $empverifidata[0]['langExempDate'];?>>							   
									
								 </div>
							</div>	
                				
                </div>
		</div>
			<?php if(isset($empverifidata[0])){ ?>
				
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="update">Update</button></center> 
					<?php }else{ ?>
			<center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="add">Submit</button></center>
				<?php } ?>
      </div>
   </form>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
 <script>
         $("#po_y").click(function(){
        
         		$(".po-cert").css("display","block")
        	 });
         $("#po_n").click(function(){
         		$(".po-cert").css("display","none")
        	 });
          $("#medVerif_y").click(function(){
        
         		$(".med-cert").css("display","block")
         	});
         $("#medVerif_n").click(function(){
         		$(".med-cert").css("display","none")
         	});
         $("#msCit_y").click(function(){
        
         		$(".msCit").css("display","block")
        	 });
         $("#msCit_n").click(function(){
         		$(".msCit").css("display","none")
        	 });
         $("#exemp_y").click(function(){
        		$(".langExemp").css("display","block")
        	 });
         $("#exemp_n").click(function(){
         		$(".langExemp").css("display","none")
        	 });
  
 </script>  
   
   
   
   