$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     var host = window.location.href;
     host = host.split('/');
     var url = host[0] + "//" + host[2] + "/";
     //add more field
     var maxField = 10 ; //Input fields increment limitation
     var addButton = $('.add_button'); //Add button selector
     var wrapper = $('.field_wrapper'); //Input field wrapper
     var fieldHTML = '<div><input type="text" class="form-control" name="field_name[]" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button" title="Remove field"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></div>'; //New input field html 
     var x = 1; //Initial field counter is 1
     $(addButton).click(function(){ //Once add button is clicked
         if(x < maxField){ //Check maximum number of input fields
             x++; //Increment field counter
             $(wrapper).append(fieldHTML); // Add field html
         }
     });
     $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
         e.preventDefault();
         $(this).parent('div').remove(); //Remove field html
         x--; 
     });
});