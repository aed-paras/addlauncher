$(".button-collapse").sideNav();
$('.collapsible').collapsible();
$('.modal').modal();



function deleteNotification() {
    iziToast.success({
        title: 'Deleted!',
        message: '',
        position: 'topRight'
    });
}

function hideNotification() {
    iziToast.success({
        title: 'Hidden Now!',
        message: ''
    });
}

function showNotification() {
    iziToast.success({
        title: 'Visiable Now!',
        message: ''
    });
}
