$(document).ready(function(){
  console.log('successfuly disliked');
    $("#liked").click(function(e){
      alert($(this).parent().data('value'));
      /*var answer_id=$(this).val();
      var likeid="#like"+answer_id;
      e.preventDefault();
      $.ajax({
            method: 'POST',
            url:url1,
            data:{'u':$('#user_id').val(),'a':answer_id,'_token':token},
            success: function(data){
                    $(likeid).text(data.join(' '));

            }
        });*/
    });

    $(".disliked").click(function(e){
          alert($(this).parent().data('value'));
      /*var answer_id=$(this).val();
      var dislikeid="#dislike"+answer_id;
      e.preventDefault();
      $.ajax({
            method: 'POST',
            url:url2,
            data:{'u':$('#user_id').val(),'a':answer_id,'_token':token},
            success: function(data){
                       $(dislikeid).text(data['downvotes']);

            }
        });*/
    });
});
