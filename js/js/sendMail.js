$(document).ready(function(){
    $("#sendMail").click(function(){
        let userObj = {
            name: document.querySelector('#name').value,
            email: document.querySelector('#email').value,
            phone: document.querySelector('#phone').value,
            date: document.querySelector('#date').value,
            nPeople: document.querySelector('#nPeople').value,
        }
        for(let key in userObj){
            if(userObj[key] === '') {
                $("#sendMailText").html("Please fill in the complete details");
                return;
            }
        }
        $("#sendMail").html('Sending...');
        console.log(userObj);
      $.post("sendmail.php", userObj)
      .done(function(result){
           console.log("success")
                console.log(result)
                $("#sendMail").html('Submit');
                $("#sendMailText").html("Thank you For Submitting Your Request. Our Team Members Will Reach You Soon");
                document.querySelector('#name').value = '';
                document.querySelector('#email').value = '';
                document.querySelector('#phone').value = '';
                document.querySelector('#date').value = '';
                document.querySelector('#nPeople').value = '';
               
               setTimeout(()=> {
                    $("#sendMailText").html("");
                }, 5000);
      })
    .fail(function(xhr, status, error) {
        console.log("error")
                console.log(result)
                $("#sendMail").html('Submit');
                $("#sendMailText").html("Error. Please call us or whatsapp");
    });
    
       
        
        return false;
    });
  });