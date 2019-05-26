
document.getElementById('registration').addEventListener("click", function() {
	document.querySelector('.bg-modal-container').style.display = "flex";
});
document.getElementById('hint').addEventListener("click", function() {
	document.querySelector('.bg-modal-container').style.display = "none";
});

$(function() {
  var elemCount = 2;
  var current = 1;
  var elemWidth = 500;
  var move = 0;
  $('.next').click(function() {
    if (current < elemCount) {
      $('.slider .thumbs').toggleClass('move');
      move += elemWidth;
    	$('.slider .thumbs').css('transform', 'translateX(-'+move+'px)');
      current++;
    } else {
      move = 0;
      current = 1;
      
    }
  });
});  



