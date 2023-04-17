"use stict";
// let requestFor =  document.getElementById("input_for") 
// let bloodDonation = document.querySelector(".form-blood-donation");
// let bloodRequest = document.querySelector(".form-blood-request");
// let donationExectue = false;
// let requestExectue = false;

// let date = new Date();
// let year = date.getFullYear();
// let month = date.getMonth() < 10 ? `0${date.getMonth() + 1}` : date.getMonth() + 1;
// let currentDate = date.getDate() < 10 ? `0${date.getDate()}` : date.getDate();
// let today = `${year}-${month}-${currentDate}`;

// // disable past date
// if(document.getElementById("input_date") !== null){
// document.getElementById("input_date").setAttribute("min", today);
// }

// // post 
// function xharPOST(url, param) {
//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", url, true);
//     xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  
//     xhr.onload = function () {
//       let response = xhr.responseText;
//       console.log(response);
//     };
  
//     if (param !== '') {
//       xhr.send(param);
//     }
//   }
// // show the form according to request for value
// if(requestFor !== null){
//     requestFor.addEventListener("click", function (e) {
//         let getValue = requestFor.value;
//         if (getValue === "blood_donation") {        
//             requestExectue = false;
//             bloodDonation.style.display = "block";
//             bloodRequest.style.display = "none";
//             donationExectue = true;
//         } else if (getValue === "blood_request") {
//             donationExectue = false;
//             bloodRequest.style.display = "block";
//             bloodDonation.style.display = "none";
//             requestExectue = true;
//         }
//          else {
//             bloodRequest.style.display = "none";
//             bloodDonation.style.display = "none";
           
//         }
//     });
// }
// popup
let resPopUp=document.querySelector(".res-popup");
let resPopupMsg = document.querySelector(".res-pop-msg");


function popup(msg){
  resPopUp.classList.add("active");
  resPopupMsg.innerText = msg;
}

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function ChangeUrl( url) {
  if (typeof (history.pushState) != "undefined") {
    // var obj = { Url: url };
          history.pushState("", "", url);
      }

  }

///>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  function getParamValues(param){
    // console.log(window.location.search);
    var meyKeyValues= window.location.search;
    var urlParam = new URLSearchParams(meyKeyValues);
    var paramValue = urlParam.get(param);
    return paramValue;
  }