/* <====== AJAX Setup ======> */
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});
/* <====== Show Modal ======> */
const showModal = (title, content) => {
    $("#modal-title").text(title);
    $("#modal-body").html(content);
    $("#modalId").show();
}
/* <====== Hide Modal ======> */
const hideModal = () => {
    $("#modalId").hide();
}
