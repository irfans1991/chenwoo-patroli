function checkPassword(){
    const password = document.querySelector("#password").value;
    const conf_password = document.querySelector("#confirm-password").value;
    console.log(password, conf_password);
    const message = document.querySelector(".pesan");

        if (password.lenght != 0) {
            if(password == conf_password){
                message.innerHTML = "passwords Match";
            }else{
                message.innerHTML = "Password Dont Match";
            }
            
        }
}

// const tombol = document.querySelector('.tombol');
// tombol.addEventListener('click', function(){
//     alert('ok');
// });