$("#form").submit(function (event) {
  event.preventDefault();

  const $form = $(this);
  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  if (izUrediForme) {
    urediAjax(serijalizacija);
    return;
  }

  req = $.ajax({
    url: "handler/dodaj_aktivnost.php",
    type: "post",
    data: serijalizacija,
  });

  req.done(function (res, textStatus, jqXHR) {
    location.reload(true);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Greška: > " + textStatus, errorThrown);
  });

  activeItem = false;
});

var izUrediForme = false;

function ponisti() {
  izUrediForme = false;

  var bg = document.getElementById("form-bg");
  var form = document.getElementById("form-prikaz");

  bg.style.display = "none";
  form.style.display = "none";
}

function prikazi() {
  var bg = document.getElementById("form-bg");
  var form = document.getElementById("form-prikaz");

  bg.style.display = "block";
  form.style.display = "block";
}

function uredi(id, naslov, opis) {
  prikazi();

  izUrediForme = true;

  document.getElementById("form-id").value = id;
  document.getElementById("form-naslov").value = naslov;
  document.getElementById("form-opis").value = opis;
  
}

function urediAjax(serijalizacija) {
  req = $.ajax({
    url: "handler/izmeni_aktivnost.php",
    type: "post",
    data: serijalizacija,
  });

  req.done(function (res, textStatus, jqXHR) {
    location.reload(true);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Greška: > " + textStatus, errorThrown);
  });

  izUrediForme = false;
}

function obrisi(id1) {
  req = $.ajax({
    url: "handler/obrisi_aktivnost.php",
    type: "post",
    data: { id: id1 },
  });

  req.done(function (res, textStatus, jqXHR) {
    location.reload(true);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Greška: > " + textStatus, errorThrown);
  });

  activeItem = false;
}



const nizAktivnosti = [...document.getElementById("data").children];
const container = document.getElementById("data");
var pretraga = document.getElementById("pretraga");

function pretrazi() {
  container.innerHTML = "";

  for (let i = 0; i < nizAktivnosti.length; i++) {
    if (
      nizAktivnosti[i].children[0].innerHTML
        .toLowerCase()
        .includes(pretraga.value)
    ) {
      container.appendChild(nizAktivnosti[i]);
    }
  }
}
