const bx = document.getElementById('Bx');
const input = document.getElementById('Input');
bx.addEventListener("click", function(){
    if(input.type == "password"){
        input.type = "text"
        bx.style.opacity=2.0
    }else{
        input.type = "password"
        bx.style.opacity=1.2
    }
})
