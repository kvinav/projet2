document.getElementById("pseudo").addEventListener("input", function (e) {
    var pseudo = e.target.value; 
    if (pseudo.length >= 30) {
        longueurPseudo = "Votre pseudo est trop long";
        couleurMsg = "red"; 
    }
    else if (pseudo.length < 30) {
        longeurPseudo = "";
        couleurMsg = "white";
    }
    var aidePseudoElt = document.getElementById("aidePseudo");
    aidePseudoElt.textContent = longueurPseudo; // Texte de l'aide
    aidePseudoElt.style.color = couleurMsg; // Couleur du texte de l'aide
});

