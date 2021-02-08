/******/ (() => { // webpackBootstrap
/*!*****************************************!*\
  !*** ./resources/js/pages/event-log.js ***!
  \*****************************************/
// https://sweetalert2.github.io/#examples
var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

function getEvenLogDetail(url) {
  axiosInternal.get(url).then(function (response) {
    var _response$data = response.data,
        data = _response$data.data,
        success = _response$data.success;

    if (success) {
      $('#modal').html(data).modal('show');
    }
  })["catch"](function (error) {
    console.log(error);
    Toast.fire({
      icon: 'error',
      title: 'Get detail event log fail.'
    });
  }).then(function () {});
}

$(function () {
  $('#data-table').on('click', 'a[data-role="get-detail-event-log"]', function () {
    getEvenLogDetail($(this).data('url'));
  });
});
/******/ })()
;