 <style>
 th{
     background-color:#4f93ce ;
 }
 
 </style>
 <?php 
   $edu_count=count($edu_data);
   $edu_row=array();
 
 ?>
<div class="subContent" >
<?php if(!empty($this->session->flashdata('edu-msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert <?php echo$this->session->flashdata('class')?>">
         <?php echo $this->session->flashdata('edu-msg');?>
      </div>
   </div> <?php }  ?>
    <div class="subcontentTitle">Employee Educational Details
          <div class="btnalign"><a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]["id"])?>" style="float:right"class="btn btn-info" role="button">Back</a>
</div></div>
         
         <?php 
         
         if(count($edu_data)!=0){?>
          <table class="table table-hover table-striped table-bordered">
          <tr>
              <th>Sr.</th>
              <th>Eduacation</th>
              <th>Desipline</th>
              <th>Specialization.</th>
              <th>University/Board</th>
              <th>Marks/Grade</th>
              <th>Class</th>
              <th>Action</th>
          </tr>
          <?php 
                 $sr=1;
          foreach ($edu_data as $edu) {?>
                <tr>
               		<td><?php echo $sr++;?></td> 
               		<?php $deg='';
                     foreach($level as $lv){
                         if($lv['id']==$edu['degree']){
                              $deg=$lv['degree_name'];
                         }
                             }
                     ;?>
               		<td><?php echo$deg?></td>
               		<td><?php echo $edu['disipiline'] ?></td> 
               		<td><?php echo $edu['specialization'] ?></td> 
               		<td><?php echo $edu['university'] ?></td> 
               		<td><?php echo $edu['marks'] ?></td> 
               		<td><?php echo $edu['class'] ?></td>
               		<td>
                    <button class='btn btn-danger update-bt' onClick="delete_row('<?php echo $edu['id']; ?>', '<?php echo $edu['employee_id']; ?>', '<?php echo $deg; ?>')">
                     <i class="fa fa-trash-o" aria-hidden="true"></i>
               		</button>
               		<button  type='button'class='btn btn-warning delete-bt' onClick="update_row('<?php echo $edu['id']; ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
               		</td> 
                
                
                </tr>
         <?php  }?>
          
          
          
          
          
          </table>
          
          <?php }?>
          
          
          
          
          
         <form name="edu_form" id="edu_form" role="form" method="post" action="<?php echo base_url('add_employee_education');?>" enctype="multipart/form-data">
         		<div class="subContentbody">
         		
        
         <div class='row'>
          		
          		       
    		        <div id='more-edu' style="padding:0px 15px;">
    		                  
    		        </div>
    		   
    		     
    		     </div>
    		     <?php if($edu_count<5){?>
    		     	<div class='row' id='addEdu-row'>
    		   		 <div class='col-sm-10'>
    		         <label class="control-label add_text" id='addBt-label' >Click on + button to Add Education Details</label>
    		             
    		     	 </div>
    		          <div class='col-sm-2'>
    		             <button type="button" class="btn btn-info add-edu" style="float:right; width:100px" id="add-btn">+</button>
    		          </div>
    		    </div>		 
    		    <?php }?>
          	</div>
              	<center>
              	    <button type="submit" class="btn btn-primary" id='sb-btn' style='display:none'>Submit</button>
              	</center>
       </form>
       <form id='update-edu' method='post' action="<?php echo base_url('update_emp_education');?>" style='display:none'  >
              
            <div class="subContentbody">
            <div class='row'>
                             <input type="hidden" name="employee_id"value='<?php echo $empdata[0]['id'];?>' id='emp_id'>         		  
                              <input type="hidden" name="id"value='' id='row_id'>         		  
                                 
								<div class="col-sm-4">
        					     <div class="form-group required">
        							<label class="control-label">Level</label>
        							
										 <select class="form-control" name="degree" id="degree" required>
										 <option  selected disabled>Please Select Level </option>
										  <?php foreach($level as $degree){?>
										 
                    						<option value="<?php echo($degree['id'])?>"><?php echo($degree['degree_name'])?></option>
                    						 <?php }?>
                    						  
                    						</select>     						 
                    			 </div>
                    			
    						 </div>
    						  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Disipiline </label>
            							<input type="text" placeholder="Enter Disipiline" class="form-control" value='' name="disipiline"  id='disipiline' required >							   
            							
            						 </div>
            				 </div>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Specialization </label>
            							<input type="text" placeholder="Enter Specialization" class="form-control" value='' name="specialization" id='specialization'  required >							   
            							
            						 </div>
            				 </div>
            				  
            				 
    				</div>
    				 <div class='row'>
    				  	<div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Board/University </label>
            							<input type="text" placeholder="Enter Board/University" class="form-control" value ='' name="university" id='university' required >							   
            							
            						 </div>
            				 </div>
    				 	  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Enter %/marks/cgpa </label>
            							<input type="text" placeholder="Enter %/marks/cgpa" class="form-control" value='' name="marks" id='marks' required >							   
            						</div>
            				 </div>
            				<div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Select Class Obtained</label>
                                        <select class="form-control" name="class" id="class" required>
                                        <option selected disabled>Please select class</option>
                                        <?php foreach ($class_list as $lev){?>
                                            <option value"<?php echo$lev['id']?>"><?php echo$lev['class_name']?></option>
                                        <?php }?>
                                        </select>				            							
            						 </div>
            				 </div>  
            				 
            				            				  
    				 </div>
    				  <div class='row'>
    				 	<div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Select Passing Year</label>
                                        <select class="form-control" name="passing_year" id="passing_year" required>
                                           <option selected disabled>Please Select Year</option>
                                          <?php for($i=1980;$i<=2024;$i++){?>
                                          <option value='<?php echo$i?>'><?php echo$i?></option>
                                          <?php }?>
                                        </select>				            							
            						 </div>
            		    </div>  
    				    
    			    </div>
    				 <div class='row'>
    				 
    				 		  <div class="col-sm-4">	
    				      <button type="button" class="btn btn-danger close-update" width:100px" style="">Close</button>  				     
    						 </div> 
    				 </div>
                
             
             </div>
            
             <center>
              	    <button type="update" class="btn btn-primary" id='update-btn' >Update</button>
              	</center>
            
            </div> 
      
       
       </form>
       
 </div>
 
 
 
 
<?php ?>
                               
    				
    				

	  <form id='del_form' method='post'action="<?php echo base_url('delete_emp_education');?>">
       <input type='hidden' value='5' id='del_row_id' name='id' >
       <input type='hidden' value='5' id='del_emp_id'  name='emp' >
         
       
       </form>    			
    	
     	   
    		  
        		  
    		    
    		    
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
     const edu=()=>{
               return(`<div>
                <h4>ADD Educational Details</h4>
               			<div class='row'>
                             <input type="hidden" name="employee_id[]"value='<?php echo $empdata[0]['id'];?>'>         		  
                                 
								<div class="col-sm-4">
        					     <div class="form-group required">
        							<label class="control-label">Level</label>
        							
										 <select class="form-control" name="degree[]" id="degree" required>
										 
										 <option  selected disabled>Please Select Level </option>
										  <?php foreach($level as $degree){?>
										  
                    						<option value="<?php echo($degree['id'])?>"><?php echo($degree['degree_name'])?></option>
                    						 <?php }?>
                    						  
                    						</select>     						 
                    			 </div>
                    			
    						 </div>
    						  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Disipiline </label>
            							<input type="text" placeholder="Enter Disipiline" class="form-control" name="disipiline[]"  required >							   
            							
            						 </div>
            				 </div>
            				 <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Specialization </label>
            							<input type="text" placeholder="Enter Specialization" class="form-control" name="specialization[]"  required >							   
            							
            						 </div>
            				 </div>
            				  
            				 
    				</div>
    				 <div class='row'>
    				  	<div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Board/University </label>
            							<input type="text" placeholder="Enter Board/University" class="form-control" name="university[]"  required >							   
            							
            						 </div>
            				 </div>
    				 	  <div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Enter %/marks/cgpa </label>
            							<input type="text" placeholder="Enter %/marks/cgpa" class="form-control" name="marks[]"  required >							   
            						</div>
            				 </div>
            				<div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Select Class Obtained</label>
                                        <select class="form-control" name="class[]" id="level" required>
                                        <option selected disabled>Please select class</option>
                                        <?php foreach ($class_list as $level){?>
                                            <option value"<?php echo$level['id']?>"><?php echo$level['class_name']?></option>
                                        <?php }?>
                                        </select>				            							
            						 </div>
            				 </div>  
            				 
            				            				  
    				 </div>
    				  <div class='row'>
    				 	<div class="col-sm-4">			
            						 <div class="form-group  required">
            							<label class="control-label">Select Passing Year</label>
                                        <select class="form-control" name="passing_year[]" id="level" required>
                                           <option selected disabled>Please Select Year</option>
                                          <?php for($i=1980;$i<=2024;$i++){?>
                                          <option value='<?php echo$i?>'><?php echo$i?></option>
                                          <?php }?>
                                        </select>				            							
            						 </div>
            		    </div>  
    				    
    			    </div>
    				 <div class='row'>
    				 
    				 		  <div class="col-sm-4">	
    				      <button type="button" class="btn btn-danger remove-edu" width:100px" style="">Remove</button>  				     
    						 </div> 
    				 </div>
    				 
    				 </div>`)
    				 
     
     }     //append code
     
     
     
     const append=(div,child)=>{
     					$("#"+div).append(child);	
     					 
     
     }
      let maxCount=4;
      <?php if($edu_count!=0){?>
               maxCount=maxCount-<?php echo$edu_count?>;
               console.log(maxCount);
      <?php }?>
      let count=0;
    $(".add-edu").click(function(){
                 
                 if(count<maxCount){
                 		append("more-edu",edu);
                 		count++;
                 		
                 		count!=0?$('#sb-btn').css("display",'block')&&$('#addBt-label').text("Click on + Button To Add More Education")
                 		:$('#sb-btn').css("display",'none')
                 		count==maxCount?$('#addEdu-row').css('display','none'):$('#addEdu-row').css('display','block')
                 		
                 
                 }else{
                 
                         alert("Maximum Education Added" )
                 }
                 
                 
    		
    			
    
    
    }); 
    $("#more-edu").on("click",'.remove-edu',function(){
     			 
                 $(this).parent().parent().parent().remove();
               // $('#more-edu').remove();
               
                   count--;
                 	count<maxCount?$('#add-btn').prop("disabled",false):('#add-btn').prop("disabled",true);
					count==0?$('#sb-btn').css("display",'none')&&$('#addBt-label').text("Click on + Button To Add Educational Details")
                 		:$('#sb-btn').css("display",'block');
                 		
                  count!=maxCount?$('#addEdu-row').css('display','block'):$('#addEdu-row').css('display','none')
                 	
                 	
             		
                 	              
    
    
    });
    
    
   const delete_row=(row,emp,deg)=>{
    
   $('#del_row_id').val(row);
     $('#del_emp_id').val(emp);
   confirm(`Click ok to remove the ${deg} education field`)==true?$('#del_form').submit():next();

  
   }
   
  $('.close-update').click(function(){
     $('#update-edu').css('display','none');
  	$('#addEdu-row').css('display','block')
  })
  const row_data=<?php echo json_encode($edu_data); ?>;//education row data
  const update_row=(row_id)=>{
  $('#addEdu-row').css('display','none')
   
   $('#update-edu').css('display','block');
    const row=row_data.find((element)=>{
  
        return element.id==row_id;

  })
  
  $('#row_id').val(row.id)
  $('#degree').val(row.degree).change();
  $('#marks').val(row.marks)
  $('#university').val(row.university);
  $('#specialization').val(row.specialization);
  $('#disipiline').val(row.disipiline);
   $('#class').val(row.class).change();
    $('#passing_year').val(row.passing_year).change();
     
  
  
 
  console.log(row.id);
  } 
  
  
  console.log(row_data);
 

 
</script>
 
 
 
 
 
 
 
 
 
       