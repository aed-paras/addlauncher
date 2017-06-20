$('.delete-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: baseurl + "/admin/metro/city/" + id,
        method: 'DELETE',
        data: { '_token': csrf }
    }).done(function () {
        $("#city_row_" + id).slideUp();
        deleteNotification();
    });

});

$('.edit-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $("#edit_modal form").attr("action", baseurl + "/admin/metro/city/" + id);
    var city_name = $("#city_row_" + id + " .city-name").text();
    $("#edit_name").text(city_name);
    $("#city_new_name_input").val(city_name);
});
