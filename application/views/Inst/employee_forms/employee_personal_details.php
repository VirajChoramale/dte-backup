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
      <?php $url=''; if($personal_data[0]){ $url="update_personal_data"; }else {$url='add_emp_personal_det';}  ?>

<div class="subContent">
 <?php if(!empty($this->session->flashdata('add_empp_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_empp_msg');?>
      </div>
   </div> <?php } ?>

 <div class="subcontentTitle">
            Employee Personal Details
<a class='btn btn-primary' href="<?php echo base_url('employee_details_list/'.$empdata[0]["id"])?>" style="float:right"class="btn btn-info" role="button">Back</a>

         </div>
<div class=row>
   <div class='col-sm-1' style="color:red; width:6px; font-style:bold; font-size:18px">
     *
   </div>
   
   Indicates required filed
  
 
</div>

<form name="emp_personal_details_form" action="<?php echo base_url($url);?>" id="inst_person_form" role="form" method="post"  enctype="multipart/form-data">
  <input type="hidden" class="form-control" id="id" name='id' placeholder="Title"  value="<?php echo$empdata[0]["id"];?>" hidden>
 
  <div class="row" >
   <div class="col-sm-4">
      <div class="form-group ">
          <label for="inputEmail4"   >Title</label>
          <input type="text" class="form-control" id="title" name='title' placeholder="Title"  value="<?php echo$empdata[0]["title"];?>" readonly>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
          <label for="inputEmail4">Full Name</label>
          <input type="text" class="form-control" id="fullname" name='fname'placeholder="Full Name" value="<?php echo$empdata[0]["full_name"];?>" readonly>
      </div>
      	</div>
      	
     <div class="col-sm-4">
        <div class="form-group">
              <label for="inputEmail4">Sevarth ID</label>
              <input type="number" class="form-control" id="sevarth" name='sevarth_num'placeholder="Sevarth ID"  value="<?php echo$empdata[0]["sevarth_no"];?>" readonly>
          </div>
      </div>
   </div>
   <div class='row'>
    <div class="col-sm-4">
       <div  class="form-group required ">
          <label for="cNumber" class="control-label">Contact Number</label>
          <input type="number" class="form-control" id="cNumber" name='cNumber' value="<?php echo (isset($empdata[0]['contact_no']))?$empdata[0]['contact_no']:'';   ?>"readonly >
      </div>
      </div>
       <div class="col-sm-4">
       <div class="form-group required ">
          <label for="email" class="control-label">email</label>
          <input type="email" class="form-control" id="email" name='email' value="<?php echo (isset($empdata[0]['email']))?$empdata[0]['email']:'';   ?>"readonly>
      </div>
      </div>
   </div>   
   <div class="row">
   
      	<div class="col-sm-4">
      	<div class="form-group required" >
      		<label for=""class="control-label">Change in Name(If any)</label>
      		<div style=""> 
      		 <label for="html">Yes</label>
           	<input  type="radio" id="change_y" name="change_in_name" value="1" required <?php echo isset($personal_data[0]['is_changename'])&&$personal_data[0]['is_changename']==1?'checked':''?>>
             <label for="css">NO</label>
              <input  type="radio" id="change_n" name="change_in_name" value="0" required <?php echo isset($personal_data[0]['is_changename'])&&$personal_data[0]['is_changename']==0?'checked':''?>>
              
          </div>
      </div>
      </div>
       </div>   
      <div id="change_in_name_row" class="row" style="<?php echo isset($personal_data[0]['is_changename'])&&$personal_data[0]['is_changename']==1?'display:block':'display:none'?>">
      <div class="col-sm-4">
      <div class="form-group required " >
          <label for="inputEmail4" class="control-label">Old Name</label>
          <input type="text" class="form-control gazet" name='old_name' id="title" placeholder="Old full name"  minLength=2  value='<?php echo (isset($change_name[0]['old_name']))?$change_name[0]['old_name']:'';   ?>'>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group required ">
          <label for="g-for-name-change" class="control-label">Gazette for Name Change</label>
          <input type="text" class="form-control gazet" name='g-for-name-change'id="g-for-name-change" placeholder="Gazette for Name Change" value='<?php echo (isset($change_name[0]['gazet_for_name_change']))?$change_name[0]['gazet_for_name_change']:'';   ?>'>
      </div>
      </div>
      <div class="col-sm-4">
		  <div class="form-group required ">
			  <label for="gdate" class="control-label">Gazette Date</label>
			  <input type="date" class="form-control gazet" id="gazate-date" name='gdate' value='<?php echo (isset($change_name[0]['date']))?$change_name[0]['date']:'';   ?>'>
		  </div>
      </div>   <!-- change_in_name -->
      </div>
      
    
    
      <div class="row">
      <div class="col-sm-4">
      <div class="form-group required">
          <label for="gender" class="control-label">Gender</label>
          <select class='form-control' name="gender" id='gender' required >
				<option selected disabled>Select Gender</option>
				<option value="Male" <?php echo (isset($empdata[0]['gender']) && $empdata[0]['gender'] =='Male')?'selected':'';?>>Male</option>
				<option value="Female" <?php echo (isset($empdata[0]['gender']) && $empdata[0]['gender'] =='Female')?'selected':'';?>>Female </option>
				<option value="Other" <?php echo (isset($empdata[0]['gender']) && $empdata[0]['gender'] =='Other')?'selected':'';?>>Other </option> 
          </select>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group required ">
          <label for="inputEmail4" class="control-label">Date Of Birth</label>
          <input type="date" class="form-control" id="dob" name='dob'  value="<?php echo (isset($personal_data[0]['dob']))?$personal_data[0]['dob']:'';   ?>"required>
      </div> 
      </div>
      <div class="col-sm-4">
      <div  class="form-group required">
          <label for="aadhar_number" class="control-label">Aadhar Number</label>
          <input type="number" class="form-control" id="aadhar_number" name='aadhar_number' placeholder='Please Enter Aadhar Number' value="<?php echo (isset($personal_data[0]['aadhar_number']))?$personal_data[0]['aadhar_number']:'';   ?>" required >
      </div>
      </div>
      </div>
        <div class="row">
      
      <div class="col-sm-4">
		  <div  class="form-group  " >
			  <label for="pan_number" class="control-label">Pan Number</label>
			  <input type="text" class="form-control" id="pan_number" name='pan_number' placeholder='Pan Number'  required minLength=10 maxLength=10 value="<?php echo (isset($personal_data[0]['pan_number']))?$personal_data[0]['pan_number']:'';   ?>">
		  </div>
      </div>
      
      <div class="col-sm-4">
       <div class="form-group required " >
          <label for="pan" class="control-label">Father's Name</label>
          <input type="text" class="form-control" id="fathername" name='fathername' placeholder="Father's Name" required minLnegth=2 value="<?php echo (isset($personal_data[0]['father_name']))?$personal_data[0]['father_name']:'';   ?>" >
      </div>
      </div>
     <div class="col-sm-4">
       <div  class="form-group required ">
          <label for="mname" class="control-label">Mother’s Name</label>
          <input type="text" class="form-control" id="mothername" name='mothername' placeholder='Mother’s Name' value="<?php echo (isset($personal_data[0]['mother_name']))?$personal_data[0]['mother_name']:'';   ?>"required >
      </div>
      </div>
      </div>
      <div class="row">
           <div class="col-sm-4">
          <div  class="form-group required ">
              <label for="Raddress" class='control-label'>Residential Address(Address, City, District, State, Pin code)</label>
              <input type="text" class="form-control" id="r-address" name='res_address' placeholder="Residensial address" value="<?php echo (isset($personal_data[0]['residential_address']))?$personal_data[0]['residential_address']:'';   ?>"required minLength=4 >
          </div>
          </div>
           <div class="col-sm-4">
          <div  class="form-group required "> 
              <label for="Paddress" class='control-label'>Permanant Address</label>
              <input type="text" class="form-control" id="p-address" name='per_address' placeholder="Permanant address" value="<?php echo (isset($personal_data[0]['permanent_address']))?$personal_data[0]['permanent_address']:'';   ?>"required minLength=4>
          </div>
          </div>
          <div class="col-sm-4">
              <div class="form-group required ">
                      <label for="H-address" class="control-label">Home Town Address</label>
                      <input type="text" class="form-control" id="h-address" name='home_address'  placeholder="Home Town Address" value="<?php echo (isset($personal_data[0]['home_town_address']))?$personal_data[0]['home_town_address']:'';   ?>"required minLength=4>
                  </div>
           </div>
       
     </div> 
    <div class="row">
       
          <div class="col-sm-4">
              <div class="form-group required ">
                  <label for="H-address" class="control-label">Mother Tounge</label>
                  <input type="text" class="form-control" id="mothertouge" name='mothertouge'  placeholder="Mother Tounge"  value="<?php echo (isset($personal_data[0]['mother_tounge']))?$personal_data[0]['mother_tounge']:'';   ?>"required minLength=1>
              </div>
          </div>
          	<div class="col-sm-4">
              	<div class="form-group required" >
              		<label for=""class="control-label">Disabilty</label>
              		<div style=""> 
              		 <label for="html">Yes</label>
                   	<input  type="radio" id="disab_y" name="disabilty" value="1" required  <?php echo (isset($personal_data[0]['is_disability']) && $personal_data[0]['is_disability'] =='1')?'checked':'';?> >
                     <label for="disability">NO</label>
                      <input  type="radio" id="disab_n" name="disabilty" value= "0"   <?php echo (isset($personal_data[0]['is_disability']) && $personal_data[0]['is_disability'] =='0')?'checked':'';?> required >
                     
                  </div>
              </div>
      </div>
        
   </div>
   <div class="row" id='disab-row'  style="<?php echo isset($personal_data[0]['is_disability'])&&$personal_data[0]['is_disability']==1?'display:block':'display:none'?>">
   		<div class="col-sm-4">
              <div class="form-group required ">
                  <label for="H-address" class="control-label">% of Disability</label>
                  <input type="number" class="form-control disab" id="per_disability" name='percentage_disab'  placeholder="Please Enter percentage of disabilty"  value="<?php echo (isset($personal_data[0]['percent_disability']))?$personal_data[0]['percent_disability']:'';   ?>">
              </div>
         </div>
        <div class="col-sm-4">
               <div class="form-group required ">
                  <label for="H-address" class="control-label">PWD Type</label>
                  <input type="text" class="form-control disab" id="pwd_type" name='pwd_type'  placeholder="PWD Type"  value="<?php echo (isset($personal_data[0]['pwd_type']))?$personal_data[0]['pwd_type']:'';   ?>">
              </div>
          </div>
        
   </div>   
   
         <center >
         <?php if($personal_data[0]){?>
         
         
         <button type='submit' class="btn btn-primary">Update</button></center> 
         
         <?php } else {?>
           <button type='submit' class="btn btn-primary">Submit</button></center> 
         <?php }?> 
	</div>
	
	
</form>
   
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>

$(document).ready(function(){

      $('#change_y').click(function(){
      
        $('#change_in_name_row').css("display","block");
        $('.gazet').prop('required',true);
   		 });
    
     $('#change_n').click(function(){
        $('#change_in_name_row').css("display","none");
        $('.gazet').prop('required',false);
   		 });
   		 
   		 
   		 
   	$('#disab_y').click(function(){
      
        $('#disab-row').css("display","block");
        $('.disab').prop('required',true);
   		 });
    
     $('#disab_n').click(function(){
        $('#disab-row').css("display","none");
        $('.disab').prop('required',false);
   		 });	 

});


$('#inst_person_form').validate({
     rules:{
     		
     		fname:"required",
     		
     		aadhar_number:{
     		   minlength:12,
     		   maxlength:12
     		},
     		change_in_name:"required",
     		gender:{
     		    minlength:1,
     		},
     		cNumber:{
     		   required:true,
     		   minlength:10,
     		   maxlength:10,
     		},
     		percentage_disab:{
     		   required:true,
     		   minlength:1,
     		   maxlength:3,
     		},
     		
     		
     		mname:{
     		 
     	       required:true,
     	      
     	  
     	       
     		}
     
     },
     
     messages:{
          fname:"please enter father name",
          change_in_name:"Please select Yes/No",
          pan_number:"Please enter valid pan no.",
          cNumber:{
                required:"Please Enter Mobile Number",
                   minlength:"Please Enter Valid 10 Digit number",
                    maxlength:"Please Enter Valid 10 Digit number"
          
          },
           percentage_disab:{
                required:"Please Valid Percentage",
                   minlength:"Please Valid Percentage",
                    maxlength:"Please Valid Percentage"
          
          },
          aadhar_number:{
          			minlength:"Please Enter Valid Aadhar number",
                    maxlength:"Please Enter Valid Aadhar number"
          
          },
          
          
         
          
     
     
     }


})






	


</script>