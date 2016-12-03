
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    next();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

$(document).on('ajax:success', '.btn[data-remote]', function(e, data, status, xhr) {
 
  var target = $('#modal');
  target.find('.modal-body').html(xhr.responseText);
  target.modal('show');
 
  target.on('ajax:success', 'form[data-remote]', function(e, data, status, xhr) {
    $('#content').html(xhr.responseText);
    target.modal('hide');
  });
 
  target.on('ajax:error', 'form[data-remote]', function(e, data, status, xhr) {
    target.find('#alert-box')
      .show()
      .find('ul')
      .html(toList(data.responseJSON));
  });
 
});
 
function toList(messages) {
  var converted = '';
  $.each(messages, function(key, value)
  {
    converted += '<li>' + value + '</li>';
  });
  return converted;
}
//# sourceMappingURL=app.js.map
