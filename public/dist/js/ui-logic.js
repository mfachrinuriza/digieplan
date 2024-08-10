// Fungsi untuk menonaktifkan tanggal kemarin
function disableYesterday() {
  var today = new Date(); // Mendapatkan tanggal hari ini
  today.setDate(today.getDate() - 1); // Mengurangi satu hari dari tanggal hari ini

  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();

  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }

  var minDate = yyyy + "-" + mm + "-" + dd; // Format tanggal: tahun-bulan-tanggal

  document.getElementById("myDate").setAttribute("min", minDate); // Mengatur atribut min pada elemen input tanggal
}

function chooseFile() {
  document.getElementById("myFile").click();
  console("Tapped");
}
