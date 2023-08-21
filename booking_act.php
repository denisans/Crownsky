<?php 
include 'koneksi.php';

session_start();
date_default_timezone_set('Asia/Jakarta');

$kamar = mysqli_real_escape_string($koneksi, $_POST['kamar']);
$dari = mysqli_real_escape_string($koneksi, $_POST['dari']);
$sampai = mysqli_real_escape_string($koneksi, $_POST['sampai']);
$dewasa = mysqli_real_escape_string($koneksi, $_POST['dewasa']);
$anak = mysqli_real_escape_string($koneksi, $_POST['anak']);
$jumlah_kamar_dipesan = mysqli_real_escape_string($koneksi, $_POST['quantity']);

$kk = mysqli_query($koneksi,"SELECT * FROM kamar WHERE kamar_id='$kamar'");
$k = mysqli_fetch_assoc($kk);
$jumlah_kamar = $k['kamar_jumlah'];

$dari = date('Y-m-d', strtotime($dari));
$sampai = date('Y-m-d', strtotime($sampai));

$cek = mysqli_query($koneksi,"select * from invoice where invoice_kamar='$kamar' and (invoice_dari >= '$dari' and invoice_dari <= '$sampai' or invoice_sampai > '$dari' and invoice_sampai <= '$sampai') and (invoice_status='0' or invoice_status='1' or invoice_status='3')");
$c = mysqli_num_rows($cek);
echo $c;

$jumlah_kamar_dipesan = 0;
if ($c > 0) {
    while ($row = mysqli_fetch_assoc($cek)) {
        $jumlah_kamar_dipesan += $row['invoice_jumlah_kamar'];
    }
}

// Jumlah total kamar yang tersedia
$jumlah_kamar_tersedia = $k['kamar_jumlah'];

// Jumlah kamar yang akan dipesan
$jumlah_kamar_pesanan = mysqli_real_escape_string($koneksi, $_POST['quantity']);

// Menghitung jumlah kamar yang akan tersedia setelah pemesanan
$sisa_kamar_tersedia = $jumlah_kamar_tersedia - $jumlah_kamar_dipesan - $jumlah_kamar_pesanan;

if ($sisa_kamar_tersedia < 0) {
    // Jika sisa kamar tersedia kurang dari 0, artinya tidak cukup kamar tersedia

    $_SESSION['booking_kamar_status'] = "tidak-tersedia";
    $_SESSION['booking_kamar'] = $kamar;
    $_SESSION['booking_dari'] = $dari;
    $_SESSION['booking_sampai'] = $sampai;
    $_SESSION['booking_dewasa'] = $dewasa;
    $_SESSION['booking_anak'] = $anak;
    $_SESSION['booking_jumlah_kamar'] = $jumlah_kamar_pesanan; // Menyimpan jumlah kamar yang dipesan
    header("location:booking.php?id=$kamar&alert=tidak-tersedia");
} else {
    // Jika sisa kamar tersedia cukup, kamar dianggap tersedia
    
    $_SESSION['booking_kamar_status'] = "tersedia";
    $_SESSION['booking_kamar'] = $kamar;
    $_SESSION['booking_dari'] = $dari;
    $_SESSION['booking_sampai'] = $sampai;
    $_SESSION['booking_dewasa'] = $dewasa;
    $_SESSION['booking_anak'] = $anak;
    $_SESSION['booking_jumlah_kamar'] = $jumlah_kamar_pesanan; // Menyimpan jumlah kamar yang dipesan
    header("location:booking.php?id=$kamar&alert=tersedia");
}



