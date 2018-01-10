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
     var wrapper = $('.field_wrapper'); //Input field wrapper
     var x = $('input[name="totalPosition"]').val(); //Initial field counter is 1
    
     // process add image
     var count;
     $("body").on("click",".img-banner", function(e){
       e.preventDefault();
       count=$(this).data('count');
       $("#imageModalMore").modal();
       $('#imageModalMore').on('hidden.bs.modal', function () {
         var val = $("#hidden-image").val();
         if(val!=''){
         $("#banner_"+count).attr({
             src:val,
             alt:val
         });
         $("#img_banner_"+count).val(val);
         }
       });
     });
    
     //add field image product
     $('.add_button_product').click(function(){ //Once add button is clicked
         console.log(x);
         if(x <= maxField){ //Check maximum number of input fields
             x++; //Increment field counter
             var fieldHtml = '<tr><td class="text-center" width="33%" >     <input type="hidden" name="field[id][]" value=""><input type="hidden" name="field[product_id][]" value=""> <input type="hidden" name="field[image][]" id="img_banner_'+x+'"> <img alt="/backend/img/not_found.png" class="img-banner"  data-count="'+x+'" width="100px" height="100px" id="banner_'+x+'" src="/backend/img/not_found.png"></td> <td class="text-right" width="33%"><input class="form-control" type="number" name="field[sort][]" placeholder="Sắp xếp vị trí" > <br/> <a href="javascript:void(0);" class="btn btn-danger remove_button" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></td></tr>'
             $(wrapper).append(fieldHtml); // Add field html
         }
     });
     $(document).on('click', '.remove_button', function(e){ //Once remove button is clicked
         e.preventDefault();
         
         $.ajax({
             url: '', 
             success: function(result){
           
         }});
         $(this).parent().parent().remove(); //Remove field html
     });
     $(document).on('click', '.remove_buttons', function(e){ //Once remove button is clicked
         e.preventDefault();
         var imgProductId = $(this).data('id');
         $.ajax({
             url: url+'admin/products/delete-item/'+imgProductId, 
             success: function(result){
         }
         });
         $(this).parent().parent().remove();
     });
     
     
});