//PREVIEW DE IMAGEM
var loadfile = function (event, output) {
    var output = document.getElementById(output);
    output.src = URL.createObjectURL(event.target.files[0]);
}