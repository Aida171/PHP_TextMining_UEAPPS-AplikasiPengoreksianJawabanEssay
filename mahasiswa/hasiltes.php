<?php include('login/dbcon.php');
session_start(); 

?>
<html lang="en">
<head>
     <title>UEAPPS | Nilai Ujian Per Soal</title>
    <link href="\font/font.css" rel="stylesheet">
    <link href="\style.css" rel="stylesheet">
    <link href="\style2.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="\assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="\assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="\assets/css/navbar-static-top.css" rel="stylesheet">

    <link href="\assets/css/animate.min.css" rel="stylesheet">
    <link href="\assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="\assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="\assets/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="\assets/Responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
        .l{
            max-width: 360px;
        }
    </style>
</head>

<body>

<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"></div>

             <div id="navbar-collapse" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Beranda</b></font></a></li>
                <li><a href="about3.php"><font face="Lucida Bright" size="+1" color="#191970"><b>Tentang Aplikasi</b></font></a></li>
                <li class="dropdown"><a><font face="Lucida Bright" size="+1" color="#191970"><b>Proses Data</b></font></a>
                    <ul class="isi-dropdown">
                        <li class="nav"><a href="jawabsoal.php">Jawab Soal</a></li>
                        <li class="nav"><a href="hasiltes.php">Hasil Tes</a></li>
                    </ul>
                </ul>
                  <ul class="nav navbar-nav navbar-right">
                  <li style="padding-left:10px;"><a href="#"><i class="fa fa-user"></i><font face="Lucida Bright" size="+0" color="#191970"> <?php echo $_SESSION['nama_mahasiswa']; ?> </font></span></a></li>
                  <li><a href="login/logout.php"><i class="fa fa-sign-out"></i><font face="Lucida Bright" size="+0" color="#191970"> Keluar</font></a></li>
                </ul>
        </div>
    </div>
</nav>
<br>
 <div class="container">
            <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr bgcolor="white">
                    <th>NIM</th>
                    <th>No.</th>
                    <th>Jawaban</th>
                    <th>Proses Text Mining</th>
                    <th>Kunci Jawaban</th>
                    <th>Nilai per Soal</th>
                    
                    
                </tr>
                </thead>
                <tbody>
                   <?php
                            require 'vendor/autoload.php';
 
                            // Meload library Sastrawi
                            $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                            $stemmer  = $stemmerFactory->createStemmer();

                            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
                            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

                            $con = mysqli_connect("localhost","root","","db_ueapps");
                            $akun_id = $_SESSION['nim'];


                            $reset = "DELETE FROM hasil WHERE nim='$akun_id'";
                                        mysqli_query($con, $reset);

                            $result = mysqli_query($con, "SELECT * FROM jawaban WHERE nim = '$akun_id'");
                            while($rows = mysqli_fetch_array($result)) {
                                $sentence = $rows['jawaban'];
                                $output   = $stemmer->stem($sentence);

                                $output = strtolower($output);
     
                                //hilangkan tanda baca
                                $output = str_replace("/[^a-zA-Z]/", " ", $output);
    
                    ?>


                    <tr bgcolor="white">
                        <td><?php echo "481".$_SESSION['nim']; ?></td>
                        <td><?php echo $rows['id_soal']; ?></td>
                        <td><?php echo $rows['jawaban'];?></td>
                        <td><?php
                                    
                                    $id_soal=$rows['id_soal'];  
                                    $nim = $_SESSION['nim'];
                                    $query2  = mysqli_query($con, "SELECT * FROM jawaban WHERE jawaban.id_soal=$id_soal AND jawaban.nim=$nim");
                                    while ($rows = mysqli_fetch_array($query2)){
                                    $sentence1 = $rows['jawaban'];
                                    $sentencenim = $rows['nim'];
                                    $sentenceidsoal = $rows['id_soal'];

                                        $jawaban   = $stemmer->stem($sentence1);

                                        $jawaban =  strtolower(trim($jawaban));
                     
                                        //hilangkan tanda baca
                                        $jawaban = str_replace("/[^a-zA-Z]/", " ", $jawaban);
                                                           
                                        //daftar stop list      
$astoplist = array ('capai','adalah', 'seperti', 'bagai', 'bahwa', 'dapat', 'para', 'harus' ,'namun', 'kita' , 'masih', 'hari', 'hanya', 'mengatakan' , 'kami',  'belum', 'selain', 'lain', 'dia', 'kalau', 'terjadi', 'banyak' ,'menurut' , 'anda' ,'hingga', 'tak' ,'baru' ,'beberapa', 'ketika', 'saja', 'jalan', 'sekitar', 'secara', 'laku', 'sementara' ,'tetapi','tapi' ,'sangat' ,'sehingga',  'seorang', 'bagi' ,'besar', 'lagi', 'selama', 'antara', 'waktu', 'sebuah', 'jika', 'sampai', 'jadi', 'terhadap', 'tiga', 'serta', 'masalah', 'merupakan','rupa', 'atas' ,'sejak',  'buat', 'baik', 'miliki',  'kembali',  'pertama', 'kedua', 'memang', 'pernah', 'mulai','menanyakan','jawab', 'sama', 'tentang', 'bukan', 'agar', 'semua', 'sedang', 'kali', 'kemudian', 'hasil', 'sejumlah', 'juta', 'persen', 'sendiri', 'kata', 'demikian', 'salah',  'mungkin', 'umum', 'setiap', 'bulan','bila', 'terus', 'luar', 'cukup', 'bahkan', 'wib', 'tempat', 'perlu', 'guna', 'beri', 'rabu', 'sedangkan', 'kamis', 'langsung', 'apakah', 'pihak', 'diri',   'minggu', 'aku',  'berada', 'tinggi', 'ingin', 'tengah', 'kini', 'the', 'tahu', 'depan', 'selasa', 'begitu', 'mengenai',  'maka', 'jumlah', 'masuk',  'katanya', 'tanya', 'mengalami', 'sering', 'ujar', 'kondisi' ,'akibat' ,'hubungan', 'empat', 'paling', 'selalu', 'lima','macam'  ,'meminta', 'lihat', 'sekarang', 'mengaku', 'mau', 'kerja', 'acara', 'masa', 'proses', 'tanpa', 'selatan', 'sempat','hidup', 'datang', 'senin', 'rasa','seluruh' ,'mantan', 'lama', 'jenis' ,'segera', 'misal','bawah', 'jangan', 'meski','jumat',  'punya', 'yakni', 'kecil', 'panjang', 'badan' ,'juni', 'of' , 'jelas' ,'jauh', 'tentu', 'makin', 'tinggal' ,'kurang' , 'mampu', 'posisi' , 'asal', 'sekali',  'sesuai', 'sebesar', 'berat' , 'pagi' , 'sabtu' , 'nyata' ,'mencari','cari', 'sumber', 'ruang', 'menunjukkan' ,'nama'  ,'sebanyak', 'utara', 'berlangsung', 'barat', 'yaitu' , 'berdasarkan' , 'sebenarnya', 'cara', 'utama', 'pekan', 'terlalu' , 'bawa', 'butuh' ,'suatu' ,'menerima' , 'penting',  'tanggal', 'terutama' ,'tingkat', 'awal','sedikit' ,'nanti', 'pasti' , 'muncul', 'dekat' ,'lanjut' ,'ketiga', 'biasa' ,'dulu' ,'kesempatan',  'ribu',  'akhir' , 'bantu' ,'terkait'  ,'sebab', 'menyebabkan' ,'khusus' , 'bentuk', 'temu' , 'duga' ,'mana' ,'ya' ,'kegiatan' , 'tampil' ,'hampir' ,'temu', 'usai' ,'arti' ,'keluar' ,'pula', 'justru' , 'padahal', 'menyebutkan' , 'gedung'  ,'lagi', 'program',  'milik' ,'teman', 'putus', 'sumber'  , 'upaya', 'mengetahui' ,'ambil' ,'benar', 'lewat' ,'belakang' ,'ikut', 'barang', 'meningkatkan', 'kejadian', 'kehidupan', 'keterangan', 'masing','masing' ,'menghadapi', 'yang','di', 'dan', 'itu', 'dengan', 'untuk', 'tidak', 'ini', 'dari', 'dalam', 'akan', 'pada', 'juga', 'saya', 'ke', 'karena', 'tersebut', 'bisa', 'ada', 'mereka', 'lebih', 'kata', 'tahun', 'sudah','atau', 'saat', 'oleh', 'menjadi', 'orang', 'ia', 'telah', 'lalu', 'hal', 'pun', 'apa','turut','tutur','ujar','perbuat');

                                        //hapus term yang sama dengan stop word
                                    foreach ($astoplist as $i => $value) {
                                        $jawaban = str_replace($astoplist[$i], "", $jawaban);
                                        } //end foreach
                                         
                                        $jawaban = trim($jawaban);
                                            $token2 = strtok($jawaban, " ");
                                            $jawaban2 = $tokenizer->tokenize($jawaban);
                                            $data1 = array_count_values($jawaban2);
                                        ksort($data1);
                                foreach ($data1 as $xi => $token2) {
                                    echo $xi. " : " .$token2;
                                    echo "<br>";}
                            ?>    
                        </td>


                        <td>
                            <?php 

                            $id_soal=$rows['id_soal'];  
                                    $query4  = mysqli_query($con, "SELECT * FROM soal WHERE soal.id_soal=$id_soal");
                                    while ($rows = mysqli_fetch_array($query4)){
                                    $sentence2 = $rows['kunci_jawaban'];
                                        $kunci3   = $stemmer->stem($sentence2);

                                        $kunci3 = strtolower(trim($kunci3));
                     
                                        //hilangkan tanda baca
                                        $kunci3 = str_replace("/[^a-zA-Z]/", " ", $kunci3);
                                                           
                                        //daftar stop list      
                                        $astoplist = array ('capai','adalah', 'seperti', 'bagai', 'bahwa', 'dapat', 'para', 'harus' ,'namun', 'kita' , 'masih', 'hari', 'hanya', 'mengatakan' , 'kami',  'belum', 'selain', 'lain', 'dia', 'kalau', 'terjadi', 'banyak' ,'menurut' , 'anda' ,'hingga', 'tak' ,'baru' ,'beberapa', 'ketika', 'saja', 'jalan', 'sekitar', 'secara', 'laku', 'sementara' ,'tetapi','tapi' ,'sangat' ,'sehingga',  'seorang', 'bagi' ,'besar', 'lagi', 'selama', 'antara', 'waktu', 'sebuah', 'jika', 'sampai', 'jadi', 'terhadap', 'tiga', 'serta', 'masalah', 'merupakan','rupa', 'atas' ,'sejak',  'buat', 'baik', 'miliki',  'kembali',  'pertama', 'kedua', 'memang', 'pernah', 'mulai','menanyakan','jawab', 'sama', 'tentang', 'bukan', 'agar', 'semua', 'sedang', 'kali', 'kemudian', 'hasil', 'sejumlah', 'juta', 'persen', 'sendiri', 'kata', 'demikian', 'salah',  'mungkin', 'umum', 'setiap', 'bulan','bila', 'terus', 'luar', 'cukup', 'bahkan', 'wib', 'tempat', 'perlu', 'guna', 'beri', 'rabu', 'sedangkan', 'kamis', 'langsung', 'apakah', 'pihak', 'diri',   'minggu', 'aku',  'berada', 'tinggi', 'ingin', 'tengah', 'kini', 'the', 'tahu', 'depan', 'selasa', 'begitu', 'mengenai',  'maka', 'jumlah', 'masuk',  'katanya', 'tanya', 'mengalami', 'sering', 'ujar', 'kondisi' ,'akibat' ,'hubungan', 'empat', 'paling', 'selalu', 'lima','macam'  ,'meminta', 'lihat', 'sekarang', 'mengaku', 'mau', 'kerja', 'acara', 'masa', 'proses', 'tanpa', 'selatan', 'sempat','hidup', 'datang', 'senin', 'rasa','seluruh' ,'mantan', 'lama', 'jenis' ,'segera', 'misal','bawah', 'jangan', 'meski','jumat',  'punya', 'yakni', 'kecil', 'panjang', 'badan' ,'juni', 'of' , 'jelas' ,'jauh', 'tentu', 'makin', 'tinggal' ,'kurang' , 'mampu', 'posisi' , 'asal', 'sekali',  'sesuai', 'sebesar', 'berat' , 'pagi' , 'sabtu' , 'nyata' ,'mencari','cari', 'sumber', 'ruang', 'menunjukkan' ,'nama'  ,'sebanyak', 'utara', 'berlangsung', 'barat', 'yaitu' , 'berdasarkan' , 'sebenarnya', 'cara', 'utama', 'pekan', 'terlalu' , 'bawa', 'butuh' ,'suatu' ,'menerima' , 'penting',  'tanggal', 'terutama' ,'tingkat', 'awal','sedikit' ,'nanti', 'pasti' , 'muncul', 'dekat' ,'lanjut' ,'ketiga', 'biasa' ,'dulu' ,'kesempatan',  'ribu',  'akhir' , 'bantu' ,'terkait'  ,'sebab', 'menyebabkan' ,'khusus' , 'bentuk', 'temu' , 'duga' ,'mana' ,'ya' ,'kegiatan' , 'tampil' ,'hampir' ,'temu', 'usai' ,'arti' ,'keluar' ,'pula', 'justru' , 'padahal', 'menyebutkan' , 'gedung'  ,'lagi', 'program',  'milik' ,'teman', 'putus', 'sumber'  , 'upaya', 'mengetahui' ,'ambil' ,'benar', 'lewat' ,'belakang' ,'ikut', 'barang', 'meningkatkan', 'kejadian', 'kehidupan', 'keterangan', 'masing','masing' ,'menghadapi', 'yang','di', 'dan', 'itu', 'dengan', 'untuk', 'tidak', 'ini', 'dari', 'dalam', 'akan', 'pada', 'juga', 'saya', 'ke', 'karena', 'tersebut', 'bisa', 'ada', 'mereka', 'lebih', 'kata', 'tahun', 'sudah','atau', 'saat', 'oleh', 'menjadi', 'orang', 'ia', 'telah', 'lalu', 'hal', 'pun', 'apa','turut','tutur','ujar','perbuat');

                                        //hapus term yang sama dengan stop word
                                    foreach ($astoplist as $i => $value) {
                                        $kunci3 = str_replace($astoplist[$i], "", $kunci3);
                                        } //end foreach
                                         
                                        $kunci3 = trim($kunci3);
                                            $token1 = strtok($kunci3, " ");
                                            $kunci4 = $tokenizer->tokenize($kunci3);
                                            $data = array_count_values($kunci4);
                                        ksort($data);
                                    foreach ($data as $xii => $token1) {
                                    echo $xii. " : " .$token1;
                                    echo "<br>";
                            }?>
                        </td>
                        
                        <td>
                            <?php 
                              $id_soal=$rows['id_soal'];
                              $dbcon = mysqli_connect('localhost','root','','db_ueapps');

                              $query2  = mysqli_query($dbcon, "SELECT * FROM soal WHERE soal.id_soal=$id_soal");
                              while ($rows = mysqli_fetch_array($query2)){
                                    $kunci5= $rows['kunci_jawaban'];

                                        $kunci5 = strtolower(trim($kunci5)); 
                                        //hilangkan tanda baca
                                        $kunci5 = str_replace("/[^a-zA-Z]/", " ", $kunci5);
     
                                      
                                        //daftar stop list      
                                        $astoplist = array ('capai','adalah', 'seperti', 'bagai', 'bahwa', 'dapat', 'para', 'harus' ,'namun', 'kita' , 'masih', 'hari', 'hanya', 'mengatakan' , 'kami',  'belum', 'selain', 'lain', 'dia', 'kalau', 'terjadi', 'banyak' ,'menurut' , 'anda' ,'hingga', 'tak' ,'baru' ,'beberapa', 'ketika', 'saja', 'jalan', 'sekitar', 'secara', 'laku', 'sementara' ,'tetapi','tapi' ,'sangat' ,'sehingga',  'seorang', 'bagi' ,'besar', 'lagi', 'selama', 'antara', 'waktu', 'sebuah', 'jika', 'sampai', 'jadi', 'terhadap', 'tiga', 'serta', 'masalah', 'merupakan','rupa', 'atas' ,'sejak',  'buat', 'baik', 'miliki',  'kembali',  'pertama', 'kedua', 'memang', 'pernah', 'mulai','menanyakan','jawab', 'sama', 'tentang', 'bukan', 'agar', 'semua', 'sedang', 'kali', 'kemudian', 'hasil', 'sejumlah', 'juta', 'persen', 'sendiri', 'kata', 'demikian', 'salah',  'mungkin', 'umum', 'setiap', 'bulan','bila', 'terus', 'luar', 'cukup', 'bahkan', 'wib', 'tempat', 'perlu', 'guna', 'beri', 'rabu', 'sedangkan', 'kamis', 'langsung', 'apakah', 'pihak', 'diri',   'minggu', 'aku',  'berada', 'tinggi', 'ingin', 'tengah', 'kini', 'the', 'tahu', 'depan', 'selasa', 'begitu', 'mengenai',  'maka', 'jumlah', 'masuk',  'katanya', 'tanya', 'mengalami', 'sering', 'ujar', 'kondisi' ,'akibat' ,'hubungan', 'empat', 'paling', 'selalu', 'lima','macam'  ,'meminta', 'lihat', 'sekarang', 'mengaku', 'mau', 'kerja', 'acara', 'masa', 'proses', 'tanpa', 'selatan', 'sempat','hidup', 'datang', 'senin', 'rasa','seluruh' ,'mantan', 'lama', 'jenis' ,'segera', 'misal','bawah', 'jangan', 'meski','jumat',  'punya', 'yakni', 'kecil', 'panjang', 'badan' ,'juni', 'of' , 'jelas' ,'jauh', 'tentu', 'makin', 'tinggal' ,'kurang' , 'mampu', 'posisi' , 'asal', 'sekali',  'sesuai', 'sebesar', 'berat' , 'pagi' , 'sabtu' , 'nyata' ,'mencari','cari', 'sumber', 'ruang', 'menunjukkan' ,'nama'  ,'sebanyak', 'utara', 'berlangsung', 'barat', 'yaitu' , 'berdasarkan' , 'sebenarnya', 'cara', 'utama', 'pekan', 'terlalu' , 'bawa', 'butuh' ,'suatu' ,'menerima' , 'penting',  'tanggal', 'terutama' ,'tingkat', 'awal','sedikit' ,'nanti', 'pasti' , 'muncul', 'dekat' ,'lanjut' ,'ketiga', 'biasa' ,'dulu' ,'kesempatan',  'ribu',  'akhir' , 'bantu' ,'terkait'  ,'sebab', 'menyebabkan' ,'khusus' , 'bentuk', 'temu' , 'duga' ,'mana' ,'ya' ,'kegiatan' , 'tampil' ,'hampir' ,'temu', 'usai' ,'arti' ,'keluar' ,'pula', 'justru' , 'padahal', 'menyebutkan' , 'gedung'  ,'lagi', 'program',  'milik' ,'teman', 'putus', 'sumber'  , 'upaya', 'mengetahui' ,'ambil' ,'benar', 'lewat' ,'belakang' ,'ikut', 'barang', 'meningkatkan', 'kejadian', 'kehidupan', 'keterangan', 'masing','masing' ,'menghadapi', 'yang','di', 'dan', 'itu', 'dengan', 'untuk', 'tidak', 'ini', 'dari', 'dalam', 'akan', 'pada', 'juga', 'saya', 'ke', 'karena', 'tersebut', 'bisa', 'ada', 'mereka', 'lebih', 'kata', 'tahun', 'sudah','atau', 'saat', 'oleh', 'menjadi', 'orang', 'ia', 'telah', 'lalu', 'hal', 'pun', 'apa','turut','tutur','ujar','perbuat');
                                     
                                        //hapus term yang sama dengan stop word
                                        foreach ($astoplist as $i => $value) {
                                        $kunci5 = str_replace($astoplist[$i], "", $kunci5);
                                        } //end foreach
                                         
                                        $kunci5 = trim($kunci5);

                                        
                                        $sentence = $kunci5 ;
                                        $output  = $stemmer->stem($sentence);

                                        $k1 = implode(" ", $jawaban2);
                                        $k2 = implode(" ", $kunci4);

                                        $sim = similar_text($k1, $k2, $similiarity);

                                        $nilai = number_format($similiarity,3);
                                        echo $nilai;
                               ?> 
                           </td>

                    </tr>
                    <?php
                        $id_soal = $rows['id_soal'];
                        $nilaii  = $nilai;

                        $hasil = "INSERT INTO hasil (nim, id_soal, nilai) VALUES
                                    ('$_SESSION[nim]', '$id_soal', '$nilaii')";

                                    mysqli_query($dbcon, $hasil);

                        }}}}
                    ?>
                   
                </tbody>
            </table>
        </div>

        <center><a href="hasilakhir.php" class="btn btn-primary"  style="margin-bottom: 10px;">
                <i class="fa fa-calculator"></i>    Hitung  </a></center>
        
</body>
<footer></footer>
</html>