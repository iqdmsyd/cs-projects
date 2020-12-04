
// Check between password field and confirm password field (for register page)

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

// Hide or show confirm password field (for register and login page)
function show_pass(){
    if (document.getElementById('password').type == "password"){
        document.getElementById('password').type = "text";
    } else if (document.getElementById('password').type == "text"){
        document.getElementById('password').type = "password";
    }
}

// Hide or show confirm password field (for register page)
function show_conf_pass(){
    if (document.getElementById('confirm_password').type == "password"){
        document.getElementById('confirm_password').type = "text";
    } else if (document.getElementById('confirm_password').type == "text"){
        document.getElementById('confirm_password').type = "password";
    }
}

//Error Message (for login page)
function notify(type){
    $.growl({
        message: "Maaf, username atau password yang anda masukkan salah"
    },{
        type: "danger",
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        // delay: 2500,
        animate: {
                enter: 'animated fadeInDown',
                // exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
};

// Registration Failed message
function notifyFailedRegister(type){
    $.growl({
        message: "Maaf registrasi gagal, harap perhatikan kembali data yang anda masukkan"
    },{
        type: "warning",
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        // delay: 2500,
        animate: {
                enter: 'animated fadeInDown',
                // exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
};

//Success Message (for login page after registration)
function notifyAfterRegister(type){
    $.growl({
        message: "Registrasi sukses, silahkan login disini"
    },{
        type: "success",
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        // delay: 2500,
        animate: {
                enter: 'animated fadeInDown',
                // exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
};

function notifyResetPasswordSuccess(type){
    $.growl({
        message: "Success, your password has been changed"
    },{
        type: "success",
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        // delay: 2500,
        animate: {
                enter: 'animated fadeInDown',
                // exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
};

// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}

//EVENT FILTER LIST
/*setInputFilter(document.getElementById("nip"), function(value) {
          return /^\d*$/.test(value); });*/
/*setInputFilter(document.getElementById("intLimitTextBox"), function(value) {
  return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); });
setInputFilter(document.getElementById("intTextBox"), function(value) {
  return /^-?\d*$/.test(value); });
setInputFilter(document.getElementById("floatTextBox"), function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); });
setInputFilter(document.getElementById("currencyTextBox"), function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
setInputFilter(document.getElementById("basicLatinTextBox"), function(value) {
  return /^[a-z]*$/i.test(value); });
setInputFilter(document.getElementById("extendedLatinTextBox"), function(value) {
  return /^[a-z\u00c0-\u024f]*$/i.test(value); });
setInputFilter(document.getElementById("extendedLatinAndSpaceTextBox"), function(value) {
  return /^[a-z\u0020\u00c0-\u024f]*$/i.test(value); });
setInputFilter(document.getElementById("hexTextBox"), function(value) {
  return /^[0-9a-f]*$/i.test(value); });*/