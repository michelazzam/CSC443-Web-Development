
function changeImage(){
    var image = document.getElementById('myImage');
    if (image.src.match("bulbon.jpg")) {
        image.src = "bulboff.gif";
    } else {
        image.src = "bulbon.jpg";
    }
}
