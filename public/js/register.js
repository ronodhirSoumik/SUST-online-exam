var accountType;

document.getElementById('registration').addEventListener("click", function() {
	document.querySelector('.bg-modal-container').style.display = "flex";
});
document.getElementById('hint').addEventListener("click", function() {
	document.querySelector('.bg-modal-container').style.display = "none";
});

document.getElementById('nexta').addEventListener("click", function() {
      if (accountType== 1) {
document.location.href = "http://localhost/SUSTEXAM/public/register";

  }
  else if (accountType == 0) {
document.location.href = "http://localhost/SUSTEXAM/public/student";
}
});  




$(function() {
  var rd1= document.getElementById("rd1");
  var rd2= document.getElementById("rd2");
  var elemCount = 3;
  var current = 1;
  var elemWidth = 500;
  var move = 0;
  $('.next').click(function() {

    if (current < elemCount) {
      $('.slider .thumbs').toggleClass('move');
      move += elemWidth;
    	$('.slider .thumbs').css('transform', 'translateX(-'+move+'px)');
      current++;

      if (current == 2) {
         document.querySelector('.bg-modal-container .chooseType').style.display = "flex";
      }

     if(rd1.checked==true){
      accountType = 0;
      document.getElementById("Accountq1").placeholder="Student Id";      
      document.getElementById("Accountq2").placeholder="Student Year";
      document.getElementById("Accountq3").placeholder="Student Semester";
      document.getElementById("Accountq4").placeholder="Student Question";
      document.getElementById("Accountq5").placeholder="Student Question2";

     }     

     if(rd2.checked==true){
      accountType = 1;
      document.getElementById("Accountq1").placeholder="Teacher Id";
      document.getElementById("Accountq2").placeholder="Teacher Designation";
      document.getElementById("Accountq3").placeholder="Teacher Question";
      document.getElementById("Accountq4").placeholder="Teacher Question1";
      document.getElementById("Accountq5").placeholder="Teacher Question2";
     }

      if (current == elemCount) {
         document.querySelector('.bg-modal-container .chooseType').style.display = "none";
         document.querySelector('.bg-modal-container .next').style.display = "none";
      }

      
    } else {
      move = 0;
      current = 1;
     
    }
  });
});  

// function fnc() {

//       if (accountType== 1) {
// document.location.href = "http://localhost/SUSTEXAM/public/register";

//   }
//   else if (accountType == 0) {
// document.location.href = "http://localhost/SUSTEXAM/public/student";
     
//     }
//   }



