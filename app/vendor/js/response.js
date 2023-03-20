"use strict";
let htmlElement = `<div class="res-msg-container">
                        <p class="res-msg"></p>
                </div>`;

let parentContainerElement;
let msgElement ;
const colorDanger = "#dc7777";
const colorSuccess =  "#28a745";
const colorAlert =  "#ffba00";

// initiazation the elements
function init(){
  document.body.insertAdjacentHTML("afterbegin", htmlElement);
  parentContainerElement = document.querySelector(".res-msg-container");
  msgElement = document.querySelector(".res-msg");
}


// clear the msg after this time
function clearMsgAfter(time){
  return (Number.isInteger(Number(time)) ? time : 3000);
}

// for success msg
function success(msg,time){
  init();
  parentContainerElement.classList.add("active-res-msg");
  parentContainerElement.style.background = colorSuccess;
  msgElement.innerText = msg;
  clearTheMsg(clearMsgAfter(time));
}

// for error msg
function error(msg, time){
  init();
  parentContainerElement.classList.add("active-res-msg");
  parentContainerElement.style.background = colorDanger;
  msgElement.innerText = msg;
  clearTheMsg(clearMsgAfter(time));
}
// for warning msg
function warnMsg(msg, time){
  init();
  parentContainerElement.classList.add("active-res-msg");
  parentContainerElement.style.background = colorAlert;
  msgElement.innerText = msg;
  clearTheMsg(clearMsgAfter(time));
}

// clear the message
function clearTheMsg(time){
  let t = setTimeout(function () {
    parentContainerElement.classList.remove("active-res-msg");
    clearTimeout(t);
  }, time);
  let t1 = setTimeout(function () {
    parentContainerElement.remove();
    clearTimeout(t1);
  }, (Number(time)+1000));
};

