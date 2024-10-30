function resetToastPosition() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center');
    $(".jq-toast-wrap").css({
        "top": "",
        "left": "",
        "bottom": "",
        "right": ""
    });
}