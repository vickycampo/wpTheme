var fuente, deposito;
function iniciar() {
  fuente = document.getElementById("imagen");
  fuente.addEventListener("dragstart", arrastrado);
  deposito = document.getElementById("deposito");
  deposito.addEventListener("dragenter", function(evento) {
    evento.preventDefault();
  });
  deposito.addEventListener("dragover", function(evento) {
    evento.preventDefault();
  });
  deposito.addEventListener("drop", soltado);
}
function arrastrado(evento) {
  var codigo = '<img src="' + fuente.src + '">';
  evento.dataTransfer.setData("Text", codigo);
}
function soltado(evento) {
  evento.preventDefault();
  deposito.innerHTML = evento.dataTransfer.getData("Text");
}
window.addEventListener("load", iniciar);