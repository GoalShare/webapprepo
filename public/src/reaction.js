var postId = 0;

$(document).ready(function(){
  $(".reaction").on("click",function(event){   // like click
      event.preventDefault();
	var data_reaction = $(this).attr("data-reaction");
      postId = this.id;
	  console.log(data_reaction);
      console.log(postId);


      $.ajax({
          method: 'POST',
          url: emolLike,
          data: {data_reaction: data_reaction, postId: postId, _token: token}
      })


	if(data_reaction == "Like")
	  $(".like-emo").html('<span class="like-btn-like"></span>');

	else
	  $(".like-emo").html('<span class="like-btn-like"></span><span class="like-btn-'+data_reaction.toLowerCase()+'"></span>');
      $(".like-details").html("You, Sanka Rajapaksha and 2 others");
      $(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass('like-btn-'+data_reaction.toLowerCase());
      $(".like-btn-text").text(data_reaction).removeClass().addClass('like-btn-text').addClass('like-btn-text-'+data_reaction.toLowerCase()).addClass("active");;

  });

  $(".like-btn-text").on("click",function(event){ // undo like click
      event.preventDefault();
      var data_reaction = $(this).attr("data-reaction");
      postId = this.id;
      console.log(data_reaction);
      console.log(postId);

      $.ajax({
          method: 'POST',
          url: emolLike,
          data: {data_reaction: data_reaction, postId: postId, _token: token}
      })

	  if($(this).hasClass("active")){
		  $(".like-btn-text").text("Like").removeClass().addClass('like-btn-text');
		  $(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass("like-btn-default");
		  $(".like-emo").html('<span class="like-btn-like"></span>');
		  $(".like-details").html("Sanka Rajapaksha and 1k others");
		  
	  }



  })

  
});