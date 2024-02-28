<!DOCTYPE html>
<html>
<head>
    <title>Daftar Makanan dan Minuman</title>
    <script>
        function tampilkanDaftar(pilihan) {
            var makanan = document.getElementById('makanan');
            var minuman = document.getElementById('minuman');

            if (pilihan === 'makanan') {
                makanan.style.display = 'block';
                minuman.style.display = 'none';
            } else if (pilihan === 'minuman') {
                makanan.style.display = 'none';
                minuman.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <h1>Daftar Makanan dan Minuman</h1>

    <label for="pilihan">Pilih:</label>
    <select id="pilihan" onchange="tampilkanDaftar(this.value)">
        <option value="">Pilih</option>
        <option value="makanan">Makanan</option>
        <option value="minuman">Minuman</option>
    </select>

    <div id="makanan" style="display: none;">
        <h2>Daftar Makanan:</h2>
        <ul>
            <li>Nasi Goreng</li>
            <li>Mie Ayam</li>
            <li>Roti Bakar</li>
        </ul>
    </div>

    <div id="minuman" style="display: none;">
        <h2>Daftar Minuman:</h2>
        <ul>
            <li>Es Teh</li>
            <li>Jus Jeruk</li>
            <li>Kopi</li>
        </ul>
    </div>
    
    
    <select id="bulanSelect">
  <!-- Opsi akan ditambahkan secara dinamis di sini -->
</select>

<script>
  // Array bulan
  var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  console.log(bulan);
  console.log(bulan.length);

  // Dapatkan elemen select
  var select = document.getElementById("bulanSelect");

  // Tambahkan opsi untuk setiap bulan
  for (var i = 0; i < bulan.length; i++) {
    var option = document.createElement("option");
    option.value = bulan[i];
    option.text = bulan[i];
    select.appendChild(option);
  }
</script>
<!-- <script>
console.log('ok');
  $(function () {
  const scriptURL =
    window.location.origin + window.location.pathname + "Dashboard/getBulanPemasukkan";
      $.ajax({
        url: scriptURL,
        type: "POST",
        data: new FormData(form),
        processData: false,
        contentType: false,
      })
        .done((response) => {
          console.log(response);
        })
        .fail((error) => {
          console.log(error);
        });
});

</script> -->

</body>
</html>
