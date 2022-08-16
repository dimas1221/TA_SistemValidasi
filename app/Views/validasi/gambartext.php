<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Validasi gambar</h1>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-input upload" style="height:20% ;">
                                        <i class="bi bi-cloud-upload-fill text-primary" style="font-size: 50px;"></i>
                                        <button class="btn btn-primary ab">Upload file
                                            <input type="file" name="image" onchange="prevImg()" id="in" required>
                                        </button>
                                        <label for="pdf_file" class="label" style="font-size: medium;"></label>
                                    </div>
                                    <input type="submit" name="image" class="btn btn-light mb-3" value="Convert">
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-7 offset-sm-0">
                        <?php
                        $read = "";
                        $a = "";
                        if (isset($_FILES['image'])) {
                            $file_name = $_FILES['image']['name'];
                            $file_tmp = $_FILES['image']['tmp_name'];
                            move_uploaded_file($file_tmp, "images/" . $file_name);
                            // echo "<h3>Image Upload Success</h3>";
                            echo '<img src="/images/' . $file_name . '" style="width:100%">';

                            // shell_exec('"C:\\Program Files\\Tesseract-OCR\\tesseract" "C:\\xampp\\htdocs\\images\\' . $file_name . '" out');
                            shell_exec('"C:\\Program Files\\Tesseract-OCR\\tesseract" "C:\\xampp\\htdocs\\TA_SistemValidasi\\public\\images\\' . $file_name . '" out');

                            // echo "<br><h3>OCR after reading</h3><br><pre>";

                            $myfile = fopen("out.txt", "r") or die("Unable to open file!");
                            // echo fread($myfile, filesize("out.txt"));
                            // fclose($myfile);
                            // echo "</pre>";
                            $read = fread($myfile, filesize("out.txt"));
                            $a = nl2br($read);
                        }
                        $hasilIPK = '';
                        $ipk = '';
                        // regex ipk
                        if (preg_match("/(Index(\s|)Prestasi(\s|)Kumulatif(\s|):(\s|)(3.)[0-9]{0,2})|(Index(\s|)Prestasi(\s|)Kumulatif(\s|):(\s|)(2.)[5-9]{1,2})|(Index(\s|)Prestasi(\s|)Kumulatif(\s|):(\s|)(4.)[0]{1,2})/mix", $a)) {
                            $ipk = 'bi bi-check-circle-fill text-success';
                        } else if ($a == '') {
                            $ipk = '';
                        } else {
                            $ipk = 'bi bi-x-circle-fill text-danger';
                        }
                        // mengambil nilai ipk
                        $patternIPK = "/(Index(\s|)Prestasi(\s|)Kumulatif(\s|):(\s|)[0-9]{0,2}.[0-9]{0,2})/mix";
                        $pattern = preg_match($patternIPK, $a, $matchesIPK, PREG_UNMATCHED_AS_NULL);
                        $conversiIPK = implode("", $matchesIPK);
                        $hasilIPK = substr($conversiIPK, 27, 4);
                        ?>
                        <hr>
                        <h5 class="text-primary">Kriteria Pengambilan Tugas Akhir</h5>
                        <hr>
                        <p class="text-info">IPK minimal 2.5</p>
                        <p>nilai ipk mhs = <?= $hasilIPK; ?></p>
                        <p><i class="<?= $ipk ?>"></i> Index Prestasi Kumulatif(IPK)</p>
                    </div>
                    <div class="col-sm-5 offset-sm-0">
                        <h6 class="text-info">Cocokan jika ada tulisan yang tidak sesuai gambar</h6>
                        <hr>
                        <!-- <textarea style="width:100% ; height:600px ;"><?= $read ?></textarea> -->
                        <?= $a ?>
                    </div>
                </div>
            </div>
    </section>
</div>
<?= $this->endSection(); ?>