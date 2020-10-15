$(document).ready(function () {
    $("div.alert").delay(3000).slideUp();
});

function ConfirmDel(msg) {
    if (window.confirm(msg)) {
        return true;
    }
    return false;
}