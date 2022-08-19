var isiKuantitas = document.getElementById('quantity');
var angkaKuantitas = isiKuantitas.value;

function tambahKuantitas(){
    angkaKuantitas++;
    isiKuantitas.innerHTML = `(${angkaKuantitas})`
}

function kurangiKuantitas(){
    angkaKuantitas--;
    isiKuantitas.innerHTML = `(${angkaKuantitas})`
}

function reset(){
    angkaKuantitas = 0;
    isiKuantitas.innerHTML = `(${angkaKuantitas})`
}