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
                    <div class="col-sm-12 offset-sm-0">
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
                                    <input type="submit" name="image" class="btn btn-light mb-3" value="Validasi">
                                </form>
                                <!-- <textarea style="width:100% ; height:500px ;"></textarea> -->
                                <?php
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
                                    echo fread($myfile, filesize("out.txt"));
                                    fclose($myfile);
                                    echo "</pre>";
                                    // $read = fread($myfile, filesize("out.txt"));
                                    // $a = nl2br($read);
                                }
                                ?>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-5 offset-sm-0">

                    </div> -->
                </div>
            </div>
    </section>
</div>
<?= $this->endSection(); ?>