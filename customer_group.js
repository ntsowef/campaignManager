  
      $(document).ready(function(){
        // Set form variable
        var form = $('#FormSubmit');
        
        // Hijack form submit
        form.submit(function(event){
          // Set username variable
          var username = $('#group_name').val(); 
          
          // Check if username value set
          if ( $.trim(group_name) != '' ) {
			  
			  
			$("#FormSubmit").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
        
			
			var myData = 'group_name='+ $("#group_name").val()+'&file='$("file").val(); 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "add_c_group.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#responds").append(response);
				$("#group_name").val(''); //empty text field on successful
				$("#file").val(''); //empty text field on successful
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
          }
          
          // Prevent default form action
          event.preventDefault();
        });
      });
    
    