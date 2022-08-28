
document.getElementById("newpsw2").onkeyup = function() {
    var newpsw1 = document.getElementById("newpsw").value;
    var newpsw2 = document.getElementById("newpsw2").value;
    if(newpsw1 !== newpsw2){
      document.getElementById("pswMatch").style.display = "block";
      document.getElementById("registerbtn").disabled = true;
    }else{
        document.getElementById("pswMatch").style.display = "none";
        document.getElementById("registerbtn").disabled = false;
    }
  }

  document.getElementById("email2").onkeyup = function() {
    var newemail1 = document.getElementById("email1").value;
    var newemail2 = document.getElementById("email2").value;
    if(newemail1 !== newemail2){
      document.getElementById("emailMatch").style.display = "block";
      document.getElementById("emailbtn").disabled = true;
    }else{
        document.getElementById("emailMatch").style.display = "none";
        document.getElementById("emailbtn").disabled = false;
    }
  }
