function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value && 
            document.getElementById('password').value != "") {
        document.getElementById('submit').disabled = false;
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Password Cocok';
        document.getElementById('submit').classList.remove("disabled");
    } else {
        document.getElementById('submit').classList.add("disabled");
        document.getElementById('submit').disabled = true;
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password Tidak Cocok';
    }
}

function show_pass(){
    if (document.getElementById('password').type == "password"){
        document.getElementById('password').type = "text";
    } else if (document.getElementById('password').type == "text"){
        document.getElementById('password').type = "password";
    }
}

function show_conf_pass(){
    if (document.getElementById('confirm_password').type == "password"){
        document.getElementById('confirm_password').type = "text";
    } else if (document.getElementById('confirm_password').type == "text"){
        document.getElementById('confirm_password').type = "password";
    }
}