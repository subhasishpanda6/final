"use strict";
let htmlElement = `<div class="msg-container">
                        <p class="msg"></p>
                </div>`;

function response(msg, msg_type) {
  document.body.insertAdjacentHTML("afterbegin", htmlElement);

  let el = document.querySelector(".msg-container");
  let msgp = document.querySelector(".msg");

  if (msg_type === "danger" || msg_type === "failed" || msg_type === "error") {
    el.classList.add("active-msg");
    el.style.background = "#f48484";
    msgp.innerText = msg;
  } else if (msg_type === "success" || msg_type === "ok") {
    el.classList.add("active-msg");
    el.style.background = "#28a745";
    msgp.innerText = msg;
  }

  let t = setTimeout(function () {
    el.classList.remove("active-msg");
    clearTimeout(t);
  }, 3000);
  let t1 = setTimeout(function () {
    el.remove();
    clearTimeout(t1);
  }, 4000);
}
// response("successfully registerd", "success");
