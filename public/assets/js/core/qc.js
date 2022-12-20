const flashData =$('.flash-data').data('flashdata');
if (flashData){
    new Swal({
        title: 'Add Data',
        text: flashData + ' successfully',
        timer: 3000,
        icon: 'success'
    });
};