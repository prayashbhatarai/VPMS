/*
+---------------------------------[validation.js]---------------------------------+
| This JS file is part of our project which validate the Login & Register Form  |
+-------------------------------------------------------------------------------+
|                Author : Prashant Bhandari & Prayash Bhattrai                  |
+-------------------------------------------------------------------------------+
*/

/*
+---------------------------------------------+
| This function shows the validation error    |
+---------------------------------------------+
*/
function printError(id, feedbackid, error) {
    let element = document.getElementById(id);
    let feedback = document.getElementById(feedbackid);
    element.className = "form-control is-invalid";
    feedback.style.display = "block";
    feedback.className = "invalid-feedback";
    feedback.innerText = error;
    console.log("Validation Message Printed");
}
/*
+---------------------------------------------+
| This function clears the validation error   |
+---------------------------------------------+
*/
function clearError(id, feedbackid) {
    let element = document.getElementById(id);
    let feedback = document.getElementById(feedbackid);
    element.className = "form-control is-valid";
    feedback.style.display = "none";
    feedback.innerText = "";
    console.log("Validation Message Cleared");
}

/*
+------------------------------------------------------------+
| This function checks whether the password is valid or not  |
+------------------------------------------------------------+
*/
function validatePassword(firstPassword, secondPassword) {
    fp = firstPassword;
    sp = secondPassword;
    if ((fp.length >= 8 && fp.length <= 32) && (sp.length >= 8 && sp.length <= 32)) {
        if (fp == sp) {
            return (true);
        }
        else {
            return (false);
        }
    }
    else {
        return (false);
    }

}

/*
+---------------------------------------------+
| This function validates Login Form          |
+---------------------------------------------+
*/

function validateLogIn() {
    let returnVal = true;
    let e = document.getElementById("email").value;
    let p = document.getElementById("password").value;
    if (validateEmail(e) == false) {
        printError("email", "emailfeedback", "Invalid Email");
        returnVal = false;
    }
    else {
        clearError("email", "emailfeedback");
    }
    if (!(p.length >= 8 && p.length <= 32)) {
        printError("password", "passwordfeedback", "Password must be 8 - 32 character");
        returnVal = false;
    }
    else {
        clearError("password", "passwordfeedback");
    }
    return returnVal;
}

/*
+------------------------------------------------+
| This function validates Register Form          |
+------------------------------------------------+
*/

// function validateRegister() {
//     let un = document.getElementById("username").value;
//     let p = document.getElementById("password").value;
//     let rp = document.getElementById("retypepassword").value;
//     let unf = document.getElementById("usernamefeedback");
//     let pf = document.getElementById("passwordfeedback");
//     let rpf = document.getElementById("retypepasswordfeedback");
//     let returnVal = true;
//     if (un == "") {
//         printError("username", "usernamefeedback", "User Name cannot be Empty");
//         returnVal = false;
//     }
//     else {
//         clearError("username", "usernamefeedback");
//     }
//     if (!(p == rp)) {
//         printError("password", "passwordfeedback", "Password Not Matched");
//         printError("retypepassword", "retypepasswordfeedback", "Password Not Matched");
//         returnVal = false;
//     }
//     else {
//         // clearError("password", "retypepasswordfeedback");
//         // clearError("retypepassword", "retypepasswordfeedback");
//     }
//     if (!(p.length >= 8 && p.length <= 32)) {
//         printError("password", "passwordfeedback", "Password must be 8 - 32 character");
//         returnVal = false;
//     }
//     else {
//         clearError("password", "passwordfeedback");
//     }
//     if (!(rp.length >= 8 && rp.length <= 32)) {
//         printError("retypepassword", "retypepasswordfeedback", "Password must be 8 - 32 character");
//         returnVal = false;
//     }
//     else {
//         clearError("retypepassword", "retypepasswordfeedback");
//     }
//     return returnVal;
// }

function validateRegister() {
    let un = document.getElementById("username").value;
    let p = document.getElementById("password").value;
    let rp = document.getElementById("retypepassword").value;
    let unf = document.getElementById("usernamefeedback");
    let pf = document.getElementById("passwordfeedback");
    let rpf = document.getElementById("retypepasswordfeedback");
    let returnVal = true;
    if (un == "") {
        printError("username", "usernamefeedback", "User Name cannot be Empty");
        returnVal = false;
    }
    else {
        clearError("username", "usernamefeedback");
    }
    if (validatePassword(p, rp) == false) {
        printError("password", "passwordfeedback", "Password is Invalid");
        printError("retypepassword", "retypepasswordfeedback", "Password is Invalid");
        returnVal = false;
    }
    else {
        clearError("password", "passwordfeedback");
        clearError("retypepassword", "retypepasswordfeedback");
    }
    return returnVal;
}
/*
+------------------------------------------------+
| This function checks whether the password and  |
| retype password are same or not in Register    |
| Form on typing                                 |
+------------------------------------------------+
*/
function checkPassword() {
    let x = document.getElementById("password");
    let y = document.getElementById("retypepassword");
    let pmf = document.getElementById("passwordmatchfeedback");
    let rpmf = document.getElementById("retypepasswordmatchfeedback");
    if (x.value != "" && y.value != "") {
        if (x.value == y.value) {
            pmf.style.display = "none";
            rpmf.style.display = "none";
            pmf.className = "valid-feedback";
            rpmf.className = "valid-feedback";
            pmf.innerText = "";
            rpmf.innerText = "";
            console.log("Password Matched");
        }
        else {

            pmf.style.display = "block";
            rpmf.style.display = "block";
            pmf.className = "invalid-feedback";
            rpmf.className = "invalid-feedback";
            pmf.innerText = "Password Didnt Matched";
            rpmf.innerText = "Password Didnt Matched";
            console.log("Validation Message Printed");
            console.log("Password Not Matched");
        }
    }
    else {
        pmf.style.display = "none";
        rpmf.style.display = "none";
        pmf.className = "valid-feedback";
        rpmf.className = "valid-feedback";
        pmf.innerText = "";
        rpmf.innerText = "";
    }
}

function validateEmail(e) {
    let email = e;
    let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;;
    let result = email.match(pattern);
    console.table(result);
    if (result == null) {
        return(false);
    }
    else {
        return(true);
    }
}
