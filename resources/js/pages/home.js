function getCountriesByGraphQL(){
    axiosExternal.post('https://countries.trevorblades.com/', {
        query: `
        query{
          continents{
            code
            name
          }
        }
    `,
        variables: {}
    })
        .then(function (response) {
            // handle success
            console.log('request external',response);
        })
        .catch(function (error) {
            // handle error
            console.log('request external',error);
        })
        .then(function () {
            // always executed
        });
}

function getUsers(){
    axiosInternal.post('/api/users', {
        id: 1,
        status: 0,
    })
        .then(function (response) {
            // handle success
            console.log('request internal', response);
        })
        .catch(function (error) {
            // handle error
            console.log('request internal',error);
        })
        .then(function () {
            // always executed
        });

}


// https://sweetalert2.github.io/#examples
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

function destroy(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Toast.fire({
                icon: 'success',
                title: 'Destroy Meetup success.'
            })
        }
    })
}


$(function(){

    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
            icon: 'success',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultInfo').click(function() {
        Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultError').click(function() {
        Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultWarning').click(function() {
        Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultQuestion').click(function() {
        Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });

    $('a[data-role="edit-meetup"]').on('click', function(){
        Toast.fire({
            icon: 'error',
            title: 'Update Meeting failure.'
        });
    });

    $('a[data-role="destroy-meetup"]').on('click', function(){
        destroy();
    });
})
