window.axios = require('axios');
window.$ = window.jQuery = require('jquery');
require('bootstrap');
window.Swal = require('admin-lte/plugins/sweetalert2/sweetalert2.all.min')
require('admin-lte')
// window._ = require('lodash');

// khởi tạo axios để request với nội bộ
axiosInternal = axios.create({
    timeout: 5000,
});

axiosInternal.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axiosInternal.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
window.axiosInternal = axiosInternal;

// khởi tạo axios để request với bên ngoài
axiosExternal = axios.create({
    timeout: 10000
});

window.axiosExternal = axiosExternal;
