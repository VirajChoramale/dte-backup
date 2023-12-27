<style>
.spouse-header{
   display:inline;

}
</style>
<?php 
$childNo=0;

 
?>
 <div class="subContent" >
         <div class="subcontentTitle">
            Employee Details
               <div class="btnalign">
					<a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">Back</a>	  
			 </div>
<form name="emp_addi_details_form" action="<?php echo base_url('add_emp_additional_det');?>" id="inst_add_form" role="form" method="post"  enctype="multipart/form-data">
  <input type="hidden" class="form-control" id="id" name='empid' placeholder="Title"  value="<?php echo$empdata[0]["id"];?>" hidden>

          <div class="subContentbody">
          			 <div class="row">
							<div class="col-sm-4">					
									 <div class="form-group required">
											<label class="control-label">Employee Status</label>
												<select class="form-control" name="employeeStatus" id="employeeStatus" required> 
													<?php
												foreach($empstatusdata as $Estatus){?>
														<option value="<?php echo $Estatus['id'] ?>" <?php echo (isset($empadditionaddeddata[0])) && $empadditionaddeddata[0]['employeeStatus']==$Estatus['id'] ?'selected':'' ?>><?php echo $Estatus['e_status']; ?> </option> 
										<?php	}
											?>  
												</select>  		 			
									</div>
					 		</div>
    					 	<div class="col-sm-4">
        					     <div class="form-group required">
        							<label class="control-label">Religion</label>
										<select class="form-control" name="religion" id="religion" required>
											<?php
												foreach($religiondata as $reg){?>
														<option value="<?php echo $reg['id'] ?>" <?php echo (isset($empadditionaddeddata[0])) && $empadditionaddeddata[0]['religion']==$reg['id'] ? 'selected' : '' ?>><?php echo $reg['eng_name'].'-'.$reg['hindi_name'] ?> </option> 
										<?php	}
											?> 
										</select>     						 
                    			 </div>
    						 </div>
    						  <div class="col-sm-4">
            						 <div class="form-group required">
            								<label class="control-label">Select Caste</label>
            									<select class="form-control" name="category" id="category" required >
													<?php
												foreach($categorydata as $caste){?>
														<option value="<?php echo $caste['id'] ?>" <?php echo (isset($empadditionaddeddata[0])) && $empadditionaddeddata[0]['category']==$caste['id'] ? 'selected' : ''; ?>><?php echo $caste['eng_name'].'-'.$caste['hindi_name'] ?> </option> 
										<?php	}
											?>  
                    							</select> 
                    							
            						 </div>	
            					</div>	 
    						 </div>
					
        					<div class="row caste_rowclass" style="<?php echo isset($empadditionaddeddata[0]['category']) && $empadditionaddeddata[0]['category']!=1 ? 'display:block':'display:none'?>"   >
									<div class="col-sm-4">			
            						 <div class="form-group">
            							<label class="control-label">Caste Certificate Number</label>
            							<input type="text" placeholder="Enter your Caste certificate number" class="form-control caste_inp_class" name="castCertificateNumber" id="castCertificateNumber"  value="<?php echo $empcategorydata[0]['castCertificateNumber'] ?>">							   
            							
            						 </div>
            					 </div>
                				<div class="col-sm-4">
									 <div class="form-group">
										<label class="control-label">Date of issue of Caste Certificate</label>
										<input type="date"  class="form-control caste_inp_class" name="castCertificateDate" id="castCertificateDate" value="<?php echo $empcategorydata[0]['castCertificateDate'] ?>">
									 </div>
                				</div>
                				<div class="col-sm-4">
									  <div class="form-group">
										<label class="control-label" for='castCertificateAuthority'>Caste Certificate issuing Authority</label>
										<input type="text"  class="form-control caste_inp_class" name="castCertificateAuthority" id="castCertificateAuthority" value="<?php echo $empcategorydata[0]['castCertificateAuthority'] ?>">
									 </div>
                				 </div>
								   
        					 </div>
						 	 <div class="row caste_rowclass" style="<?php echo isset($empadditionaddeddata[0]['category']) && $empadditionaddeddata[0]['category']!=1 ? 'display:block':'display:none'?>" >
									<div class="col-sm-4">
										  <div class="form-group">
											<label class="control-label" for='castValidityNumber'>Caste Validity Certificate Number</label>
											<input type="text"  class="form-control caste_inp_class" name="castValidityNumber" id="castValidityNumber" value="<?php echo $empcategorydata[0]['castValidityNumber'] ?>">
										 </div>
									 </div>
									 <div class="col-sm-4">
										 <div class="form-group">
											<label class="control-label">Date of issue of Caste Validity</label>
											<input type="date"  class="form-control caste_inp_class" name="castValidityDate" id="castValidityDate" value="<?php echo $empcategorydata[0]['castValidityDate'] ?>">
										 </div>
                					</div> 
                					 <div class="col-sm-4">
										  <div class="form-group ">
											<label class="control-label" for='castCertificateAuthority'>Name of Caste Validity Certificate issuing Samiti</label>
											<input type="text"  class="form-control caste_inp_class" name="castValidityAuthority" id="castValidityAuthority" value="<?php echo $empcategorydata[0]['castValidityAuthority'] ?>">
										 </div> 
                                     </div>  
							</div>
							<div class='row'>
									<div class="col-sm-4">					
        						 	 <div class="form-group required">
                							<label class="control-label">Marital Status</label>
												<select class="form-control" name="maritialStatus" id="maritialStatus" required>
                    								 <?php foreach($maritaldata as $marr){ ?>
																<option value="<?php echo $marr['id'] ?>" <?php echo (isset($empadditionaddeddata[0])) && $empadditionaddeddata[0]['maritialStatus']==$marr['id'] ? 'selected' : '' ?>><?php echo $marr['mstatus']; ?>
														 <?php } ?>
                    							 </select>   						 			
                    				</div>
					 			</div>
							</div>
					
                          <div class="row" id="spouse-header" style="<?php echo isset($empadditionaddeddata[0]['maritialStatus']) && $empadditionaddeddata[0]['maritialStatus']==2 ? 'display:block':'display:none'?>"   >
                               <div class="col-sm-4"><label class="control-label add_text">Spouse (Please Fill All Details):</label>  </div>
                                        
                                    <div class="col-sm-8">
                                         <button type="button" class="btn spouse-btn" style="float:right" id="spouse-btn">+</button>
                                    </div>      
                                </div>
						<div class="row spouse-row"  style="<?php echo isset($empadditionaddeddata[0]['maritialStatus']) && $empadditionaddeddata[0]['maritialStatus']==2 ? 'display:block':'display:none'?>" ><br>
									<div class="col-sm-3">
									<div class="form-group  required">
										<label class="control-label" for='spouseName'>Full Name</label>
										<input type="text"  class="form-control" name="spouseName" id="spouseName"  value="<?php echo $empspousedata[0]['spouseName'] ?>">
									</div>
									</div> 
                                             
									<div class="col-sm-3">
									 <div class="form-group  required">
										  <label class="control-label" for="">Change in Surname(If any)</label>
											<div>
											<input  type="radio" id="change_y" name="change_in_surname" value="1" <?php echo (isset($empspousedata[0])) && $empspousedata[0]['change_in_surname']==1 ? 'checked' : '' ?>>
											  <label for="html">Yes</label>
											  <input  type="radio" id="change_n" name="change_in_surname" value="0" <?php echo (isset($empspousedata[0])) && $empspousedata[0]['change_in_surname']==0 ? 'checked' : '' ?>>
											  <label for="css">NO</label>
										  </div>
									  </div>    
									</div>
									<div class="col-sm-3" id="change_in_surname_row" style="<?php echo isset($empspousedata[0]['change_in_surname']) && $empspousedata[0]['change_in_surname']==1 ? 'display:block':'display:none'?>">
								   <div class="form-group  required">
										<label class="control-label " for='surname'>Provide Surname</label>
										<input type="text"  class="form-control gazet" name="surname" id="surname" value="<?php echo $empspousedata[0]['surname'] ?>">
									</div>
									</div>
									<div class="col-sm-3 ">
								  <div class="form-group  required">
									   <label class="control-label" for="is_spouseGovEmployee">Is Spouse State Govt. Employee(Yes/No)</label>
											<div>
											<input  type="radio" id="spouseGov_y" name="is_spouseGovEmployee"  value="1"                                     <?php echo (isset($empspousedata[0])) && $empspousedata[0]['is_spouseGovEmployee']==1 ? 'checked' : '' ?> >
											  <label for="html">Yes</label>
											  <input  type="radio" id="spouseGov_n" value="0" name="is_spouseGovEmployee" <?php echo (isset($empspousedata[0])) && $empspousedata[0]['is_spouseGovEmployee']== 0 ? 'checked' : '' ?>>
											  <label for="css">NO</label>
										  </div>
									 </div>     
								</div>
                    				     
                                </div>
                                <div class="row spouse-row" id="spouseGov_row" style="<?php echo (isset($empspousedata[0])) && $empspousedata[0]['is_spouseGovEmployee']==1 ? 'display:block' : 'display:none' ?>" >
                                    	<div class="col-sm-3">
                                               <div class="form-group">
                                        			<label class="control-label spouse" for='spouseEmpCode'>Spouse Employee Code</label>
                                        			<input type="text"  class="form-control sgreq_class" name="spouseEmpCode" id="spouseEmpCode" value="<?php echo $empspousedata[0]['spouseEmpCode'] ?>">
                                        		</div>
                        				 </div>
                        				<div class="col-sm-3">					
                						 	 <div class="form-group">
                        							<label class="control-label">Employee Status</label>
        												<select class="form-control sgreq_class" name="spouseEmpStatus" id="spouseEmpStatus" >
														<?php
												foreach($empstatusdata as $Estatus){?>
														<option value="<?php echo $Estatus['id'] ?>" <?php echo (isset($empspousedata[0])) && $empspousedata[0]['spouseEmpStatus']==$Estatus['id'] ? 'selected' : '' ?>><?php echo $Estatus['e_status']; ?> </option> 
										<?php	}
									?>  
                            							 </select>   						 			
                            				</div>
    					 				</div>
    					 				<div class="col-sm-3">
                                               <div class="form-group">
                                        			<label class="control-label" for='spouseEmpDesignation'>Employment Designation</label>
                                        			<input type="text"  class="form-control sgreq_class" name="spouseEmpDesignation" id="spouseEmpDesignation" value="<?php echo $empspousedata[0]['spouseEmpDesignation'] ?>">
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-3">
                                               <div class="form-group">
                                        			<label class="control-label" for='spouseEmpLocation'>Employment Location</label>
                                        			<input type="text"  class="form-control sgreq_class" name="spouseEmpLocation" id="spouseEmpLocation" value="<?php echo $empspousedata[0]['spouseEmpLocation'] ?>">
                                        		</div>
                        				 </div> 
                                </div> 

		<?php  
			if(isset($empchilddata[0])){
								$child_count= count($empchilddata);
			}else{$child_count=0; }

			
			if(isset($empchilddata[0])){ 
						for($i=0;$i<$child_count;$i++){?>
								<div class="row ">
										<div class="col-sm-3">
                          			   
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childNumber'>Child Number</label>
                                        			<input type="number"  class="form-control" name="childNumber[]" value="<?php echo $empchilddata[$i]['childNumber'] ?>">
                                        		</div>
                        				 </div>
										<div class="col-sm-3">
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childGender'>Gender</label>
                                        			<select class="form-control" name="childGender[]" >
                    								<option <?php echo (isset($empchilddata[$i])) && $empchilddata[$i]['childGender']=='Male' ? 'selected' : '' ?> value="Male" >Male</option>
                    								<option <?php echo (isset($empchilddata[$i])) && $empchilddata[$i]['childGender']=='Female' ? 'selected' : '' ?> value="Female">Female</option>
                    					
                    							</select>   
                                        		
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-3">
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childName'>Name</label>
                                        			<input type="text"  class="form-control" name="childName[]" value="<?php echo $empchilddata[$i]['childName'] ?>">
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-2">
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childDOB'>DOB</label>
                                        			<input type="date"  class="form-control" name="childDOB[]" id="childDOB" value="<?php echo $empchilddata[$i]['childDOB'] ?>">					 
                                        		</div>
                        				 </div>
								 </div> 
		<?php } } ?>
                                 <div class="row " style="<?php echo isset($empadditionaddeddata[0]['maritialStatus']) && $empadditionaddeddata[0]['maritialStatus']==2 ? 'display:block':'display:none'?>" id="child-header">
                                       <div class="clone">
                                        <div class="col-sm-3" ><span class="add_text">Children  </span></div>
                                             
                                         <div class="col-sm-9">
                                         <button type="button" class="btn spouse-btn" style="float:right" id="add-child">+</button>
                                         </div>
                                         
                                </div>	 
		</div>
		 
		<div class="row"> <input type="hidden" name="child_count" id="child_count" value="<?php echo $child_count ?>">
				<div id='childNewrow' style="display:block" >
				
				
				</div>

			</div> <?php if(isset($empadditionaddeddata[0])){ ?>
					 <center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="update">Update</button></center> 
					<?php }else{ ?>
                 <center><button type="submit" class="btn btn-primary" id="bts" name="add_update" value="add">Submit</button></center> 
				<?php } ?>
         </div>
</form>
         
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <script>

	var  flg=1;
	var maxCount=2; 
	var child_count = document.getElementById("child_count").value;
	var count=child_count; 

 $("#add-child").click(function(){
     		     
                 if(count<maxCount){
                 $("#childNewrow").append(`<div><div class="col-sm-3">
                          			   
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childNumber'>Child Number</label>
                                        			<input type="number"  class="form-control" name="childNumber[]">
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-3">
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childGender'>Gender</label>
                                        			<select class="form-control" name="childGender[]" >
                    								<option value="Male">Male</option>
                    								<option value="Female">Female</option>
                    					
                    							</select>   
                                        		
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-3">
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childName'>Name</label>
                                        			<input type="text"  class="form-control" name="childName[]" >
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-2">
                                               <div class="form-group  required">
                                        			<label class="control-label" for='childDOB'>DOB</label>
                                        			<input type="date"  class="form-control" name="childDOB[]" id="childDob" >
                                        		</div>
                        				 </div>
                        				 <div class="col-sm-1"> 

                                           <button value="4" type="button" class='remove-child btn' onClick='remove(this)' style="margin-top:35px;">-</button>
                                             
                        				 </div>
                        				
                        				</div>
                        				
                        				</div>`);
                        				
                        				count++;
                        } 
                         else{
								alert("adding child max limit reached"); 
                         }
 });
 
 $("#childNewrow").on('click','.remove-child',function(){
    $(this).parent().parent().remove();
      count--;
 });
	     
      
 let childFlg=0;
 let spFlg=0;
 $("#maritialStatus").change(function(){
	count=0;     
   if(this.value==='2'){
			$("#child-header").css("display","block");
  			$("#spouse-header").css("display","block");
  			$("#spouseEmpCode").prop("required",true);
			$("#childNewrow").css("display","block");
			$(".spouse-row").css("display","none");
   }else if(this.value==='3' || this.value==='4'){
		 $("#child-header").css("display","block"); 
		 $("#childNewrow").css("display","block");
		 $("#spouse-header").css("display","none");
         $(".spouse-row").css("display","none");
		 $("#spouse-btn").html("+");
		 $(".spouse").prop("required",false);
		 $("#spouseEmpCode").prop("required",false);
	}
	else if(this.value==='1'){
		 $("#child-header").css("display","none"); 
		 $("#spouse-header").css("display","none");
		 $("#childNewrow").css("display","none");
		 $(".spouse-row").css("display","none");  
		 $("#spouseEmpCode").prop("required",false); 
	}
   else{
		 $("#child-header").css("display","none");
         $("#spouse-header").css("display","none");
         $(".spouse-row").css("display","none");
         $(".child-row").css("display","none");
         $("#child-btn").html("+");
         $("#spouse-btn").html("+");
         $(".spouse").prop("required",false);
         $("#spouseEmpCode").prop("required",false);
       }
 });
 


 $(document).ready(function(){ 
	 
	$('#change_y').click(function(){
		$('#change_in_surname_row').css("display","block");
		$('.gazet').prop('required',true); 
	});
    
     $('#change_n').click(function(){
        $('#change_in_surname_row').css("display","none");
        $('.gazet').prop('required',false);
   	});
   		
	$("#spouseGov_y").click(function(){	
		$('#spouseGov_row').css("display","block"); 
		$('.sgreq_class').prop('required',true); 
	});   

	$("#spouseGov_n").click(function(){	
		$('#spouseGov_row').css("display","none"); 
		$('.sgreq_class').prop('required',false); 
	});    

//-------------------------------------------------------
		$("#category").change(function(){
		if(this.value==='1'){
			$(".caste_rowclass").css("display","none");
			$(".caste_inp_class").prop("required",false);
		}else{
			$(".caste_rowclass").css("display","block");
			$(".caste_inp_class").prop("required",true);		
		}

	});
//-------------------------------------------------------

 });

 $("#spouse-btn").click(function(){
      	if(spFlg===0){
      		$("#spouse-btn").html("-");
      		$(".spouse-row").css("display","inline");
			$('#spouseGov_row').css("display","none"); 
            spFlg=1;
            
      }
      else{
      		$("#spouse-btn").html("+");
      		$(".spouse-row").css("display","none");
            spFlg=0;
      
      }  
 });
  
 </script>    
         