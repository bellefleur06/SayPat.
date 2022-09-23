let myForm = document.querySelector('#myForm');
let message = document.querySelector('#message');
let count = document.querySelector('#count');
let error = document.querySelector('#error');
let send = document.querySelector('#send');
let limit = 300;
count.textContent = 0 + "/" + limit;

message.addEventListener("input", function() {
  let messageLength = message.value.length;
  count.textContent = messageLength + "/" + limit;
  
  if (messageLength > limit) {
    message.style.borderColor = "red";
    count.style.color = "red";
    send.setAttribute('disabled', '')
  } else {
    message.style.borderColor = "#ccc";
    count.style.color = "black";
    send.removeAttribute('disabled')
  }
});