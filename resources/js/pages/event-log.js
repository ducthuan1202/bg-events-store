// https://sweetalert2.github.io/#examples

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

function getEvenLogDetail(url) {

    axiosInternal.get(url)
        .then(function (response) {
            const {data, success} = response.data;
            if (success) {
                $('#modal').html(data).modal('show');
            }
        })
        .catch(function (error) {
            console.log(error);

            Toast.fire({
                icon: 'error',
                title: 'Get detail event log fail.'
            })
        })
        .then(function () {

        });
}

$(function(){
    $('#data-table').on('click', 'a[data-role="get-detail-event-log"]', function () {
        getEvenLogDetail($(this).data('url'))
    });
})
