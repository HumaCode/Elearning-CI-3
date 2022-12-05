const flashData = $('.flash-data').data('flashdata');

// jika ada flashDatanya maka jalankan sweetalertnya
if(flashData) {
    Swal.fire(
        'Data',
        'Berhasil ' + flashData,
        'success'
      )
}


// tombol hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin.?',
        text: "Data ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
      })
});


// tombol hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin.?',
        text: "Data ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
      })
});




