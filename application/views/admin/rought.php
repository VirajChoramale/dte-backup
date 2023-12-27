 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/css/bootstrap-multiselect.css" integrity="sha512-tlP4yGOtHdxdeW9/VptIsVMLtgnObNNr07KlHzK4B5zVUuzJ+9KrF86B/a7PJnzxEggPAMzoV/eOipZd8wWpag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/js/bootstrap-multiselect.js" integrity="sha512-YwbKCcfMdqB6NYfdzp1NtNcopsG84SxP8Wxk0FgUyTvgtQe0tQRRnnFOwK3xfnZ2XYls+rCfBrD0L2EqmSD2sA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<div class="subContent">-->
<!--    <div class="row" oncontextmenu='return false;'>-->
    <!--<div class="col-lg-4 col-md-4 col-sm-4">-->
    <!--    <div class="panel panel-default">-->
    <!--        <form name="institute_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url('print_report');?>" enctype="multipart/form-data">-->
    <!--            <div class="panel-body">-->
    <!--                <div class="row"> -->
    <!--                    <div class="col-lg-12 col-md-12 col-sm-12">-->
    <!--    					<div class="row">-->
    <!--    					    <div class="form-group col-md-12 required">-->
    <!--    							<label class="control-label">Print All Regions</label>-->
    <!--    						 </div>-->
    <!--    					 </div>-->
    <!--				            <center>	<button class="btn btn-primary text-center" type="submit" name="print all" >-->
    <!--						Submit-->
    <!--					</button></center>-->
                      
    <!--                    </div>-->
    			   
    			  
    <!--                </div>-->
                <!-- /.row (nested) -->
    <!--            </div>-->
    <!--        </form>  -->
    <!--     </div>-->
          
    <!--</div>-->
    
    <!--<div class="col-lg-4 col-md-4 col-sm-4">-->
    <!--    <div class="panel panel-default">-->
    <!--        <form name="institute_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url('print_report');?>" enctype="multipart/form-data">-->
    <!--            <div class="panel-body">-->
    <!--                <div class="row">-->
    <!--                    <div class="col-lg-12 col-md-12 col-sm-12">-->
    <!--    					<div class="row">-->
    <!--    					    <div class="form-group col-md-12 required">-->
    <!--    							<label class="control-label">Print By Regions</label>-->
    <!--    							<input type="hidden" name="regionwise" value="regionwise">-->
    <!--    							<select class="form-control" name="regions" id="regions" required>-->
    <!--    							    <option value="">Select</option>-->
    <!--    							        <?php foreach($regiondata as $rd) { ?>	-->
    <!--    								<option value="<?php echo $rd['id'] ?>"><?php echo $rd['region_name'] ?></option>-->
    <!--    							    <?php } ?>-->
    <!--    							</select>-->
    <!--    						 </div>-->
    <!--    					 </div>-->
    <!--				            <center>	<button class="btn btn-primary send_password text-center" type="submit" name="send_password" >-->
    <!--						Submit-->
    <!--					</button></center>-->
                      
    <!--                    </div>-->
    			   
    			  
    <!--                </div>-->
                <!-- /.row (nested) -->
    <!--            </div>-->
    <!--        </form>  -->
    <!--     </div>-->
          
    <!--</div>-->
   
<!--    <div class="col-lg-12 col-md-12 col-sm-12">-->
<!--        <div class="">-->
<!--            <form name="institute_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url('print_report');?>" enctype="multipart/form-data">-->
<!--                <div class="panel-body">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-6 col-md-6 col-sm-6">-->
<!--        					<div class="row">-->
<!--        					    <div class="form-group col-md-12 required">-->
<!--        							<label class="control-label">Select Post</label>-->
<!--        							<input type="hidden" name="postwise" value="postwise">-->
<!--        							<select class="form-control" name="designation" id="designation" required>-->
<!--        							    <option value="">Select</option>-->
<!--        							        <?php foreach($postdata as $gid) { ?>	-->
<!--        								<option value="<?php echo $gid['id'] ?>"><?php echo $gid['designation'] ?></option>-->
<!--        							    <?php } ?>-->
<!--        							</select>-->
<!--        						 </div>-->
<!--        					 </div>-->
    				           
                      
<!--                        </div>-->
<!--    			        <div class="col-lg-6 col-md-6 col-sm-6">-->
<!--        					<div class="row">-->
<!--        					    <div class="form-group col-md-12 required">-->
<!--        							<label class="control-label">Select Region</label>-->
<!--        							<div class="dropdown custome_dropdown">-->
<!--                                        <a class="form-control" data-toggle="dropdown" href="#">-->
<!--                                            Select-->
                                            
<!--                                        </a>-->
<!--                                        <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">-->
<!--                                            <li>-->
<!--                                                <label class="checkbox">-->
<!--                                                 <?php foreach($regiondata as $rd) { ?>-->
<!--                                                    <input type="checkbox" name="region[]" value="<?php echo $rd['id']   ?>">-->
<!--                    								<option value="<?php echo $rd['id'] ?>"><?php echo $rd['region_name'] ?></option>-->
<!--                    							    <?php } ?>-->
<!--                                                </label>-->
<!--                                            </li>         -->
<!--                                        </ul>-->
<!--						            </div>-->
        							<!--  <select class="form-control  " multiple="multiple" name="region[]" id="region" aria-label="Default select example" data-live-search="true" required>
<!--        							    <option value="">Select</option>-->
<!--        							        <?php foreach($regiondata as $rd) { ?>	-->
<!--        								<option value="<?php echo $rd['id'] ?>"><?php echo $rd['region_name'] ?></option>-->
<!--        							    <?php } ?>-->
<!--        							</select>-->-->
<!--        						 </div>-->
<!--        					 </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                         <center>	<button class="btn btn-primary send_password text-center" type="submit" name="send_password" >-->
<!--            						Submit-->
<!--            					</button></center>-->
<!--                </div>-->
<!--            </form>  -->
<!--         </div>-->
          
<!--    </div>-->
    
<!--</div>-->
<!--</div>-->

<div class="subContent" style="margin-top:10px;">
    <div class="row" oncontextmenu='return false;'>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="">
            <form name="institute_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url('print_report_new');?>" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6">
                             <div class="row">
        					    <div class="form-group col-md-12 required">
        							<label class="control-label">Select Region</label>
        							<!--<input type="hidden" name="postwise" value="postwise">-->
        							<select class="form-control" name="region" id="region" required>
        							    <option value="">Select</option>
        							        <?php foreach($regiondata as $rd) { ?>	
        								<option value="<?php echo $rd['id'] ?>"><?php echo $rd['region_name'] ?></option>
        							    <?php } ?>
        							</select>
        						 </div>
        					 </div>
        					<!--<div class="row">-->
        					<!--    <div class="form-group col-md-12 required">-->
        					<!--		<label class="control-label">Select Region</label>-->
        					<!--		<div class="dropdown custome_dropdown">-->
                            <!--     <a class="form-control" data-toggle="dropdown" href="#">-->
                            <!--                               Select-->
                                            
                            <!--                           </a>-->
                            <!--                           <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">-->
                            <!--                               <li>-->
                            <!--                                   <label class="checkbox">-->
                            <!--                                    <?php foreach($regiondata as $rd) { ?>-->
                            <!--                                       <input type="checkbox" name="region[]" value="<?php echo $rd['id']   ?>">-->
                            <!--       								<option value="<?php echo $rd['id'] ?>"><?php echo $rd['region_name'] ?></option>-->
                            <!--       							    <?php } ?>-->
                            <!--                                   </label>-->
                            <!--                               </li>         -->
                            <!--                           </ul>-->
						       <!--     </div>-->
        							 
        					<!--	 </div>-->
        					<!-- </div>-->
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
        					    <div class="form-group col-md-12 required">
        							<label class="control-label">Select Post</label>
        							<div class="dropdown custome_dropdown">
                                        <a class="form-control" data-toggle="dropdown" href="#">
                                            Select
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">
                                            <li>
                                                <label class="checkbox">
                                                 <?php foreach($postdata as $gd) { ?>
                                                    <input type="checkbox" name="designation[]" value="<?php echo $gd['id']   ?>">
                    								<option value="<?php echo $gd['id'] ?>"><?php echo $gd['designation'] ?></option>
                    							    <?php } ?>
                                                </label>
                                            </li>         
                                        </ul>
						            </div>
        							  
        						 </div>
        					 </div>
                            
                            
                            
        					<!--<div class="row">-->
        					<!--    <div class="form-group col-md-12 required">-->
        					<!--		<label class="control-label">Select Post</label>-->
        					<!--		<input type="hidden" name="postwise" value="postwise">-->
        					<!--		<select class="form-control" name="designation" id="designation" required>-->
        					<!--		    <option value="">Select</option>-->
        					<!--		        <?php foreach($postdata as $gid) { ?>	-->
        					<!--			<option value="<?php echo $gid['id'] ?>"><?php echo $gid['designation'] ?></option>-->
        					<!--		    <?php } ?>-->
        					<!--		</select>-->
        					<!--	 </div>-->
        					<!-- </div>-->
    				           
                      
                        </div>
    			       
                    </div>
                         <center>	<button class="btn btn-primary send_password text-center" type="submit" >
            						Submit
            					</button></center>
                </div>
            </form>  
         </div>
          
    </div>
    
</div>
</div>




<script>
$(document).ready(function() {
    $('.select2').select2();
});

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#region').multiselect();
    });
</script>