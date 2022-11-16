function prikazi() {
    var bg = document.getElementById("form-bg");
    var form = document.getElementById("form-prikaz");
  
    bg.style.display = "block";
    form.style.display = "block";
  }
  
  $("#form").submit(function () {
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
  
  function uredi(id, opis) {

    prikazi();
  
    izUrediForme = true;
  
    document.getElementById("form-id").value = id;
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
  
  let tipSortiranja = 1;
  
  function sortirajPoKategoriji() {
    const nizAktivnosti = [...document.getElementById("data").children];
  
    nizAktivnosti.sort(function (a, b) {
      const ime1 = a.children[4].innerHTML;
      const ime2 = b.children[4].innerHTML;
  
      let value = (ime1 > ime2) - (ime1 < ime2);
      if (value == 0) value = -1;
  
      return tipSortiranja * value;
    });
  
    tipSortiranja = tipSortiranja * -1;
  
    const container = document.getElementById("data");
    container.innerHTML = "";
  
    for (let i = 0; i < nizAktivnosti.length; i++) {
      container.appendChild(nizAktivnosti[i]);
    }
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
  