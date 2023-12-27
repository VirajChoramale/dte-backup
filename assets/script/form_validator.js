class Validator{
	
  validate_number(val=0,limit=0){
	 
	  if(val.toString().length==limit){
		  return true;
	  }
	  else{
		  return false;  	  }
	  
	
  }
   valid_mob_number(number){
	   	 const  phoneno= /^\d{10}$/;
	   	
	   	
	   	 if(phoneno.test(number)){
				return true;
			}
		else{
			return false; 
			
		} 
	   	
       
	
  }
  
  
	
	
}

export default Validator;