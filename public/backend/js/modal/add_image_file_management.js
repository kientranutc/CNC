$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     var host = window.location.href;
     host = host.split('/');
     var url = host[0] + "//" + host[2] + "/";
     
     $('#image-input').on('click', function(event){
         $('#imageModal').modal('show');
         
         $('#imageModal').on('hidden.bs.modal', function(e) { 
             var srcImg = $('#image-input').val();
             $('#image-input-left').addClass('col-md-6');
             $('#show-image-input').attr({
                src:srcImg,
                alt:srcImg
             });
             
         });
     });
});
     