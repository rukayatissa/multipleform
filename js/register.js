
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";

  // if(currentTab === 1){
  //   document.getElementById("PD").style.display = "none";
  // }
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("nextBtn").innerHTML = "Next";
    document.getElementById("preview").style.display = "none";
    document.getElementById("submit").style.display = "none";
  }else if (n == (x.length)-1) {
    document.getElementById("prevBtn").style.display = "inline";
    //document.getElementById("nextBtn").innerHTML = "submit";
    document.getElementById("preview").style.display = "inline";
    document.getElementById("submit").style.display = "inline";
    document.getElementById("nextBtn").style.display = "none";

  } else{
    document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("nextBtn").style.display = "inline";
    document.getElementById("preview").style.display = "none";
    document.getElementById("submit").style.display = "none";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    //document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  //This function deals with validation of the form fields
  var x, y,y2, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  y2 = x[currentTab].getElementsByTagName("select");
  
  // A loop that checks every select field in the current tab:
  for (i = 0; i < y2.length; i++) {
    // If a field is empty...
    if (y2[i].hasAttribute("required") && y2[i].options[y2[i].selectedIndex].value == "") {
      // add an "invalid" class to the field:
      
      y2[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }else{
      y2[i].classList.remove("invalid");
    }
  }
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" &&  y[i].hasAttribute("required")) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }else{
      y[i].classList.remove("invalid");
    }
  }
 
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  //return valid; // return the valid status
  return true;
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


function showInput(){
var myinputs = document.getElementsByClassName("inp");
var mylabels = document.getElementsByTagName("label");
document.getElementById("t2").innerHTML=""; 
for (i = 0; i < myinputs.length; i++) { 
 document.getElementById("t2").innerHTML += mylabels[i].innerText + " : " ;
  document.getElementById("t2").innerHTML += myinputs[i].value + "<br></br>";
      }
}

  
  