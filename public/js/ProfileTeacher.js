$(function() {
  var elemCount = 2;
  var current = 1;
  var elemWidth = 1245;
  var move = 0;
  $('.next').click(function() {
    if (current < elemCount) {
      $('.course-slider .course-thumbs').toggleClass('move');
      move += elemWidth;
    	$('.course-slider .course-thumbs').css('transform', 'translateX(-'+move+'px)');
      current++;
    } else {
      move = 0;
      current = 1;
      $('.course-slider .course-thumbs').css('transform', 'translateX('+move+'px)');
    }
  });
  $('.prev').click(function() {
    if (current > 0) {
      $('.course-slider .course-thumbs').toggleClass('move');
      move -= elemWidth;
    	current--;
    	$('.course-slider .course-thumbs').css('transform', 'translateX(-'+move+'px)');
    }
  });
})