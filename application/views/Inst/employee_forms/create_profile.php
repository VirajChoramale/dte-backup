<style>
    .error{
        color:#c0392b;
        font-size:12px
    } 
     .error::onclick{
        color:black;
        font-size:12px
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="subContent" >
         <div class="subcontentTitle">
            Employee Details
         </div>
      
         <?php if(!empty($this->session->flashdata('add_cemp_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert  <?php echo $this->session->flashdata('class');?>">
         <?php echo $this->session->flashdata('add_cemp_msg');?>
      </div>
 </div>
 
 
   <?php } 
   
   if(isset($employeeData[0]))
   {
       $taction = "update_emp_profile";
   }
   else
   {
       $taction = "add_emp_profile";
   }
   ?>
  
   
  <form name="emp_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url($taction);?>" enctype="multipart/form-data">
 	<div class="subContentbody"> <?php if(isset($employeeData[0])){ ?>
 	      <div class="row"><a class="btn btn-primary" style="float:right" href="<?php echo base_url("create_profile");?>" >Back</a></div>   <?php } ?>
          <div class=row>
               <div class='col-sm-1' style="color:red; width:6px; font-style:bold; font-size:18px">
                 *
               </div>
               
               Indicates required filed
              
             
         </div>
          <div class="row">
    			<div class="col-sm-2">
            		<div class="form-group required">
            			<label class="control-label">Select Title</label>
                    	<select class="form-control" name="title" id="title" required>
                    	<option value="Mr" <?php echo (isset($employeeData[0]['title']) && $employeeData[0]['title'] =='Mr')?'selected':'';  ?> >Mr</option>
                    	<option value="Ms" <?php echo (isset($employeeData[0]['title']) && $employeeData[0]['title'] =='Ms')?'selected':'';  ?>>Mrs</option>
                    	<option value="Dr" <?php echo (isset($employeeData[0]['title']) && $employeeData[0]['title'] =='Dr')?'selected':'';  ?>>Dr</option>
                    	<option value="other" <?php echo (isset($employeeData[0]['title']) && $employeeData[0]['title'] =='other')?'selected':'';  ?>>other</option>
                    	</select>
            		</div>	
                	</div>	
                	<div class="col-sm-6">			
                		<div class="form-group required" >
                							<label class="control-label">Full Name </label>
                							<?php 
                							if(isset($employeeData[0]))
                							{
                							    ?>
                							    <input type="hidden" name="eid" value=<?php echo $employeeData[0]['id'] ?>>
                							 <?php   
                							}
                							?>
                							<input type="text" placeholder="Enter Full Name" class="form-control" name="full_name" id="full_name" value="<?php echo (isset($employeeData[0]['full_name']))?$employeeData[0]['full_name']:'';   ?>" required >							   
                							
                						 </div>
                						 </div>
                	<div class="col-sm-4">
                    						 <div class="form-group required">
                    							<label class="control-label">Gender</label>
                    							<select class="form-control" name="gender" id="gender" required>
                    							    <option readonly>Select</option>
                    								<option value="Male" <?php echo (isset($employeeData[0]['gender']) && $employeeData[0]['gender'] =='Male')?'selected':'';  ?>>Male</option>
                    								<option value="Female"  <?php echo (isset($employeeData[0]['gender']) && $employeeData[0]['gender'] =='Female')?'selected':'';  ?>>Female</option>
                    							    
                    							</select>
                    						 </div>
                    	</div>				
        						 </div>
					
        		<div class="row">
        			 <div class="col-sm-4">
        				<div class="form-group required" >
        					<label class="control-label">Enter Sevarth no.</label>
        						<input type="number" placeholder="Enter Sevarth No." class="form-control" name="sevarth_no" id="sevarth_no" value="<?php echo (isset($employeeData[0]['sevarth_no']))?$employeeData[0]['sevarth_no']:'';   ?>"    required >						
        				 </div>
    				</div>
    				<div class="col-sm-4">
        				<div class="form-group required" >
        					<label class="control-label">Select Designation</label>
        					
        					<select class="form-control" name="designation" id="designation" required>
        					
        					<option >Please Select Designation</option>
        					
        					<?php foreach($designation as $desig){?>
        					    <option value='<?php echo $desig['id']?>' <?php echo isset($employeeData[0])&&$employeeData[0]['designation']==$desig['id']?"selected": " "?>><?php echo $desig['designation']?></option>
        					
        					<?php }?>
        					</select>
        				 </div>
    				</div>	 	 
                	  <div class="col-sm-4">
                						  <div class="form-group required">
                							<label class="control-label" for='dob'>Date of Birth</label>
                							<input class="form-control" placeholder="Enter DOB" type="date" id="dob" name="dob" value="<?php echo (isset($employeeData[0]['dob']))?$employeeData[0]['dob']:'';   ?>" required >
                						 </div>
                						 </div>
        						 </div>
				 <div class="row">
                			 <div class="col-sm-4">
                					<div class="form-group required">
                							<label class="control-label">Email</label>
                							<input type="email" class="form-control" name="email" Placeholder="Enter Email Address" id="email" value="<?php echo (isset($employeeData[0]['email']))?$employeeData[0]['email']:'';   ?>" required>
                						 </div>
                						 
                                </div>
                                <div class="col-sm-4">					
        						 	 <div class="form-group required">
                							<label class="control-label">Contact Number</label>
                							<input type="number" class="form-control" name="contact_no" Placeholder="Enter Contact Number" id="contact_no" value="<?php echo (isset($employeeData[0]['contact_no']))?$employeeData[0]['contact_no']:'';   ?>" required>
						 			</div>
					 			</div>
							</div>
				<center>
				    <?php if(isset($employeeData[0])){ ?>
				    <button class="btn btn-primary text-center" type="submit">Update</button> 
				    <?php } else {?>
				    <button class="btn btn-primary text-center" type="submit">Submit</button> 
				    
				    <?php } ?>
				</center>
            </div>  
         </form>
         </div>
      <br><br>
      	<div class="table table-responsive">
			<table class="table table-hover table-striped table-bordered" id="ps_table" width="100%">
				<thead>	
				   <tr class="header">
					  <th >Sr.No</th>
					   
					  <th >Employee Name</th>
					  <th >Sevarth No.</th>
					  <th >Gender</th>
					  <th >DOB</th>
					  <th >Email</th>
					  <th >Contact No</th>
					  <th >Action</th>
					  
					  
				   </tr>
				</thead>
				
				<tbody>
				    <?php 
				    $i=1;
				    foreach($emp as $eemp) {?>
				<tr>
			        <td><?php echo $i++; ?></td>
			        <td><?php echo $eemp['full_name']; ?></td>
			        <td><?php echo $eemp['sevarth_no']; ?></td>
			        <td><?php echo $eemp['gender']; ?></td>
			        <td><?php echo $eemp['dob']; ?></td>
			        <td><?php echo $eemp['email']; ?></td>
			        <td><?php echo $eemp['contact_no']; ?></td>
			        <td>
			        <div style="display:flex;" class='action'>
			            
			            <a class='btn' href="<?php echo base_url('employee_details_list/'.$eemp['id'])?>" class="btn btn-info" role="button"><i class="fa fa-plus" style="font-size:24px;color:blue;padding:0px 10px;" id="editemp"></i></a>
			            
			           
			            <form id="edit_emp_profile" method="POST" action="<?php echo base_url('edit_emp_profile');?>">
			                <input type="hidden" value="<?php echo $eemp['id'] ?>" name = "eid">
							 <button class="btn" type='submit' style="border:none;background:none;">
								<i class="fa fa-edit" style="font-size:24px;color:blue;padding:0px 10px; " id="editemp"></i>
							</button>
			            </form>
			             <form id="delete_emp_profile" method="POST" action="<?php echo base_url('delete_emp_profile');?>">
			                <input type="hidden" value="<?php echo $eemp['id'] ?>" name = "eid">
			                <button class="btn" id='del_btn' type='button' style="border:none;background:none;">
								 <i class="fa fa-trash" style="font-size:24px;color:red;padding:0px 10px;" id="deleteemp"></i>
							</button>
			            </form>
			            </div>
			        </td>
				</tr>
				<?php } ?>
				</tbody>
			 </table>
	   </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>

function add_emp_data(seldata)
{
	//var eid = seldata.data("empid");
	//alert(";");
	 $("#employee_details_list").submit();
}

$(".action").on("click",".fa-plus",function(){
      $("#employee_details_list").submit();
})



$(".action").on("click","#del_btn",function(){
      
      confirm("Please confirm to delete employee data")==true? $("#delete_emp_profile").submit():console.log("");
     
})

$('#inst_det_form').validate({
     rules:{	
     		contact_no:{
     		   required:true,
     		   minlength:10,
     		   maxlength:10,
     		},
     		
     
     },
     
     messages:{
       
          contact_no:{
                required:"Please Enter Mobile Number",
                   minlength:"Please Enter Valid 10 Digit number",
                    maxlength:"Please Enter Valid 10 Digit number"
          
          },
         
          
         
          
     
     
     }


})




</script>
 
