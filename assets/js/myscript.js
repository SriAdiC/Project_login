const flashdata = $('.flash-data').data('flashdata');


if(flashdata) {
    Swal.fire({
        title: 'Good Job!',
        text: 'Your Data Has Been ' + flashdata,
        type: 'success'
    })
}
const info = $('.info').data('flashdata');


if(info) {
    Swal.fire({
        title: info,
        text: '',
        type: 'info'
    })
}

const access = $('.flash').data('access');


if(access) {
    Swal.fire({
        title: 'Access Changed!',
        text: '',
        type: 'success'
    })
}

const profile = $('.flash-msg').data('flashdata');


if(profile) {
    Swal.fire({
        title: profile,
        text: 'Your profile has been changed!',
        type: 'success'
    })
}

const password = $('.changepassword').data('flashdata');


if(password) {
    Swal.fire({
        title: password,
        text: 'Your password has been changed!',
        type: 'success'
    })
}

const error = $('.error').data('flashdata');


if(error) {
    Swal.fire({
        title: 'Oops.. Something Wrong!',
        text: error,
        type: 'error'
    })
}



// delete

$('.tombol').on('click', function (e) {

    const href = $(this).attr('href');

    e.preventDefault();

    const SwalButton = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary ml-4 mr-4'
        },
        buttonsStyling: false,
    })

    SwalButton.fire({
        title: 'Are you sure?',
        text: "Delete this menu!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if(result.value) {
            document.location.href = href;
        }
    })

});


$('.log-out').on('click', function (e) {

    const href = $(this).attr('href');

    e.preventDefault();


    Swal.fire({
        title: 'Are you sure to LogOut?',
        text: "You will to be logged out!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logged Out!'
    }).then((result) => {
        if(result.value) {
            document.location.href = href;
        }
    })
});

const login = $('.login').data('flashdata');

if(login) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500
    });

    Toast.fire({
        type: 'success',
        title: 'Signed in successfully'
    })
}

const logout = $('.logout').data('flashdata');

if(logout) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500
    });

    Toast.fire({
        type: 'success',
        title: 'Signed out successfully'
    })
}