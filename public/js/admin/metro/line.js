$('.delete-btn').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: baseurl + "/admin/metro/line/" + id,
        method: 'DELETE',
        data: { '_token': csrf }
    }).done(function () {
        $("#line_row_" + id).slideUp();
        deleteNotification();
    });

});

$('.edit-btn').click(function () {
    var id = $(this).data('id');
    $("#edit_modal form").attr("action", baseurl + "/admin/metro/line/" + id);
    var line_name = $("#line_row_" + id + " .line-name").text();
    $("#edit_name").text(line_name);
    $("#line_new_name_input").val(line_name);
});

$('.line-name a').click(function () {
    var id = $(this).data('id');
    var line_name = $(this).text();
    $('#view_name').text(line_name);
    $('.view_modal_edit_btn').attr('href', baseurl + '/admin/metro/line/edit/' + id);
    $.get(baseurl + '/admin/metro/line/description/' + id, {}, function (data) {
        $('#view_description').html(data);
    });
});

