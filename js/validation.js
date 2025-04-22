$(function() {
	
	jQuery.validator.addMethod( 'passwordMatch', function(value, element) {
    
    var password = $("#password").val();
    
	var repassword = $("#repassword").val();

    if (password != repassword ) {
       
	   return false;
    
	} else {
        
		return true;
    }

	}, "Your Passwords Must Match");
   	  
	  $( "#storeForm" ).validate({
           rules: {
                    name: {
                         required: true
                   },
				   address: {
                         required: true
                   },
				   country: {
                         required: true
                   },
				   state: {
                         required: true
                   },
				   city: {
                         required: true
                   }
           },
           messages: {
                   name: {
                           required: "This field is required."
                   },
				   address: {
                           required: "This field is required."
                   },
				   country: {
                           required: "This field is required."
                   },
				   state: {
                           required: "This field is required."
                   },
				   city: {
                           required: "This field is required."
                   }
           }
	});
	
	$( "#subcategoryForm" ).validate({
           rules: {
                    name: {
                         required: true
                   },
				   categoryid: {
                         required: true
                   }
           },
           messages: {
                   name: {
                           required: "This field is required."
                   },
				   categoryid: {
                           required: "This field is required."
                   }
           }
	});
	
	$( "#cheerwallForm" ).validate({
           rules: {
                    skuname: {
                         required: true
                   },
				   productName: {
                         required: true
                   },
				   sellPrice: {
                         required: true
                   }
           },
           messages: {
                   skuname: {
                           required: "This field is required."
                   },
				   productName: {
                           required: "This field is required."
                   },
				   sellPrice: {
                           required: "This field is required."
                   }
           }
	});
	
	$( "#register_form" ).validate({
           rules: {
                    name: {
                         required: true
                   },
				   email: {
                         required: true,
						 email:true
                   },
				   password: {
                         required: true
                   },
				   repassword: {
                         required: true,
						 passwordMatch: true
                   },
				   address: {
                         required: true
                   },
				   country: {
                         required: true
                   },
				   state: {
                         required: true
                   },
				   city: {
                         required: true
                   },
				   pincode: {
                         required: true,
						 number: true,
						 maxlength: 6,
						 minlength: 6
                   },
				   contactno: {
                         required: true
                   },
				   pemailid: {
                         required: true,
						 email:true
                   },
				   ctc: {
                         required: true
                   },
				   usertype: {
                         required: true
                   },
				   storeid: {
                         required: true
                   }
           },
           messages: {
                   name: {
                           required: "This field is required."
                   },
				   email: {
                           required: "This field is required.",
						   email: "Enter valid email id"
                   },
				   password: {
                           required: "This field is required."
                   },
				   repassword: {
                           required: "This field is required.",
						   passwordMatch: "Password does not match!"
                   },
				   address: {
                           required: "This field is required."
                   },
				   country: {
                           required: "This field is required."
                   },
				   state: {
                           required: "This field is required."
                   },
				   city: {
                           required: "This field is required."
                   },
				   pincode: {
							required: "This field is required.",
							number: "Enter number.",
							maxlength: "Enter pincode in 6 digit",
							minlength: "Enter pincode in 6 digit"
                   },
				   contactno: {
                           required: "This field is required."
                   },
				   pemailid: {
                           required: "This field is required."
                   },
				   ctc: {
                           required: "This field is required."
                   },
				   usertype: {
                           required: "This field is required."
                   },
				   storeid: {
                           required: "This field is required."
                   }
           }
	});
	
});


function validation(formid,key)
{
	
	$(function() {	

	$.validator.addMethod('mynumber', function(value, element) {
		
		return this.optional(element) || /^[0-9,]+(\.\d{0,3})?$/.test(value); 
	
	}, "Please enter a correct number, format xxxx.xxx");
	
	$.validator.addMethod( 'validtime', function(value, element) {
    
		return checkvalTime(key);

	}, "");
	
	$.validator.addMethod( 'validdeliverytime', function(value, element) {
    
		return TimeValidationOfdelieverytime('errordeliverytiming',key);

	}, "");
	
	$.validator.addMethod( 'validpickuptiming', function(value, element) {
    
		return TimeValidationByField('errorpickuptiming',key)

	}, "");
	
	
	  $( "#serviceform"+formid ).validate({
           rules: {
                   form_bill_amount: {
                         
						 required: true,
						 
						 mynumber: true
                   },
				   form_task_time: {
                         
						 required: true,
						 
						 validtime: true
                   },
				   form_delivery_timing: {
                         
						 required: true,
						 
						 validdeliverytime: true
                   },
				   form_pickup_timing: {
                         
						 required: true,
						 
						 validpickuptiming: true
                   }
				   
           },
           messages: {
                   form_bill_amount: {
                           
						   required: "This field is required.",
						   
						   mynumber: "Incorrect Number"
                   },
				   form_task_time: {
                           
						   required: "This field is required."
                   },
				  form_delivery_timing: {
                           
						   required: "This field is required."
                   },
				  form_pickup_timing: {
                           
						   required: "This field is required."
                   }
           }
	});
});
}

function checkvalTime(serviceId)
{
	
	var date = new Date();
	
	var hours = date.getHours();
	
	var hours = parseInt(hours)+1;
	
	var minutes = date.getMinutes();

	var today = new Date();
	
	var dd = today.getDate();
	
	var mm = today.getMonth()+1; 

	mm = mm < 10 ? '0'+mm : mm;
	
	dd = dd < 10 ? '0'+dd : dd;
	
	var yyyy = today.getFullYear(); 
	
	var full_date=dd+'-'+mm+'-'+yyyy;
	
	var form_event_date=$('*[name="form_event_date"]').attr('type');
	
	var form_event_date='';
		
	if($("#task_for"+serviceId+":checked").val()==1)
	{
		var datePicker=document.getElementById("taskdate"+serviceId).value;	

		if(datePicker=='')
		{
			
			$("#errordate"+serviceId).html('');
			
			document.getElementById('task_time'+serviceId).value='';
			
			$("#errorTimeslot"+serviceId).html('Please select date before time');
			
			return false;
		}
		else{
			
			$("#errordate"+serviceId).html('');
		}
		
		if(datePicker==full_date)
		{
			var ampm = hours >= 12 ? 'pm' : 'am';
			
			hours = hours % 12;
			
			hours = hours || 12;

			minutes = minutes < 10 ? '0'+minutes : minutes;
			
			var strTime = hours + ':' + minutes + ' ' + ampm;
			
			var tasktime=document.getElementById('task_time'+serviceId).value;
			
			var res = tasktime.substring(0, 2); 
			
			var d = new Date();
			
			var n = d.getHours(); 
						
			if(res<n) 
			{
				
				$("#errorTimeslot"+serviceId).html('Please Choose Time After '+strTime);
				
				$("#errordate"+serviceId).html('');
				
				return false;
			}
			else
			{
				$("#errorTimeslot"+serviceId).html('');
				
				$("#errordate"+serviceId).html('');
				
				return true;
			}
		}
		else
		{
			$("#errorTimeslot"+serviceId).html('');
			
			$("#errordate"+serviceId).html('');
			
			return true;
		}
	}
	else if(form_event_date=='text')
	{
		var form_event_date=document.getElementById("form_event_date"+serviceId).value;	

		if(form_event_date=='')
		{

			$("#errordate"+serviceId).html('Please Enter Date Before Select Time');

			document.getElementById('task_time'+serviceId).value='';
			
			$("#errorTimeslot"+serviceId).html('');
			
			return false;
			
		}
		
		if(form_event_date==full_date)
		{
			var ampm = hours >= 12 ? 'pm' : 'am';
			
			hours = hours % 12;
			
			hours = hours || 12;

			minutes = minutes < 10 ? '0'+minutes : minutes;
			
			var strTime = hours + ':' + minutes + ' ' + ampm;
			
			var tasktime=document.getElementById('task_time'+serviceId).value;
			
			var res = tasktime.substring(0, 2); 
			
			var d = new Date();
			
			var n = d.getHours(); 
									
			if(res<n) 
			{
				
				$("#errorTimeslot"+serviceId).html('Please Choose Time After '+strTime);
				
				$("#errordate"+serviceId).html('');
				
				return false;
			}
			else
			{
				$("#errorTimeslot"+serviceId).html('');
				
				$("#errordate"+serviceId).html('');
				
				return true;
			}
		}
		else
		{
			$("#errorTimeslot"+serviceId).html('');
			
			$("#errordate"+serviceId).html('');
			
			return true;
		}
	}
	else
	{
		if($("#task_for"+serviceId+":checked").val()==0)
		{
			var ampm = hours >= 12 ? 'pm' : 'am';
						
			hours = hours % 12;
			
			hours = hours || 12;

			minutes = minutes < 10 ? '0'+minutes : minutes;
			
			var strTime = hours + ':' + minutes + ' ' + ampm;
			
			var tasktime=document.getElementById('task_time'+serviceId).value;
						
			tasktime=tasktime.split(':');
							
			if(tasktime[0]!='')
			{
				var tasktime = tasktime[0]+tasktime[1]; 
				
				var d = new Date();
				
				var h = d.getHours(); 
				
				var h=parseInt(h)+1;
				
				var m = d.getMinutes(); 
				
				m=(m<10) ? '0'+m: m;
								
				var systemtime=h+''+m;
				
				if(parseInt(systemtime)>parseInt(tasktime)) 
				{
					
					$("#errorTimeslot"+serviceId).html('Please Choose Time After '+strTime);
					
					return false;
				}
				else
				{
					$("#errorTimeslot"+serviceId).html('');
					
					return true;
				}
			}
			else
			{
				$("#errorTimeslot"+serviceId).html('');
				
				return true;
			}
		}
		else{
			return true;
		}
	}
}  

function validate_number()
{
	var mobile=document.getElementById('Index_contactno').value;
	
	if(isNaN(mobile))
	{
		alert('Please Enter Only Number Value');
		
		document.getElementById('Index_contactno').value='';
	}
} 

function TimeValidationByField(errorfield,key)
{
	var pickuptime=$("#form_pickup_timing"+key).val();
				
	var date = new Date();
	
	var hours = date.getHours();
	
	var hours = parseInt(hours)+1;
	
	var minutes = date.getMinutes();

	var today = new Date();
	
	var dd = today.getDate();
	
	var mm = today.getMonth()+1; 
	
	if(mm<10){mm='0'+mm;}
	
	dd=(dd<10) ? '0'+dd: dd;
	
	var yyyy = today.getFullYear(); 
	
	var full_date=dd+'-'+mm+'-'+yyyy;

	var ampm = hours >= 12 ? 'pm' : 'am';
	
	hours = hours % 12;
	
	hours = hours || 12;
	
	minutes = minutes < 10 ? '0'+minutes : minutes;
	
	var strTime = hours + ':' + minutes + ' ' + ampm;
	
	var pickuptimearr=pickuptime.split(':');
		
	var pickuptimearr = pickuptimearr[0]+pickuptimearr[1];
					
	var d = new Date();
	
	var h = d.getHours(); 
	
	var h=parseInt(h)+1;
	
	var m = d.getMinutes(); 
	
	m=(m<10) ? '0'+m: m;
				
	var systemtime=h+''+m;
	
	if($("#task_for"+key+":checked").val()==0)
	{

			if(parseInt(pickuptimearr)<parseInt(systemtime)) 
			{		
				$('#'+errorfield+''+key).html('Please Choose Time After '+strTime);
						
				return false;
			}
			else
			{
				$('#'+errorfield+''+key).html('');
				
				return true;
			}
	}
	else{
		
		$('#'+errorfield+''+key).html('');
		
		return true;
	}

} 

function TimeValidationOfdelieverytime(errorfield,key)
{
	var formpickuptiming=$("#form_pickup_timing"+key).val();
		
	if(formpickuptiming==''){
		
		$('#'+errorfield+''+key).html('Please Choose Pickup Time Before Delivery Time');
		
		$("#form_delivery_timing"+key).val('')
		
		return false;
	}
	else{
		$('#'+errorfield+''+key).html('');
	}
	
	formpickuptiming=formpickuptiming.split(':');
		
	var formpickuptiming = formpickuptiming[0]+formpickuptiming[1];
	
	var formdeliverytiming=$("#form_delivery_timing"+key).val();
	
	var formdeliverytiming=formdeliverytiming.split(':');
	
	var formdeliverytiming = formdeliverytiming[0]+formdeliverytiming[1];
		
	var date = new Date();
	
	var hours = date.getHours();
	
	var hours = parseInt(hours)+1;
	
	var minutes = date.getMinutes();

	var today = new Date();
	
	var dd = today.getDate();
	
	var mm = today.getMonth()+1; 
	
	if(mm<10){mm='0'+mm;}
	
	dd=(dd<10) ? '0'+dd: dd;
	
	var yyyy = today.getFullYear(); 
	
	var full_date=dd+'-'+mm+'-'+yyyy;

	var ampm = hours >= 12 ? 'pm' : 'am';
	
	hours = hours % 12;
	
	hours = hours || 12;
	
	minutes = minutes < 10 ? '0'+minutes : minutes;
	
	var strTime = hours + ':' + minutes + ' ' + ampm;
	
	var d = new Date();
				
	var h = d.getHours(); 
	
	var h=parseInt(h)+1;
	
	var m = d.getMinutes(); 
	
	m=(m<10) ? '0'+m: m;
				
	var systemtime=h+''+m;
	
	if($("#task_for"+key+":checked").val()==0)
	{
			if(parseInt(formdeliverytiming)<parseInt(systemtime)) 
			{
				$('#'+errorfield+''+key).html('Please Choose Time After '+strTime);
						
				return false;
			}
			else
			{
				
				if(parseInt(formdeliverytiming)<=parseInt(formpickuptiming)) 
				{
					$('#'+errorfield+''+key).html('Pickup Timing Can Not Greater Than Deliver Time');
						
					return false;
				}
				else{
					$('#'+errorfield+''+key).html('');
				
					return true;
				}

			}
	}
	else{
				
				if(parseInt(formdeliverytiming)<=parseInt(formpickuptiming)) 
				{
					$('#'+errorfield+''+key).html('Pickup Timing Can Not Greater Than Deliver Time');
						
					return false;
				}
				else{
					$('#'+errorfield+''+key).html('');
				
					return true;
				}
	}
		


}



