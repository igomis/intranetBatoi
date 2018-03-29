$(function () {
    $('#espacio_id').change(function () {
        var espacio = $("#espacio_id").val();
        var token = $("#_token").text();
        $.ajax({
            method: "GET",
            url: "/api/material/espacio/" + espacio,
            data: {api_token: token},
        })
        .then(function (result) {
            $("#material_id").empty().append("<option value=0>Escoge un material</option>")
            $(result).each(function (i, item) {
                $("#material_id").append("<option value='" + item.id + "'>" + item.descripcion + "</option>");
            });
        }, function (result) {
            console.log("La solicitud no se ha podido completar.");
        });
    });
    $('#material_id').change(function () {
        var idMaterial = $("#material_id").val();
        $("#descripcion_id").empty().val($("#material_id").find("option:selected").text());
    });
});


