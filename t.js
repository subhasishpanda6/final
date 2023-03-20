(function () {
  function checkTime(i) {
    return i < 10 ? "0" + i : i;
  }

  function startTime() {
    var today = new Date(),
      h = checkTime(today.getHours()),
      m = checkTime(today.getMinutes()),
      s = checkTime(today.getSeconds());
    document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
    t = setTimeout(function () {
      startTime();
    }, 500);
  }
  startTime();
})();

// or
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  h = setTwelveHour(h);
  forTimeDisplay.innerHTML = h + ":" + m + ":" + s + " " + setMeridiem(h);
  setInterval(function () {
    startTime();
  }, 500);
}
startTime();

//or
function realtime() {
  let time = moment().format("h:mm:ss a");
  document.getElementById("time").innerHTML = time;

  setInterval(() => {
    time = moment().format("h:mm:ss a");
    document.getElementById("time").innerHTML = time;
  }, 1000);
}

realtime();
//   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>

//   <div id="time"></div>

//or
var d = new Date();
let localtime = d.toLocaleTimeString("en-US", { hour12: true });
console.log(localtime);
