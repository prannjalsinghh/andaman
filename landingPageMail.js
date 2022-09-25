$(document).ready(function(){
  $("#sendMail").click(function(){
      let userObj = {
          name: document.querySelector('#name').value,
          email: document.querySelector('#email').value,
          phone: document.querySelector('#contactNumber').value,
          nPeople: document.querySelector('#nPeople').value,
          date: document.querySelector('#date').value,
      }
      for(let key in userObj){
          if(userObj[key] === '') {
              $("#sendMailText").html("Please fill in the complete details");
              return;
          }
      }
      $("#sendMail").html('Sending...');
      console.log(userObj);
    $.ajax(
      {
          url: "landingpage.php",
          dataType: "json",
          data: userObj,
          method: "POST",
          success: function(result){
              $("#sendMail").html('Submit');
              $("#sendMailText").html("Thank you. We will contact you soon.");
              document.querySelector('#name').value = '';
              document.querySelector('#email').value = '';
              document.querySelector('#contactNumber').value = '';
              document.querySelector('#nPeople').value = '';
              document.querySelector('#date').value = '';
              setTimeout(()=> {
                  location.reload();
              },1000);
          },
          error: function(result){
              $("#sendMail").html('Submit');
              $("#sendMailText").html("Error. Please call us.");
          },
      });
  });
});
