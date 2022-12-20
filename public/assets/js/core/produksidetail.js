const flashData =$('.flash-data').data('flashdata');
if (flashData){
    new Swal({
        title: 'Add Data',
        text: flashData + ' successfully',
        timer: 3000,
        icon: 'success'
    });
};

const flashDataerror =$('.flash-datae').data('flashdatae');
console.log(flashDataerror);
if (flashDataerror){
    Swal.fire({
        title: ' Data Does Not Match',
        text:  ' The data Is automatically reported to production SPV\n\n [Repoter '+ flashDataerror +']',
        icon: 'error'
    });
};
