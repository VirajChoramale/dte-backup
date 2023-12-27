<style>
table a{
   
} 

</style>
 
  <div class='row' style=''>
     <div class="col-sm-4">
      
         <table>
               <tr>
               <td>Employee Name:-</td>
               <td> <?php echo($empdata[0]['title']." ".$empdata[0]['full_name']);?></td>
               </tr>
            
            </table>
            
      </div>
     
     
      
       <div class="col-sm-8">
       
            <table style='float:right'>
               <tr>
               <td>Sevarth ID:-</td>
               <td> <?php echo($empdata[0]['sevarth_no']);?></td>
               </tr>
            
            </table>
         </div> 
          
      </div>

     
  
 
 
            
<div class="table table-responsive">
<table class="table table-bordered  ">
          <thead>
              
                <tr>
                  <th scope="col">Sr.No</th>
                  <th scope="col">Form Name</th>
                  <th scope="col">Action</th> 
               </tr>
           </thead>
            <tbody>
                    <tr>
                          <th scope="row">1</th>
                          <td>Employee Personal Details</td>
                           <td>
						<a class='btn btn-primary' href="<?php echo base_url('employee_personal_details/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">ADD Details</a>
                    </tr>
                    <tr>
                          <th scope="row">2</th>
                          <td>Employee Additional Details</td>
                           <td>
								<a class='btn btn-primary' href="<?php echo base_url('employee_additional_details/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">ADD Details</a>	 
						 </td> 
                    </tr>
                    <tr>
                          <th scope="row">3</th>
                          <td>Employee Educational Details</td>
                           <td>
						<a class='btn btn-primary' href="<?php echo base_url('employee_education/'.$empdata[0]['id'])?>" class="btn btn-info" role="button">ADD Details</a>
                           </td>
                    </tr>
                     <tr>
                          <th scope="row">4</th>
                          <td>Employee  Experiance</td>
                           <td><a class="btn btn-primary" href="<?php echo base_url('employee_experiance/'.$empdata[0]['id']);?>">Add Details</a> 
                    </tr>
                   
                      <tr>
                          <th scope="row">5</th>
                          <td>Employee  Verification & Certificates</td>
                            <td><a class="btn btn-primary" href="<?php echo base_url('employee_verification/'.$empdata[0]['id']);?>">Add Details</a> 
                    </tr>
                    <tr>
                          <th scope="row">6</th>
                          <td>Employee Probation</td>
                            <td><a class="btn btn-primary" href="<?php echo base_url('employee_probation/'.$empdata[0]['id']);?>">Add Details</a> 
                    </tr> 
                    <tr>
                          <th scope="row">7</th>
                          <td>Employee Retirement Details</td>
                            <td><a class="btn btn-primary" href="<?php echo base_url('employee_retirement_details/'.$empdata[0]['id']);?>">Add Details</a> 
                    </tr>
                    <tr>
                          <th scope="row">8</th>
                          <td>Employee Departmental Enquiry</td>
                            <td><a class="btn btn-primary" href="<?php echo base_url('employee_deparmental_enquiry/'.$empdata[0]['id']);?>">Add Details</a> 
                    </tr>
                    
                    
          </tbody>
        </table>
        </div>