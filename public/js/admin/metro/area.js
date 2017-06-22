$('.delete-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: baseurl + "/admin/metro/area/" + id,
        method: 'DELETE',
        data: { '_token': csrf }
    }).done(function () {
        $("#area_row_" + id).slideUp();
        deleteNotification();
    });

});

$('.edit-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $("#edit_modal form").attr("action", baseurl + "/admin/metro/area/" + id);
    var area_name = $("#area_row_" + id + " .area-name").text();
    $("#edit_name").text(area_name);
    $("#area_new_name_input").val(area_name);
});
