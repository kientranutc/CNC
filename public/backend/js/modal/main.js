$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     var host = window.location.href;
     host = host.split('/');
     var url = host[0] + "//" + host[2] + "/";
     
     //net
     $('.delete-item').on('click', function(event){
         event.preventDefault();
         var urlDelete = $(this).attr('href');
         $('#url-modal').attr('href', urlDelete);
         $('#deleteModal').modal('show');
         
     });
     
});