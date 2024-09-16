// autofill_barang.js

document.addEventListener('DOMContentLoaded', function() {
    var kategoriSelect = document.querySelector('select[name="kategori"]');
    var namaBarangInput = document.querySelector('input[name="nama"]');
    var merkBarangInput = document.querySelector('input[name="merk"]');
    var satuanBarangSelect = document.querySelector('select[name="satuan"]');

    kategoriSelect.addEventListener('change', function() {
        var selectedKategoriId = this.value;
        if (selectedKategoriId !== '') {
            // Ajax request to fetch data based on selected kategori id
            fetch('get_data_by_kategori.php?id=' + selectedKategoriId)
                .then(response => response.json())
                .then(data => {
                    namaBarangInput.value = data.nama_barang; // assuming response contains nama_barang field
                    merkBarangInput.value = data.merk; // assuming response contains merk field
                    // Automatically set satuan to "PCS"
                    satuanBarangSelect.value = "PCS";
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            namaBarangInput.value = ''; // Clear input jika kategori tidak dipilih
            merkBarangInput.value = ''; // Clear input jika kategori tidak dipilih
            satuanBarangSelect.value = ''; // Clear input jika kategori tidak dipilih
        }
    });
});
