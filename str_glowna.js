document.addEventListener("DOMContentLoaded", init);



function init() {
    document.getElementsByClassName("strzalka")[0].addEventListener("click", zmArtGl1);
    document.getElementsByClassName("strzalka")[1].addEventListener("click", zmArtGl2);
}

function zmArtGl1() {
    var zdj = document.getElementById("o1").src;
    zdj = zdj.slice(zdj.indexOf("superstrona/")+12);

    // ZMIANA OPIS + ZDJ
    var n = artMain.indexOf(zdj);
    console.log(n, zdj);
    if (n == 0) {
        document.getElementById("o1").src = "./" + artMain[artMain.length-1];
        document.getElementById("link").href = "./artykuly/" + linki[artMain.length-1];
        document.getElementById("opis").getElementsByTagName("p")[0].innerHTML = opis[artMain.length-1] + " <a href='./artykuly/" + linki[artMain.length-1] + "'>Czytaj dalej...</a>";
    } else {
        document.getElementById("o1").src = "./" + artMain[n-1];
        document.getElementById("link").href = "./artykuly/" + linki[n-1];
        document.getElementById("opis").getElementsByTagName("p")[0].innerHTML = opis[n-1] + " <a href='./artykuly/" + linki[n-1] + "'>Czytaj dalej...</a>";
    }
}
function zmArtGl2() {
    var zdj = document.getElementById("o1").src;
    zdj = zdj.slice(zdj.indexOf("superstrona/")+12);

    // ZMIANA OPIS + ZDJ
    var n = artMain.indexOf(zdj);
    console.log(n, zdj);
    if (n == artMain.length-1) {
        document.getElementById("o1").src = "./" + artMain[0];
        document.getElementById("link").href = "./artykuly/" + linki[0];
        document.getElementById("opis").getElementsByTagName("p")[0].innerHTML = opis[0] + " <a href='./artykuly/" + linki[0] + "'>Czytaj dalej...</a>";
    } else {
        document.getElementById("o1").src = "./" + artMain[n+1];
        document.getElementById("link").href = "./artykuly/" + linki[n+1];
        document.getElementById("opis").getElementsByTagName("p")[0].innerHTML = opis[n+1] + " <a href='./artykuly/" + linki[n+1] + "'>Czytaj dalej...</a>";
    }
}
