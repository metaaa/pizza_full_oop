$('.card a').click(function(){
    //event.preventDefault();
    $('article').animate({height: "toggle", opacity: "toggle"}, "slow");
});
