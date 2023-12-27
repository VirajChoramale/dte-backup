<style>
  th{
      background-color:#52D3D8
  }
</style>
<div class="subContent" >
<?php if(!empty($this->session->flashdata('edu-msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert <?php echo$this->session->flashdata('class')?>">
         <?php echo $this->session->flashdata('edu-msg');?>
      </div>
   </div> <?php }  ?>
    <div class="subcontentTitle">Employee Experiance Details
     <div class="btnalign"><button class="btn btn-primary ">Back</button></div>
 </div>

 		<?php if(count($exp_data)>0)
 		
 		{   $sr=1;
 		
 		   ?>
 		      <table class="table table-hover table-striped table-bordered">
 		          <tr>  
 		             <th>SR</th>
 		             <th>Institute/Organization</th>
 		         	 <th>Nature of Job</th>
 		         	 <th>Designation</th>
 		             <th>Total Experiance</th>
 		             <th>Action</th>
 		          </tr> 
 		         
 		       <?php foreach ($exp_data as $exp){?>  
 		         	<tr>
 		         	    <td><?php echo$sr++; ?></td>
 		         	  <td><?php echo $exp['institute_name'] ?></td>
 		         	   <td><?php echo$exp['nature_of_job']?></td>
 		         	   <td><?php foreach ($designation as $desi){
 		         	       if($exp['designation']==$desi['id']){
 		         	           echo$desi['designation'];
 		         	           break;
 		         	       }
 		         	         
 		         	   }
 		                 
 		               ?></td>
 		         	   <td><?php echo$exp['total_experiance']++; ?></td>
 		         	   <td><button class='btn btn-warning' onClick=update(<?php echo $exp['id'];?>)><i class="fa fa-pencil" aria-hidden="true"></i></button>
 		         	       <button class='btn btn-danger' onClick=del(<?php echo $exp['id'];?>)><i class="fa fa-trash" aria-hidden="true"></i></button>
 		         	   
 		         	   </td>
 		         	  
 		         	    
 		         	
 		         	</tr> 
 		         	 
 		             
 		      <?php }?>
 		      
 		      
 		      </table>
 		    
 		    
 		    
 		<?php }?>
         <form name="institute_details_form" id="emp_exp_form" role="form" method="post" action="<?php echo base_url('add_employee_experiance')?>" enctype="multipart/form-data">
         		<div class="subContentbody">
    		   	 <div class='row'>
    		        <div id='more-edu'>
    		        
    		        </div>
    		 
    		  </div>
    		  	
    			
              	<center>
              	    <button type="submit" class="btn btn-primary" style="display:none;"id="sb-btn">Submit</button>
              	</center>
            <?php if(count($exp_data)<3){?>
                  	
            <div class='row' id='add-edu-header'>
    		   		 <div class='col-sm-4'>
    		         <label class="control-label add_text" style="float:left" >Click To Add Experiance</label>
    		             
    		     	 </div>
    		          <div class='col-sm-8'>
    		            <a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$emp_id)?>" style="float:right"class="btn btn-info" role="button">Back</a>
    		          </div>
    		    </div>
    		    <?php }?>
    		</div>    
       </form>

       <form id='update-form'  role='form'style='display:none' method='post' action='<?php echo base_url('update_employee_experiance');?>'>
          <div class='subContentBody'>
             <div class='row'>
                        		 <input type='hidden' name='employee_id'value=<?php echo$emp_id;?> id='emp_id'>  
                                 <input type='hidden' name='id' value='' id='id'>
								<div class="col-sm-4">
        					     <div class="form-group required">
        							<label class="control-label">Name of the Institute/Organization</label>
									<input type="text" placeholder="Enter Name of the Institute/Organization" class="form-control" name="institute_name"  id='institute_name' required >							   
     						 
                    			 </div>
    						 </div>
    						  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Address</label>
            							<input type="text" placeholder="Enter Address" class="form-control" name="address" id='address' required >							   
            							
            						 </div>
            				 </div>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Nature of Job </label>
                							<select class="form-control" name="nature_of_job" id='nature'required>
                        						 <option value="Teaching" >Teaching</option>
                        						 <option value="Non-Teaching" >Non-Teaching</option>
                        						 
                        						</select>  
            						 </div>
            				 </div>
            				  </div>
            				   <div class='row'>
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Designation </label>
                							<select class="form-control" name="designation"  id='designation' required>
                							<option selected disabled>Please Select Designation</option>
                							  <?php if(isset($designation))
                							     
                							         foreach($designation as $desi)
                							         {?>
                							     
                        						 <option value="<?php echo $desi['id']?>" ><?php echo $desi['designation']?></option>
                        						 <?php }?>
                        						</select>  
            						 </div>
            				 </div>
    				
    				
    				 	  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Date of joining </label>
            							<input type="date"  class="form-control" name="date_of_joining" id='date_of_joining'  required >							   
            						</div>
            				 </div>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Appoinment Letter Number </label>
            							<input type="text"  class="form-control" name="appointment_letter_no" id='appointment' required >				            							
            						 </div>
            				 </div>  
            				 </div>
            				   <div class='row'>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Appointment Category</label>
                                        <select class="form-control" name="appointment_category"  id='appointment_category'required>
                                            <option value='A'>A</option>
                                            <option value='B'>B</option>
                                            <option value='C'>C</option>
                                        
                                        
                                        </select>				            							
            						 </div>
            				 </div>  
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Pay Scale</label>
                                        <select class="form-control" name="pay_scale" id='pay_scale' required>
                                        <option value='a'>A</option>
                                         <option value='b'>B</option>
                                          <option value='c'>C</option>
                                        </select>				            							
            						 </div>
            				 </div>  
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Service End Date</label>
            							<input type="date"  class="form-control" name="service_end_date" id='service_end' required >				            							
                                     </div>
            				 </div> 
            				 </div>
            				 <div class='row'>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Total Experiance(in years)</label>
            							<input type="number"  class="form-control" name="total_experiance" id='total_exp' required >				            							
                                     </div>
            				 </div>
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Naxli/Adivasi Area ?</label>
                                        <select class="form-control" name="inaccessible_area" id='inaccsi'  required>
                                        <option value=1>Yes</option>
                                         <option value=0>No</option>
                                           <option selected disabled>Please select</option>
                                         
                                        </select>				            							
            						 </div>
            				 </div>  
            				 
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Reason For Leaving</label>
											<select class="form-control" name="reason_for_leaving" id='reason' required>
                                       			 <option value='Transfer'>Transfer</option>
                                       			 <option value='Resign'>Resign</option>
                                       			<option value='Other'>Other</option>
                                       			 
                                       			 
                                        	</select>  
                                        </div>
            				 </div>
            				  
    				 </div>
    				 <div class='row'>
    				       <div class="col-sm-3">	
    				      <button type="button" class="btn btn-danger " id='close-update' width:100px">Close</button>
    				      </div>
    				 </div>
    			<center><button type='submit' class='btn btn-primary'>Update</button></center>	 
           
          </div>
       
       </form>
       
	<form style='display:none' id='del_row' action='<?php echo base_url('delete_employee_experiance')?>' method='post'>
	   <input type='hidden' value='<?php echo $emp_id?>' name='emp'>
	   <input type='hidden' value='' name='row-id' id='row-id'>
	
	</form>
       
 </div>

 
 
 
<?php ?>
                               
    				
    			

				
    		   
    		  
        		  
    		    
    		    
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
     const data=<?php echo json_encode($exp_data);?>;
     const edu=()=>{
               return(`<br><div>
               <div class='row'>
                        		 <input type='hidden' name='emp_id[]'value=<?php echo$emp_id;?>>  
               
								<div class="col-sm-4">
        					     <div class="form-group required">
        							<label class="control-label">Name of the Institute/Organization</label>
									<input type="text" placeholder="Enter Name of the Institute/Organization" class="form-control" name="institute_name[]"  required >							   
     						 
                    			 </div>
    						 </div>
    						  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Address</label>
            							<input type="text" placeholder="Enter Address" class="form-control" name="address[]"  required >							   
            							
            						 </div>
            				 </div>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Nature of Job </label>
                							<select class="form-control" name="nature_of_job[]" required>
                        						 <option value="Teaching" >Teaching</option>
                        						 <option value="Non-Teaching" >Non-Teaching</option>
                        						 
                        						</select>  
            						 </div>
            				 </div>
            				  </div>
            				   <div class='row'>
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Designation </label>
                							<select class="form-control" name="designation[]" required>
                							<option selected disabled>Please Select Designation</option>
                							  <?php if(isset($designation))
                							     
                							         foreach($designation as $desi)
                							         {?>
                							     
                        						 <option value="<?php echo $desi['id']?>" ><?php echo $desi['designation']?></option>
                        						 <?php }?>
                        						</select>  
            						 </div>
            				 </div>
    				
    				
    				 	  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Date of joining </label>
            							<input type="date"  class="form-control" name="date_of_joining[]"  required >							   
            						</div>
            				 </div>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Appoinment Letter Number </label>
            							<input type="text"  class="form-control" name="appointment_letter_no[]" placeholder='Please Enter Experiance' required >				            							
            						 </div>
            				 </div>  
            				 </div>
            				   <div class='row'>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Appointment Category</label>
                                        <select class="form-control" name="appointment_category[]"  required>
                                            <option value='A'>A</option>
                                            <option value='B'>B</option>
                                            <option value='C'>C</option>
                                        
                                        
                                        </select>				            							
            						 </div>
            				 </div>  
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Pay Scale</label>
                                        <select class="form-control" name="pay_scale[]"  required>
                                        <option value='a'>A</option>
                                        <option value='b'>B</option>
                                         <option value='c'>C</option>
                                        
                                        
                                        </select>				            							
            						 </div>
            				 </div>  
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Service End Date</label>
            							<input type="date"  class="form-control" name="service_end_date[]"  required >				            							
                                     </div>
            				 </div> 
            				 </div>
            				 <div class='row'>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Total Experiance(in years)</label>
            							<input type="number"  class="form-control" name="total_experiance[]" placeholder='Please Enter Total Experiance'  required >				            							
                                     </div>
            				 </div>
            				  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Naxli/Adivasi Area ?</label>
                                        <select class="form-control" name="inaccessible_area[]"  required>
                                        <option value=1>Yes</option>
                                         <option value=0>No</option>
                                           <option selected disabled>Please select</option>
                                         
                                        </select>				            							
            						 </div>
            				 </div>  
            				 
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Reason For Leaving</label>
											<select class="form-control" name="reason_for_leaving[]"  required>
                                       			 <option value='Transfer'>Transfer</option>
                                       			 <option value='Resign'>Resign</option>
                                       			<option value='Other'>Other</option>
                                       			 
                                       			 
                                        	</select>  
                                        </div>
            				 </div>
            				  
    				 </div>
    				 <div class='row'>
    				       <div class="col-sm-3">	
    				      <button type="button" class="btn btn-danger remove-edu" width:100px">Remove</button>
    				      </div>
    				 </div>
    				 </div>`)
    				 
     
     }     //append code
     
     
     
     const append=(div,child)=>{
     					$("#"+div).append(child);	
     					 
     
     }
      let maxCount=3;
            let count=0;
      
      <?php if(count($exp_data)>0){?>
           maxCount=maxCount-<?php echo count($exp_data);}?>
      
    $(".add-edu").click(function(){
                 $('#sb-btn').css("display",'block');
                 if(count<maxCount){
                 		append("more-edu",edu);
                 		count++;
                 		
                 		count==maxCount?$('#add-edu-header').css('display','none'):$('#add-edu-header').css('display','block')
                 		
                 		
                 
                 }else{
                         $('#add-btn').prop("disabled",true);
                 }
                 
                 
    		
    			
    
    
    }); 
    $("#more-edu").on("click",'.remove-edu',function(){
                       count--;
    
     			  count==0?$('#sb-btn').css('display','none'):$('#sb-btn').css('display','block') 
                 $(this).parent().parent().parent().remove();
                 count<maxCount?$('#add-btn').prop("disabled",false):('#add-btn').prop("disabled",true);
                  count<maxCount?$('#add-edu-header').css('display','block'):$('#add-edu-header').css('display','none')
               
    
    
    });
    $('#close-update').on('click',function(){
                   $('#update-form').css('display','none');
               $('#add-edu-header').css('display','block');
    
    })
    
    const update=(id)=>{
           
               $('#update-form').css('display','block');
               $('#add-edu-header').css('display','none');
               
               console.log(id)
               const exp=data.find((data)=>{
                     return data.id==id
              
              });
              $('#institute_name').val(exp.institute_name);
              $('#id').val(id);
              $('#address').val(exp.address)
              $('#emp_id').val(exp.employee_id)
              $('#nature').val(exp.nature_of_job)
              $('#designation').val(exp.designation)
              $('#date_of_joining').val(exp.date_of_joining)
              $('#appointment').val(exp.appointment_letter_no);
              $('#appointment_category').val(exp.appointment_category);
              
              $('#pay_scale').val(exp.pay_scale);
              
            $('#service_end').val(exp.service_end_date);
              $('#total_exp').val(exp.total_experiance);
                $('#inaccsi').val(exp.inaccessible_area);
              $('#reason').val(exp.reason_for_leaving);
                
                            
              
              
                 
    
    
    
    } 
   const del=(id)=>{
          $('#row-id').val(id);
          if(confirm("Please confirm to delete data")){
                    $('#del_row').submit();  
          
          }
   } 
   

</script>
 
 
 
 
 
 
 
 
 
       