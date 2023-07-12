function formValidation() {
    let passid = document.form1.password;
    let cfrpass = document.form1.confirm_password;
    let uname = document.form1.username;
    let uemail = document.form1.email;
    if (userid_validation(uname, 5, 12)) {
        if (allLetter(uname)) {
            if (ValidateEmail(uemail)) {
                if (passid_validation(passid, 7, 12)) {
                    if (password_validation(passid, cfrpass)) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

function userid_validation(uname, mx, my) {
    let uname_len = uname.value.length;

    if (uname_len === 0 && uname_len >= my && uname_len < mx) {
        alert("User Id should not be empty / length be between " + mx + " to " + my);
        uname.focus();
        return false;
    }
    return true;
}

function passid_validation(passid, mx, my) {
    let passid_len = passid.value.length;
    if (passid_len == 0 || passid_len >= my || passid_len < mx) {
        alert("Password should not be empty / length be between " + mx + " to " + my);
        passid.focus();
        return false;
    }
    return true;
}

function password_validation(passid, cfrpass) {
    if (cfrpass != passid) {
        alert("Confirm password and password doesn't match");
        return false;
    }
    return true;
}

function allLetter(uname) {
    let letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters)) {
        return true;
    } else {
        alert('Username must have alphabet characters only');
        uname.focus();
        return false;
    }
}

function alphanumeric(uadd) {
    let letters = /^[0-9a-zA-Z]+$/;
    if (uadd.value.match(letters)) {
        return true;
    } else {
        alert('User address must have alphanumeric characters only');
        uadd.focus();
        return false;
    }
}

function countryselect(ucountry) {
    if (ucountry.value == "Default") {
        alert('Select your country from the list');
        ucountry.focus();
        return false;
    } else {
        return true;
    }
}


function ValidateEmail(uemail) {
    let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.value.match(mailformat)) {
        return true;
    } else {
        alert("You have entered an invalid email address!");
        uemail.focus();
        return false;
    }
}

function validsex(umsex, ufsex) {
    x = 0;

    if (umsex.checked) {
        x++;
    }
    if (ufsex.checked) {
        x++;
    }
    if (x === 0) {
        alert('Select Male/Female');
        umsex.focus();
        return false;
    } else {
        alert('Form Succesfully Submitted');
        window.location.reload()
        return true;
    }
}