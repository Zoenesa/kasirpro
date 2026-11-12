# KasirPRO

Aplikasi kasir berbasis web dengan PHP dan MySQL/MariaDB. Dokumen ini ditujukan untuk pengguna operasional yang baru pertama kali menggunakan aplikasi.

## Daftar Isi

- [Memulai](#memulai)
- [Alur Kerja Harian](#alur-kerja-harian)
- [Panduan Menu dan Form](#panduan-menu-dan-form)
- [Istilah Penting](#istilah-penting)
- [Kendala Umum](#kendala-umum)

## Memulai

### 1. Login

1. Buka alamat aplikasi yang diberikan oleh administrator.
2. Isi **Username** dan **Password** sesuai akun Anda. Keduanya diberikan atau dibuat oleh administrator.
3. Tekan tombol **Login**. Jika gagal, periksa kembali ejaan username/password, status akun, dan tombol Caps Lock.
4. Setelah berhasil, aplikasi membuka halaman utama. Menu yang muncul bergantung pada role dan hak akses akun. Jika menu kerja tidak terlihat atau muncul pesan tidak berhak, hubungi administrator; jangan menggunakan akun orang lain.

Gunakan **Logout** dari menu akun setelah selesai, terutama jika komputer digunakan bersama. Jangan hanya menutup tab browser.

### 2. Mengenali Halaman Utama

Halaman utama menampilkan ringkasan usaha, misalnya jumlah item terjual, jumlah transaksi, nilai penjualan, dan grafik/ringkasan lain. Angka di dashboard adalah ringkasan; untuk memeriksa transaksi satu per satu, buka menu laporan atau daftar transaksi.

Menu utama berada pada navigasi aplikasi. Pada layar kecil, menu dapat dibuka melalui tombol menu. Beberapa halaman, terutama kasir, menggunakan tata letak khusus untuk ponsel. Tombol **Tambah** biasanya membuka form baru; tombol **Simpan/Submit** merekam perubahan. Periksa pesan berhasil/gagal setelah menyimpan.

### 3. Persiapan Awal oleh Pemilik atau Administrator

Sebelum transaksi harian, pastikan data berikut telah disiapkan:

1. **Gudang**: minimal satu gudang aktif dan ditandai sebagai gudang default bila sesuai.
2. **Unit** dan **Kategori**: satuan barang (misalnya pcs atau kg) dan kelompok barang.
3. **Jenis Harga**: daftar harga yang akan dipakai saat transaksi, misalnya harga eceran atau grosir.
4. **Barang**: nama, kode, kategori, satuan, stok awal per gudang, harga pokok, dan harga jual.
5. **Customer** dan **Supplier**: siapkan bila transaksi perlu dicatat atas nama pelanggan/pemasok.
6. **Pengaturan Bisnis**: cek identitas toko, pajak, dokumen/invoice, dan pengaturan kasir.
7. **Akun dan Role**: administrator memberikan akun serta menu sesuai tugas setiap orang.

Urutan ini penting: barang memerlukan satuan/gudang/jenis harga yang sesuai; transaksi yang sudah disimpan dapat memengaruhi stok dan laporan.

## Alur Kerja Harian

### A. Mencatat Penjualan di Kasir / POS

1. Buka **Kasir / POS > Kasir**. Pastikan gudang dan jenis harga yang dipakai benar melalui tombol pengaturan kasir.
2. Pilih pelanggan. Jika pelanggan tidak perlu dicatat, gunakan **Umum**. Pelanggan baru bisa ditambahkan dari tombol tambah/cari pelanggan.
3. Pilih barang dari daftar atau cari menggunakan nama/barcode. Periksa nama, harga, dan stok yang ditampilkan.
4. Atur jumlah barang dengan tombol tambah/kurang atau kolom kuantitas. Jika fitur pengali kuantitas aktif, isi pengali sesuai satuan kemasan yang digunakan.
5. Jika diizinkan, tambahkan diskon per barang atau ubah harga melalui menu opsi item. Pastikan perubahan harga sesuai persetujuan pemilik.
6. Periksa **Sub Total**, diskon keseluruhan, pajak (jika aktif), dan **Total**. Diskon barang berbeda dengan diskon keseluruhan transaksi.
7. Pilih jenis pembayaran dan catat jumlah pembayaran. Untuk pembayaran lebih dari satu kali/metode, gunakan baris pembayaran tambahan bila tersedia. Periksa nilai **Kurang** atau **Kembali**.
8. Tekan **Simpan**. Tunggu pesan berhasil, lalu cetak atau berikan bukti transaksi bila diperlukan.

Jangan menutup halaman sebelum penyimpanan selesai. Jika transaksi salah, jangan membuat transaksi pengganti tanpa memeriksa daftar penjualan dan kebijakan koreksi toko.

### B. Mencatat Penjualan dari Form Penjualan

Menu **Penjualan > Penjualan** menampilkan daftar invoice dan form penjualan yang lebih lengkap. Isi customer, tanggal, gudang, jenis harga, barang, jumlah, diskon, penyesuaian, dan pembayaran seperti langkah POS. Nomor invoice dibuat otomatis. Setelah disimpan, buka daftar invoice untuk melihat detail atau mencetak bukti.

### C. Mencatat Barang Masuk dari Pembelian

1. Buka **Pembelian > Daftar Pembelian**, lalu pilih **Tambah Data**.
2. Isi nomor invoice dari supplier, pilih supplier, tanggal invoice, tanggal jatuh tempo, dan gudang penerima.
3. Tambahkan file dokumen/foto invoice bila diperlukan.
4. Cari barang atau masukkan barcode. Untuk setiap barang, periksa keterangan, tanggal kedaluwarsa bila berlaku, harga satuan, kuantitas, dan total harga.
5. Periksa subtotal, diskon, dan total pembelian.
6. Atur **Terima Barang**. Pilih **Ya** hanya jika barang memang telah diterima; isi tanggal terima dan penerima. Jika belum diterima, pilih **Belum** agar statusnya tidak dianggap sudah masuk.
7. Catat pembayaran jika dilakukan. Periksa total bayar dan sisa tagihan, kemudian simpan.

### D. Meninjau Hasil dan Mengakhiri Sesi

Periksa transaksi pada daftar **Penjualan**, **Penjualan Tempo**, atau laporan yang sesuai. Cocokkan pembayaran dan stok dengan kondisi sebenarnya. Jika mencatat retur, pilih invoice asal yang benar. Setelah pekerjaan selesai, lakukan **Logout**.

## Panduan Menu dan Form

Menu yang tersedia dapat berbeda menurut role, hak akses, konfigurasi menu, dan versi instalasi. Nama berikut adalah nama menu pada konfigurasi bawaan aplikasi; administrator dapat mengubahnya.

### Kasir / POS

- **Kasir**: layar penjualan cepat. Barang dapat dipilih dari daftar atau dicari; tersedia pilihan customer, gudang, jenis harga, kuantitas, diskon, pengaturan item, dan ringkasan pembayaran. Pengaturan gudang/harga biasanya dibuka dari tombol roda gigi.
- **Penjualan**: versi daftar/form transaksi yang lebih rinci. Form berisi **Nama Customer**, **No. Invoice** (otomatis), **Tanggal**, **Gudang**, **Harga/Jenis Harga**, pencarian produk, rincian harga satuan, kuantitas, diskon per barang, subtotal, diskon total, penyesuaian (+/-), pajak bila aktif, total, jenis bayar, tanggal/metode/jumlah pembayaran, dan sisa atau uang kembali. **Simpan** merekam invoice.
- **Update Stok**: tampilan ringkas untuk akses barang/stok melalui perangkat mobile. Gunakan untuk melihat atau memperbarui barang hanya jika hak akses dan prosedur toko mengizinkan; sesuaikan stok dengan hasil hitung fisik.

### Produk

- **Barang**: daftar, tambah, ubah, dan lihat data barang. Form **Barang** memuat:
	- **Nama Barang** dan **Kode Barang** untuk identitas yang mudah dicari.
	- **Barcode**, dapat diisi atau dibuat dengan tombol **Generate**. Cocokkan barcode dengan label fisik.
	- **Deskripsi**, **Kategori**, dan **Satuan** untuk keterangan, pengelompokan, dan unit hitung.
	- **Berat** dalam gram dan **Tgl. Daluarsa** bila relevan bagi produk.
	- **Image** untuk foto produk; gunakan tombol tambah/hapus gambar.
	- Bagian **Stok** menampilkan gudang. **Adjustment** menambah atau mengurangi stok awal; isi jumlah dan tanggal adjustment dengan cermat. **Stok Alert** adalah ambang minimum untuk pemberitahuan stok rendah.
	- **Harga Pokok** adalah biaya/modal barang. **Harga Jual** diisi untuk setiap jenis harga yang telah dibuat.
	- Klik **Submit** untuk menyimpan. Pastikan satuan, gudang, dan angka harga/stok benar sebelum menyimpan.
- **Kategori**: menambah atau mengubah nama kategori untuk mengelompokkan barang.
- **Unit**: mengelola satuan barang, misalnya pcs, botol, atau kg. Gunakan satuan secara konsisten karena berpengaruh pada jumlah stok.
- **Jenis Harga**: mengelola nama tingkat harga. Setelah dibuat, harga aktual untuk setiap jenis diisi pada form Barang.
- **Cetak Barcode**: pilih/cari barang dan tentukan barang yang labelnya perlu dicetak. Pastikan kode barcode pada data barang sudah benar sebelum mencetak.
- **Kartu Stok**: riwayat stok barang. Pilih rentang tanggal dan nama barang, lalu tekan **Submit**. Hasil menampilkan saldo awal, nomor nota, tanggal, keterangan, jumlah masuk, jumlah keluar, dan saldo berjalan. Hasil dapat diekspor ke PDF/XLSX jika tombol tersedia.

### Gudang

- **List Gudang**: mengelola lokasi penyimpanan. Form berisi **Nama Gudang**, **Alamat**, wilayah (provinsi, kabupaten, kecamatan, kelurahan), **Deskripsi**, dan **Default**. Gudang default menjadi pilihan awal pada form transaksi.
- **Transfer Barang**: bila diaktifkan, memindahkan barang antar gudang. Nomor nota dibuat otomatis; isi tanggal, gudang asal, gudang tujuan, jenis harga, dan keterangan. Tambahkan barang, masukkan kuantitas transfer, lalu periksa stok asal dan total sebelum **Simpan**. Menu ini nonaktif pada konfigurasi contoh dan mungkin tidak terlihat.

### Pembelian

- **Daftar Pembelian**: melihat dan membuat transaksi pembelian. Form mencakup **Nomor Invoice** supplier, **Supplier**, tanggal invoice, tanggal jatuh tempo, gudang, lampiran file, serta daftar barang dengan keterangan, tanggal kedaluwarsa, harga satuan, kuantitas, dan total. Bagian ringkasan berisi subtotal, diskon, dan total.
- **Terima Barang**: pilih **Ya** bila barang sudah diterima; isi tanggal dan nama penerima. Pilih **Belum** jika pesanan belum diterima.
- **Pembayaran Pembelian**: tambahkan tanggal bayar, jumlah, dan user pencatat. Ringkasan memperlihatkan total bayar, total tagihan, dan kekurangan yang masih harus dibayar.
- **Retur Pembelian**: membuat catatan pengembalian barang kepada supplier. Nomor retur otomatis; isi tanggal retur dan pilih invoice pembelian asal. Supplier/gudang serta daftar barang mengacu pada invoice; isi kuantitas yang dikembalikan, diskon bila perlu, dan periksa total retur sebelum simpan.
- **Pembelian Per Invoice**: laporan/rincian pembelian berdasarkan invoice. Gunakan untuk menelusuri dokumen pembelian tertentu.

### Penjualan

- **Daftar Penjualan**: mencari, meninjau, dan membuka transaksi/invoice yang sudah dicatat.
- **Retur Penjualan**: mencatat barang yang dikembalikan pelanggan. Isi nomor dan tanggal nota retur, pilih **Invoice Penjualan** melalui tombol **Cari Invoice**, lalu periksa nama pembeli dan gudang yang terisi. Pada tiap baris, **Qty Jual** berasal dari invoice dan tidak diubah; isi **Qty Kembali** sesuai barang yang benar-benar diterima. Diskon dan nilai retur dihitung dari rincian tersebut; periksa subtotal, diskon total, penyesuaian, dan total. Dokumen pendukung dapat dilampirkan sebelum **Simpan**.
- **Penjualan Tempo**: meninjau penjualan dengan pembayaran tempo/belum lunas. Gunakan untuk memantau tagihan; pencatatan pembayaran dilakukan melalui alur yang disediakan aplikasi, bukan dengan mengubah angka laporan.

### Kontak

- **Customer**: daftar pelanggan. Form berisi **Nama Customer**, **Alamat**, **No. Telp**, **Email**, wilayah (provinsi sampai kelurahan), dan **Foto** opsional. Data customer memudahkan pencatatan nama pelanggan dan penelusuran transaksi.
- **Supplier**: daftar pemasok. Form berisi **Nama Supplier**, **Alamat**, **No. Telp**, dan wilayah. Pilih data ini saat membuat pembelian.
- **Rekanan**: data pihak terkait yang dapat dipilih pada form pengeluaran bila menu pengeluaran digunakan.

### Pengeluaran

Menu pengeluaran/kategori pengeluaran tersedia pada konfigurasi atau hak akses tertentu, tetapi tidak tampil pada konfigurasi menu contoh.

- **Pengeluaran**: mencatat biaya. Form dapat memuat rekanan, nomor dan tanggal bukti, file bukti, tanggal pengeluaran, kategori, sumber dana, serta satu atau lebih rincian **Nama Pengeluaran**, **Keterangan**, dan **Jumlah**. Pilih metode pembayaran dan periksa total sebelum menyimpan.
- **Kategori Pengeluaran**: mengelola kelompok biaya agar pencatatan dan rekap lebih mudah dibaca.

### Laporan

- **Penjualan Per Tanggal**: pilih rentang **Tanggal**, **Jenis Pembayaran** (semua/tunai/transfer/tempo), dan **Nama Pelanggan** untuk menyaring transaksi. Ringkasan menampilkan total penjualan, untung/rugi, dan jumlah barang terjual. Tabel memuat invoice, tanggal, nilai neto, untung/rugi, dan kurang bayar. PDF, XLSX, atau email tersedia bila tombol aktif.
- **Penjualan Per Item**: melihat penjualan dikelompokkan berdasarkan barang untuk periode/filter yang tersedia pada layar.
- **Pembelian Per Invoice**: meninjau data pembelian per invoice.
- **Dashboard**: ringkasan cepat, bukan pengganti pemeriksaan detail transaksi.

### Pengaturan Bisnis

> Catatan: menu ini biasanya dikelola pemilik/administrator. Perubahan dapat memengaruhi semua transaksi atau hasil cetak.

- **Setting Invoice**: mengatur dokumen transaksi, seperti logo dan tampilan dokumen/cetakan.
- **Identitas / Setting Invoice**: mengisi identitas toko yang dicantumkan pada invoice atau bukti transaksi, misalnya nama dan informasi usaha yang tersedia pada form.
- **Setting Pajak**: mengatur pajak yang digunakan dalam perhitungan penjualan. Pastikan tarif dan status sesuai kebijakan usaha.
- **Setting Kasir**: mengatur perilaku layar kasir, termasuk pengali kuantitas dan tata letak daftar barang bila opsi tersebut tersedia.
- **Notifikasi Piutang**: mengatur pemberitahuan tagihan tempo/jatuh tempo.
- **Notifikasi Stok**: mengatur pemberitahuan stok rendah atau tampilan ringkasan stok.
- **Backup Database**: membuat cadangan basis data. Simpan hasil cadangan di lokasi aman yang aksesnya dibatasi, lalu pastikan file hasil backup benar-benar tersedia.

### Pengaturan Aplikasi dan Hak Akses

Bagian **KasirPRO Master/Pengaturan Aplikasi** ditujukan untuk administrator, bukan proses kasir harian.

- **User**: membuat atau mengubah akun pengguna.
- **User Role** dan **Role**: menetapkan kelompok tugas/hak akses kepada akun.
- **Role Permission** dan **Module Permission**: mengatur tindakan yang boleh dilakukan pada modul.
- **Menu** dan **Menu Role**: mengatur susunan menu serta role yang dapat melihat menu.
- **Module**: mengelola modul aplikasi.
- **Setting Aplikasi**, **Setting Layout**, dan **Setting Registrasi**: mengatur tampilan, identitas aplikasi, atau pendaftaran akun.
- **Wilayah**: data wilayah yang dipakai pada alamat kontak/gudang.

Jangan mengubah menu, role, permission, atau pengaturan global jika tidak ditugaskan sebagai administrator. Menu tersembunyi belum tentu berarti fiturnya tidak ada; bisa jadi role Anda tidak diberi akses.

## Istilah Penting

- **Invoice/nota**: bukti dan nomor transaksi.
- **Gudang**: lokasi stok dicatat. Stok suatu barang dapat berbeda antar gudang.
- **Harga pokok**: biaya/modal barang; berbeda dari harga jual.
- **Sub Total**: jumlah nilai barang sebelum komponen transaksi lain.
- **Diskon**: pengurang harga; pada form tertentu dapat dipilih sebagai persentase (%) atau rupiah (Rp).
- **Penyesuaian**: penambah atau pengurang total selain diskon; gunakan hanya sesuai prosedur usaha.
- **Tempo/piutang**: nilai penjualan yang belum dibayar penuh oleh pelanggan.
- **Adjustment stok**: koreksi jumlah stok; catat hanya berdasarkan hitung fisik atau bukti yang dapat dipertanggungjawabkan.

## Kendala Umum

- **Tidak bisa login**: periksa username/password dan minta administrator memastikan akun aktif.
- **Menu tidak ada/akses ditolak**: minta administrator memeriksa role, permission, dan status menu.
- **Barang tidak ditemukan**: coba nama atau barcode; pastikan barang sudah dibuat dan aktif.
- **Harga/stok tidak sesuai**: periksa jenis harga dan gudang yang dipilih. Jangan lanjutkan transaksi sebelum nilainya dikonfirmasi.
- **Tanggal salah**: gunakan pemilih tanggal pada form dan periksa kembali sebelum menyimpan.
- **Data belum terlihat setelah disimpan**: tunggu pesan hasil simpan, lalu buka kembali daftar atau muat ulang halaman. Hindari menekan simpan berulang kali bila belum tahu apakah transaksi pertama sudah tercatat.
- **Salah mencatat transaksi**: hubungi pemilik/administrator untuk prosedur koreksi atau retur. Hindari menghapus atau membuat transaksi pengganti tanpa memeriksa dampaknya pada stok dan laporan.
