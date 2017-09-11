/**
 * Created by lordrahl on 11/09/2017.
 */


function success(msg){
    toastr.success(msg,"PipeIn",{
        timeout:5000,
        escapeHtml:true,
        progressBar: true
    });
}


function error(msg){
    toastr.error(msg,"PipeIn",{
        timeout:5000,
        escapeHtml:true,
        progressBar: true
    });
}


