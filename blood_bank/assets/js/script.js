"use strict";
// get current page url
// date and time
let dateObj = new Date();
let year = dateObj.getFullYear();
let month = dateObj.getMonth();
let date = dateObj.getDate();
let hour = dateObj.getHours();
let minute = dateObj.getMinutes();
let second = dateObj.getSeconds();
const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
// weekdays array
const weekdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
minute = minute < 10 ? `0${minute}` : minute;
second = second < 10 ? `0${second}` : second;
// return current date
function currentDate() {
  return date < 10 ? `0${date}` : date;
}

//return current Month
function currentMonth() {
  return month < 10 ? `0${month + 1}` : month + 1;
}
// this will return today's date
function todayDate() {
  return `${currentDate()}/${currentMonth()}/${year}`;
}

// it will retrun meridiem pm or am
function setMeridiem(hour) {
  return hour >= 12 ? "PM" : "AM";
}

//it will return for 12 hourse time like 1:30
function setTwelveHour(hour) {
  if (hour > 12) {
    return hour - 12;
  } else if (hour === 0) {
    return 12;
  } else {
    return hour;
  }
}

// it will return currrent time

//select the elememt from html and show the date and time
// let forTimeDisplay = document.querySelector(".time-display");
// let forDateDisplay = document.querySelector(".date-display");

// //for date
// forDateDisplay.innerHTML = `<b>${todayDate()}</b>`;

// setInterval(function () {
//   forTimeDisplay.innerHTML = new Date().toLocaleTimeString();
// }, 1000);


// // time sloats
// const timeSloatElemets = document.querySelectorAll(".timining");
// const scheduleTimings = document.querySelector(".scheduletimings");
// let timining = [];
// if(timeSloatElemets != null){
//   // timeSloatElemets.addEventListener("click",function(){
//   //   scheduleTimings.innerHTML = ` <h5 class="my-3"><strong>Schedule Timings</strong></h5>`;
//   // })
//   // timeSloatElemets.addEventListener("click",function(e){
//   //   console.log(this.innerHTML)
//   // })
// timeSloatElemets.forEach(function(elememt){
//   elememt.addEventListener("click",function(){
//     if(elememt.checked){
//       console.log(elememt.value)
//       pr(elememt.value)
//     }else{
//       pr(elememt.value)
//     }
    
//   })
// });

// }
//  function pr(data){
//    if(timining.includes(data)){
//     let indexValue = timining.indexOf(data);
//     timining.splice(indexValue,1);
//     console.log(timining);
//     return;
//    }
//   timining.push(data);
//   console.log(timining);
//  }
