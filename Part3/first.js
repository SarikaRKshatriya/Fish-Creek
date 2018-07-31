function myFunction() {
    var x = document.getElementById("btn1").name;
    var y = document.getElementById("btn1").type;
    document.getElementById("demo1").innerHTML = x;
    document.getElementById("demo2").innerHTML = y;
}
function myFunction2() {
    var x = document.getElementById("name").value;
    var y = document.getElementById("name").type;
    //this is js comment
    if (x="sarika")
    document.getElementById("demo1").innerHTML = x;
	else
    document.getElementById("demo1").innerHTML = y;
}
