
if (document.getElementById('liveClock')) {
  setInterval(() => {
    const date = new Date();
    const time = date.getHours() + ':' + checkTime(date.getMinutes()) + ':' + checkTime(date.getSeconds());
    document.getElementById('liveClock').innerHTML = time;
  }, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i}
  return i
}