//Frontend like system
$(document).ready(function(){
    $(".like").click(function(){
        $(this).css("background-color", "#ffd6ed");
        $(this).removeClass("like");
        $(this).addClass("liked");

        var postid = $(this).attr('id');
        var count= $(this).attr('count');
        var count = Number(count) + Number(1);
        $(this).html('<a href="javascript:void(0)">'+count+'</a>');

        //Saving likes in database with ajax.
        
        axios.post('/user/post/like', {
            post_id: postid,
            updateLikes: count
          })
          .then(function (response) {
          })
          .catch(function (error) {
            
          });
          

    });
  });


