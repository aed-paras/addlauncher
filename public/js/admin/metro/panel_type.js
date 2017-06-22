$('.delete-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: baseurl + "/admin/metro/panel_type/" + id,
        method: 'DELETE',
        data: { '_token': csrf }
    }).done(function () {
        $("#panel_type_row_" + id).slideUp();
        deleteNotification();
    });

});

$('.edit-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $("#edit_modal form").attr("action", baseurl + "/admin/metro/panel_type/" + id);
    var panel_type_name = $("#panel_type_row_" + id + " .panel_type-name").text();
    $("#edit_name").text(panel_type_name);
    $("#panel_type_new_name_input").val(panel_type_name);
});
