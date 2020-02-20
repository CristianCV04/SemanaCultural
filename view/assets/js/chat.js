$(document).on("ready", function () {
    alert("wew");
    registerMessages();
    $.ajaxSetup({
        "cache": false
    });
    setInterval("loadOldMessages()", 500);
});

var registerMessages = function () {
    $("#send").on("click", function (e) {
        e.preventDefault();
        var frm = $("#formChat").serialize();
        $.ajax({
            type: "POST",
            url: "../action/registrarmensaje.php",
            data: frm
        }).done(function (info) {
            $("#message").val("");
            var altura = $("#conversation").prop("scrollHeight");
            $("#conversation").scrollTop(altura);
            console.log(info);
        })
    });
}

var loadOldMessages = function () {
    $.ajax({
        type: "POST",
        url: "../action/mostrarmensaje.php"
    }).done(function (info) {
        $("#conversation").html(info);
        $("#conversation p:last-child").css({
            "background-color": "lightgreen",
            "padding-botton": "20px"
        });
        var altura = $("#conversation").prop("scrollHeight");
        $("#conversation").scrollTop(altura);
    });
}