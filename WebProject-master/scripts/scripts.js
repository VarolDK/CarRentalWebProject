
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;
  $('input[name="datetimes"]').daterangepicker({
    "minDate": today,
    "opens": "center",
    "autoApply": true,
    "drops": "up"
  });
  



  function openForm() {
    document.getElementById("loginForm").style.display = "block";
  }

  function loginMessage() {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("login").style.display = "block";
  }

  function existMessage() {
    document.getElementById("regForm").style.display = "block";
    document.getElementById("register").style.display = "block";
  }

  function closeForm(id) {
    document.getElementById(id).style.display = "none";
  }

  function openRegForm() {
    closeForm("loginForm")
    document.getElementById("regForm").style.display = "block";
  }

  function loginName(name) {
    document.getElementById("loginButton").innerHTML = name;

  }
//---------------------------------Overlay
var carID,userID,timeTake,timeDrop,city,money;
function overlayYES(){
  overlayOFF();
  window.location.replace("controller/rentCar.php?carID="+carID+"&userID="+userID+"&takeTime="+timeTake+"&dropTime="+timeDrop+"&city="+city+"&money="+money);
  
}


function cancelRent(id){
  window.location.replace("controller/rentCancel.php?ID="+id);
  
}

function overlayON(cityID,IDuser,IDcar,brand,takeTime,dropTime,Cmoney) {
  document.getElementById("text").innerHTML = "<br> &nbsp Brand: "+brand.toUpperCase()+"<br><br> &nbsp Pick up Location: "+cityID+"  <br><br> &nbsp Pick up Date: "+takeTime+" <br><br> &nbsp Return Date "+dropTime;
  document.getElementById("overlay").style.display = "block";
  const date1 = new Date(takeTime);
  const date2 = new Date(dropTime);
  const diffTime = Math.abs(date2 - date1);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
  carID=IDcar;
  userID=IDuser;
  timeTake=takeTime;
  timeDrop=dropTime;
  city=cityID;
  money=Cmoney*diffDays;
}

function overlayOFF() {
  document.getElementById("overlay").style.display = "none";
  //window.location.replace("index.php");
}

//---------------------------------Slider

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

