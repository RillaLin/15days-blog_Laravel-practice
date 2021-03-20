require('./bootstrap');

document.deletePost = function(id){
    let result = confirm('Do you want to delete the post?');
    if(result){
        let actionUrl = '/posts/'+id;
        $('#delete-form').attr('action',actionUrl).submit();  //用http方式做刪除
    }
};

