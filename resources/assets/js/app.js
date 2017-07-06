$(window).ready(function () {
    $(".horario").mask('00:00:00');
    $(".data-calender").mask('00-00-0000');
})

$('#dias a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
})