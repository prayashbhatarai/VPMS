/*
+---------------------------------------------+
| This function shows password in Login Form  |
+---------------------------------------------+
*/
function showLPassword() {
    let x = document.getElementById("password");
    if (x.type == "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}

/*

/*
+------------------------------------------------+
| This function shows password in Register Form  |
+------------------------------------------------+
*/
function showRPassword() {
    let x = document.getElementById("password");
    let y = document.getElementById("retypepassword");
    if (x.type == "password" && y.type == "password") {
        x.type = "text";
        y.type = "text";
    }
    else {
        x.type = "password";
        y.type = "password";
    }
}