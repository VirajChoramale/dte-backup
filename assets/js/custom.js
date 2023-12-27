$(document).ready(function(){
	
	$(document).on('click','.members_add_more',function(){
		var html = '';
		html +='<tr>';
		html +='<td><input class="form-control" name="name_members[]" required></td>';
		html +='<td><input class="form-control" name="designation[]"></td>';
		html +='<td><input class="form-control" name="contact_number[]"></td>';
		html +='<td><button type="button" class="btn btn-primary members_add_more"><i class="fa fa-plus-circle">&nbsp;&nbsp;Add More</i></button></td>';
		html +='</tr>';

		$("#mem_trust_tbl").append(html);
		$(this).prop('disabled', true);
	});

	$(document).on('click','.praposed_add_more',function(){
		var html = '';
		html+='<tr>';
		html+='<td><input class="form-control" name="institution_name[]"></td>';
		html+='<td><input class="form-control" name="institution_address[]"></td>';
		html+='<td><button type="button" class="btn btn-primary praposed_add_more"><i class="fa fa-plus-circle">&nbsp;&nbsp;Add More</i></button></td>';
		html+='</tr>';
		$("#paposed_inst_tbl").append(html);
		$(this).prop('disabled', true);
	});
	
	$(document).on('click','.same_land_add_more',function(){
		var html = '';
		html +='<tr>';
		html +='<td><input class="form-control" name="application_number[]"></td>';
		html +='<td><input class="form-control" name="course_name[]"></td>';
		html +='<td><button type="button" class="btn btn-primary same_land_add_more"><i class="fa fa-plus-circle">&nbsp;&nbsp;Add More</i></button></td>';
		html +='</tr>';
		$("#same_land").append(html);
		$(this).prop('disabled', true);
	});

	$(document).on('click','.equipment_add_more',function(){
		var html = '';
		html +='<tr>';
		html +='<td><input class="form-control" name="course_name[]"></td>';
		html +='<td><input class="form-control" name="total_investment[]"></td>';
		html +='<td><input class="form-control" name="shared_other_courses[]"></td>'
		html +='<td><button type="button" class="btn btn-primary equipment_add_more"><i class="fa fa-plus-circle">&nbsp;&nbsp;Add More</i></button></td>';
		html +='</tr>';
		//$("#equipment_tbl").append(html);
		$("#equipment_tbl").closest('table').find('tr:last').prev().after(html);
		$(this).prop('disabled', true);
	});

	$(document).on('click','.library_add_more',function(){
		var html = '';
		html +='<tr>';
		html +='<td><input class="form-control" name="branch[]"></td>';
		html +='<td><input class="form-control" name="number_tiles[]"></td>';
		html +='<td><input class="form-control" name="number_volumes[]"></td>';
		html +='<td><input class="form-control" name="total_tiles_volumes[]"></td>';
		html +='<td><input class="form-control" name="total_cost[]"></td>';
		html +='<td><button type="button" class="btn btn-primary library_add_more"><i class="fa fa-plus-circle">&nbsp;&nbsp;Add More</i></button></td>';
		html +='</tr>';

		$("#library_tbl").append(html);
		$(this).prop('disabled', true);
	});

	$("#doc_availability").change(function(){
		if($(this).val() == 'Yes'){
			$('#doc_div').show();
		}else{
			$('#doc_div').hide();
		}
	});

});
