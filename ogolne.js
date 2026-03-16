document.addEventListener("DOMContentLoaded", init);

var possible = {
  "Genshin Impact Luna I": [
    "genshin_lunaI.html",
    ["genshin", "luna i", "lunai", "genshin impact"],
  ],
  "Minecraft Update": [
    "minecraft_update.html",
    ["minecraft", "mc", "armadillo", "dog armor", "zbroja"],
  ],
  "Pokemon Z-A": ["pokemonza.html", ["pokemonza", "pokemon z-a", "pokemon"]],
  "Hollow Knight: Silksong": [
    "silksong.html",
    ["silk", "silksong", "hollow knight", "hks"],
  ],
  "Supraworld": ["supraworld.html", ["supraworld", "supraland", "super"]],
};

var log = true;
function init() {
  if (document.getElementById("logowanie") != null) {
    document.getElementById("logowanie").addEventListener("click", pokazLog);
    document.getElementById("change").addEventListener("click", zamiana);
  } else {
    document.getElementById("konto").addEventListener("click", pokazKont);
  }
  document.getElementById("wyszukiwanie").addEventListener("click", pokazSzuk);
  document.getElementById("down").addEventListener("click", pokazPrze);
}

function pokazLog() {
  if (!log) {
    zamiana();
  }
  document.getElementsByClassName("hide")[0].style.display = "block";
  document.getElementById("wyjdz").addEventListener("click", zamknijLog);
}

function zamiana() {
  if (log) {
    document.getElementById("nagl_log").innerText = "Zarejestruj się";
    document.getElementById("change").innerText = "Zaloguj się";
    var schow = document.getElementsByClassName("hide2");
    for (var i = 0; i < schow.length; i++) {
      schow[i].style.display = "block";
    }
    var pozycja = document
      .getElementById("loguj")
      .getElementsByTagName("label");
    for (var i = 0; i < pozycja.length; i++) {
      pozycja[i].style.top = "-10px";
    }
    document.getElementById("nazwa_uz").style.top = "-10px";
    document.getElementById("haslo").style.top = "-10px";
    document.getElementById("phaslo").style.top = "-20px";
    document.getElementById("mail").style.top = "-50px";
    document.getElementById("maillab").style.top = "-30px";
    document.getElementById("phaslolab").style.top = "0px";
    document.getElementById("zaloguj").style.top = "-60px";
    document.getElementById("change").style.top = "-100px";
    document.getElementById("zaloguj").value = "Zarejestruj";
    document.getElementById("ukryty").value = "rejestruj";

    log = false;
  } else {
    document.getElementById("nagl_log").innerText = "Zaloguj się";
    document.getElementById("change").innerText = "Zarejestruj się";
    var schow = document.getElementsByClassName("hide2");
    for (var i = 0; i < schow.length; i++) {
      schow[i].style.display = "none";
    }
    var pozycja = document
      .getElementById("loguj")
      .getElementsByTagName("label");
    for (var i = 0; i < pozycja.length; i++) {
      pozycja[i].style.top = "20px";
    }
    document.getElementById("nazwa_uz").style.top = "20px";
    document.getElementById("haslo").style.top = "20px";
    document.getElementById("phaslo").style.top = "20px";
    document.getElementById("mail").style.top = "20px";
    document.getElementById("maillab").style.top = "0";
    document.getElementById("phaslolab").style.top = "0";
    document.getElementById("zaloguj").style.top = "0";
    document.getElementById("change").style.top = "-20px";
    document.getElementById("zaloguj").value = "Zaloguj";
    document.getElementById("ukryty").value = "loguj";

    log = true;
  }
}

function zamknijLog() {
  document.getElementsByClassName("hide")[0].style.display = "none";
}

function pokazSzuk() {
  document.getElementsByClassName("hide")[1].style.display = "block";
  document.getElementById("wyjdz2").addEventListener("click", zamknijSzuk);
  document.getElementById("co_chcesz").addEventListener("keypress", sprawdzW);
}

function zamknijSzuk() {
  document.getElementsByClassName("hide")[1].style.display = "none";
}

function sprawdzW() {
  var spr = document.getElementById("co_chcesz").value.toLowerCase();
  var wysz = [];
  var kl = Object.keys(possible);
  for (var i = 0; i < kl.length; i++) {
    var dospr = possible[kl[i]][1];
    wysz.push([])
    for (var j = 0; j < dospr.length; j++) {
      var zm = dospr[j].slice(0, dospr[j].indexOf(spr))+1;
      
      wysz[i].push(zm.length);
    }
    console.log(wysz[i]);
  }

  for (var i = 0; i < wysz.length; i++) {
    wysz[i] = Math.min(...wysz[i]);
  }
  console.log(wysz);

  
  var min = [];
  var ind = [];
  var tmp = 0;
  for (var i = 0; i < 3; i++) {
    min[i] = wysz[0];
    for (var j = 1; j < wysz.length; j++) {
      if (min[i] < wysz[j]) {
        min[i] = wysz[j];
      }
      if (j == wysz.length-1) {
        wysz[wysz.indexOf(min[i])] *= 1000;
      }
    }
    ind[i] = wysz.indexOf(min[i]);

  }

  console.log(ind, wysz)

  document.getElementsByClassName("hide3")[0].style.display = "block";
  var klucze = [kl[ind[0]], kl[ind[1]], kl[ind[2]]];


  for (var i = 1; i < 4; i++) {
    var a = document.getElementById("i" + i);
    console.log("jestem");

    var s = a.getElementsByTagName("section")[0];

    a.href = possible[klucze[i-1]];
    s.innerText = klucze[i-1];
  }
}

function pokazPrze() {
  document.getElementsByClassName("hide")[2].style.display = "block";
  document.getElementById("wyjdz3").addEventListener("click", zamknijPrze);
}

function zamknijPrze() {
  document.getElementsByClassName("hide")[2].style.display = "none";
}

function pokazKont() {
  document.getElementsByClassName("hide")[0].style.display = "block";
  document.getElementById("wyjdz").addEventListener("click", zamknijLog);
}