
// menu toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}; 

document.getElementById("notrx").readOnly = true;

// itung rental
document.getElementById('harga_mrizalamsori').addEventListener('input', updateTotal);
document.getElementById('lama_mrizalamsori').addEventListener('input', updateTotal);

function updateTotal() {
    var harga = parseFloat(document.getElementById('harga_mrizalamsori').value) || 0;
    var lama = parseFloat(document.getElementById('lama_mrizalamsori').value) || 0;
    document.getElementById('total_bayar_mrizalamsori').value = harga * lama;
}