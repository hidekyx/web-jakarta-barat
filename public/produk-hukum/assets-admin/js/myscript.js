let flashdata = $('.flash-data').data('flash');
let flashreset = $('.flash-reset').data('flash');
let flashnot = $('.flash-not').data('flash');
let flashadd = $('.flash-add').data('flash');
let flashnull = $('.flash-null').data('flash');
let flashdel = $('.flash-del').data('flash');

if(flashdata){
Swal.fire({
  title: 'Sukses',
  text: 'Perubahan Data '+ flashdata + ' Berhasil',
  icon: 'success'
})
}

if(flashreset){
Swal.fire({
  title: 'Berhasil!',
  text:  'Harap Cek Email Anda Untuk Verifikasi Password Baru',
  icon: 'success'
})
}

if(flashnot){
Swal.fire({
  title: 'Gagal!',
  text:  flashnot,
  icon: 'error'
})
}

if(flashadd){
Swal.fire({
  title: 'Berhasil!',
  text:  flashadd+ ' Berhasil Ditambah',
  icon: 'success'
})
}

if(flashnull){
Swal.fire({
  title: 'Gagal!',
  text:  flashnull,
  icon: 'error'
})
}

if(flashdel){
Swal.fire({
  title: 'Berhasil!',
  text:  'Data '+flashdel+ ' Berhasil Dihapus!',
  icon: 'success'
})
}