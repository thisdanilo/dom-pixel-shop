jQuery(function () {
    //-----------------------------------------------------
    // Defining a variable
    //-----------------------------------------------------

    var token = $("input[name='_token']").val(),
        datatable_url = window.location.origin + "/js/datatable/pt-br.json",
        datatable_route = $("#datatable-route").val();

    //-----------------------------------------------------
    // Plugins
    //-----------------------------------------------------

    $(".money").mask("0.000.000.000.000.000.000,00", {
        reverse: true,
        placeholder: "R$ 0,00",
    });

    $(".stock").mask("0#");

    //-----------------------------------------------------
    // Instance of plugins
    //-----------------------------------------------------

    $("#dataTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: datatable_route,
            type: "POST",
            beforeSend: function (request) {
                return request.setRequestHeader("X-CSRF-Token", token);
            },
        },
        columns: [
            {
                data: "name",
            },
            {
                data: "price",
            },
            {
                data: "stock",
            },
            {
                data: "action",
                searchable: false,
                orderable: false,
            },
        ],
        language: {
            url: datatable_url,
        },
    });
});
