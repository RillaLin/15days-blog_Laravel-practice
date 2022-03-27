/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $.ajax({
  
  });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


toggleCommentForm = function(e){
    $(e.currentTarget).closest('.comment-info').siblings('.comment-body').toggleClass('edit');  //把comment-body的class改成edit
};

deleteComment = function(e){
    let result = confirm('delete comment?');
    
    let action = $(e.currentTarget).data('action');
    let comment = $(e.currentTarget).closest('.media');
    if(result){
        $.post(action,{
            _method:'delete',
        }).done(function(data){
            comment.remove();
        });
    }
};

//用ajax code做comment update
$('form.update-comment').submit(function(e){
    e.preventDefault();

    let comment = $(e.currentTarget).find('[name="comment"]').val();

    $.post($(e.currentTarget).attr('action'),{
        _method:'put',
        comment:comment,
    }).done(function(data){
        $(e.currentTarget).closest('.comment-body').toggleClass('edit');
        $(e.currentTarget).siblings('p').html(comment);
    });
});






