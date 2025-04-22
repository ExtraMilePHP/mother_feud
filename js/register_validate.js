$(document).ready(function () {
    $('#navrangfrm').validate({
        rules: {
            name: {
                required: true
            },
            location: {
                required: true
            },
            cust_profile: { 
                required: true
            },
            ecard: {
                required: true
            },
            image: {
                required: true
            },
            custmessage: {
                required: false
            },
            message: {
                required: false,
                maxlength:150
            },
            email: {
                required: true
            },
		messages:{
			message : "Maximum 150 charachters"
		}
        },
	submitHandler:function(form){
           form.submit();
        }

    });
});