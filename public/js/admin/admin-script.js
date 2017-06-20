$(".button-collapse").sideNav();
$('.collapsible').collapsible();
$('.modal').modal();



function deleteNotification() {
    iziToast.success({
        title: 'Deleted!',
        message: ''
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
