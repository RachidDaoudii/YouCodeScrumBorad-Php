$(document).ready(function(){
    $('#form-task').parsley();
    // $('#form-task').on('save', function(event){
    //     event.preventDefault();
    //     if($('#form-task').parsley().isValid()){
    //         $.$.ajax({
    //             type: "POST",
    //             url: "scripts.php",
    //             data: $(this).serialize(),
    //             beforeSend:function(){
    //                 $('#task-save-btn').attr('disabled','disabled');
    //                 $('#task-save-btn').val('saving.....');
    //             }
    //         });
    //     }
    // });
});