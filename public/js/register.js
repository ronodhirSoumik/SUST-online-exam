var accountType;

document.getElementById('registration').addEventListener("click", function() {
	document.querySelector('.bg-modal-container').style.display = "flex";
});
document.getElementById('hint').addEventListener("click", function() {
	document.querySelector('.bg-modal-container').style.display = "none";
});

document.getElementById('nexta').addEventListener("click", function() {
      if (accountType== 1) {
document.location.href = "http://localhost/quiz_semi/public/login";

  }
  else if (accountType == 0) {
document.location.href = "http://localhost/quiz_semi/public/login";
}
});  




$(function() {
  var rd1= document.getElementById("rd1");
  var rd2= document.getElementById("rd2");
  var elemCount = 3;/* use 3*/
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
      document.getElementById("form2").action = "insert1";
      document.getElementById("Accountq1").placeholder="Student Name";      
      document.getElementById("Accountq2").placeholder="Registration No.";
      document.getElementById("Accountq3").placeholder="Department";
      document.getElementById("Accountq4").placeholder="Session";
      document.getElementById("Accountq5").placeholder="Semester";

     }     

     if(rd2.checked==true){
      accountType = 1;
      document.getElementById("form2").action = "insert2";
      document.getElementById("Accountq1").placeholder="Teacher Name";
      document.getElementById("Accountq2").placeholder="Department";
      document.getElementById("Accountq3").placeholder="Designation";
      document.getElementById("Accountq4").style.display= "none";
      document.getElementById("Accountq5").style.display= "none";
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



