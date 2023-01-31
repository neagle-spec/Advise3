function generate_token(){
    //edit the token allowed characters
    alert("You called function")
    var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".split("");
    var b = [];
    for (var i=0; i<6; i++) {
        var j = (Math.random() * (a.length-1)).toFixed(0);
        b[i] = a[j];
    }
    alert(b.join(""));
    return b.join("");
}

document.getElementById("token").innerHTML = generate_token();