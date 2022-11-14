const form = document.querySelector(".typingArea"),
inputMsg = form.querySelector(".inputMsg"),
sendBtn = form.querySelector("#arrow"),
chatBox = document.querySelector(".messages");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertChat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                inputMsg.value = "";
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "getChat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);