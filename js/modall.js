function showModall(card) {
    $("#" + card).show();
    $(".modall").addClass("show");
}

function closeModall() {
    $(".modall").removeClass("show");
    setTimeout(function() {
        $(".modall .modall-card").hide();
    }, 300);
}

function loading(status, tag) {
    if (status) {
        $("#loading .tag").text(tag);
        showModal("loading");
    } else {
        closeModal();
    }
}

function showMessage(message) {
    $("#Message .tag").text(message);
    showModal("Message");
}