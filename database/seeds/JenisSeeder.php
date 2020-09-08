<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = array(
            array('id_jenis' => '48', 'nama' => 'Apresiasi'),
            array('id_jenis' => '15', 'nama' => 'Barang Hilang'),
            array('id_jenis' => '1', 'nama' => 'Dampak Lingkungan'),
            array('id_jenis' => '2', 'nama' => 'Dampak Sosial Kemasyarakatan'),
            array('id_jenis' => '3', 'nama' => 'Data dan Informasi Umum'),
            array('id_jenis' => '4', 'nama' => 'Energi dan Sumber Daya Alam'),
            array('id_jenis' => '5', 'nama' => 'Fasilitas Kesehatan Membatasi Pemberian Obat'),
            array('id_jenis' => '6', 'nama' => 'Info Form Pendaftaran'),
            array('id_jenis' => '7', 'nama' => 'Info Nomor Kartu'),
            array('id_jenis' => '8', 'nama' => 'Informasi Umum'),
            array('id_jenis' => '9', 'nama' => 'Infrastruktur'),
            array('id_jenis' => '11', 'nama' => 'Iuran'),
            array('id_jenis' => '10', 'nama' => 'Iuran Biaya Layanan Kesehatan di Faskes'),
            array('id_jenis' => '12', 'nama' => 'Iuran Biaya Obat'),
            array('id_jenis' => '13', 'nama' => 'Jadwal / Waktu'),
            array('id_jenis' => '14', 'nama' => 'Jaga Asrama'),
            array('id_jenis' => '16', 'nama' => 'Kartu, PIN, Buku Tabungan'),
            array('id_jenis' => '19', 'nama' => 'Keamanan & Ketertiban Masyarakat'),
            array('id_jenis' => '18', 'nama' => 'Keamanan & Ketertiban Ponpes'),
            array('id_jenis' => '20', 'nama' => 'Kecelakaan'),
            array('id_jenis' => '17', 'nama' => 'Keluhan'),
            array('id_jenis' => '21', 'nama' => 'Keluhan Administrasi Pendaftaran Online'),
            array('id_jenis' => '22', 'nama' => 'Keluhan Gangguan Aplikasi Online PSB'),
            array('id_jenis' => '23', 'nama' => 'Keluhan Hotline Service Sulit Dihubungi'),
            array('id_jenis' => '24', 'nama' => 'Keluhan Pembatasan Kunjungan'),
            array('id_jenis' => '27', 'nama' => 'Kesehatan'),
            array('id_jenis' => '50', 'nama' => 'Kesejahteraan Sosial'),
            array('id_jenis' => '25', 'nama' => 'Kesiswaan'),
            array('id_jenis' => '26', 'nama' => 'Kesiswaan Baru'),
            array('id_jenis' => '51', 'nama' => 'Ketertiban Umum'),
            array('id_jenis' => '52', 'nama' => 'Keuangan'),
            array('id_jenis' => '53', 'nama' => 'Komunikasi'),
            array('id_jenis' => '28', 'nama' => 'Koreksi Data'),
            array('id_jenis' => '29', 'nama' => 'Kritik/Saran Untuk PENGADUAN!'),
            array('id_jenis' => '30', 'nama' => 'Kualitas'),
            array('id_jenis' => '31', 'nama' => 'Pariwisata/ Tour'),
            array('id_jenis' => '32', 'nama' => 'Pelayanan Kesehatan'),
            array('id_jenis' => '33', 'nama' => 'Pelayanan Obat'),
            array('id_jenis' => '34', 'nama' => 'Pendaftaran Siswa'),
            array('id_jenis' => '35', 'nama' => 'Pendaftaran Via Website'),
            array('id_jenis' => '36', 'nama' => 'Pendidikan'),
            array('id_jenis' => '37', 'nama' => 'Penyelewengan'),
            array('id_jenis' => '54', 'nama' => 'Perizinan'),
            array('id_jenis' => '38', 'nama' => 'Permasalahan'),
            array('id_jenis' => '39', 'nama' => 'Permintaan Informasi'),
            array('id_jenis' => '40', 'nama' => 'Permintaan Informasi Cek Stat Kesiswaan'),
            array('id_jenis' => '42', 'nama' => 'Permintaan Informasi Sarana Medik'),
            array('id_jenis' => '43', 'nama' => 'Permintaan Konsultasi'),
            array('id_jenis' => '41', 'nama' => 'Permintaan Tentang Regulasi'),
            array('id_jenis' => '44', 'nama' => 'Peserta Tidak Mendapat Layanan Obat'),
            array('id_jenis' => '45', 'nama' => 'Sosialisasi'),
            array('id_jenis' => '49', 'nama' => 'Sosialisasi dan Edukasi'),
            array('id_jenis' => '46', 'nama' => 'Tidak Dapat Email Balasan'),
            array('id_jenis' => '47', 'nama' => 'Tindak Pidana'),
            array('id_jenis' => '55', 'nama' => 'Transportasi')
        );
        DB::table('jenis')->insert($jenis);
    }
}
