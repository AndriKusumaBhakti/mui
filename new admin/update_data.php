<?php
    include "./config.php";
    // var_dump($_POST);
    $id = $_POST["id"];
    $update = $_POST["update"];
    $query = "";
    if ($update == "streaming"){
        $time_from_show = $_POST["time_from_show"];
        $link_channel = $_POST["link_channel"];
        $judul = $_POST["judul"];
        $description = $_POST["description"];
        $time_to_show = $_POST["time_to_show"];
        $link_channel_web = $_POST["link_channel_web"];
        $query = "UPDATE m_channel_youtobe SET time_from_show='$time_from_show',link_channel='$link_channel',judul='$judul',description='$description',time_from_show='$time_from_show',time_to_show='$time_to_show',link_channel_web='$link_channel_web' WHERE id=$id";
        
    }else if ($update == "berita"){

        $fileextstored = array('png', 'jpg', 'jpeg');
        $image_src = $_FILES['image_src'];
        $filename = $image_src['name'];
        $filetmp = $image_src['tmp_name'];
        $fileSize = $image_src['size'];
        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));
        if (in_array($filecheck, $fileextstored) && $fileSize < 100000) {
            $file_name_new = "FILE_BERITA_".date('Y-m-d')."_".date('H:i:s').".".$filecheck;
            $destinationfile = "../img/".$file_name_new;
            if(move_uploaded_file($filetmp, $destinationfile)){
                $tanggal = $_POST["tanggal"];
                $berita = $_POST["berita"];
                $image_src = $_POST["image_src"];
                $judul = $_POST["judul"];
                $kategori_code = $_POST["kategori_code"];
                $query = "UPDATE`berita` SET `tanggal`='$tanggal',`judul`='$judul',`berita`='$berita',`image_src`='$file_name_new',`kategori_code`='$kategori_code' WHERE id=$id";
            }else{
                echo "ERROR Aploud FILE";
            }
        }else{
            echo "ERROR file Terlalu besar";
        }
        
    }else if ($update == "kategori"){
        $update = "kategori_berita";
        $kategori = $_POST["kategori"];
        $deskripsi = $_POST["deskripsi"];
        $query = "UPDATE`master_data` SET `nama`='$kategori',`deskripsi`='$deskripsi' WHERE id=$id";
        
    }else if ($update == "media_sosial"){
        $link = $_POST["link"];
        $deskripsi = $_POST["deskripsi"];
        $query = "UPDATE`master_data` SET `kode`='$link',`deskripsi`='$deskripsi' WHERE id=$id";
        
    }else if ($update == "komentar"){
        $lain = $_POST["lain"];
        $query = "UPDATE`komentar` SET `lain`='$lain' WHERE id=$id";
        
    }
    if(mysqli_query($conn, $query)){
        header("Location: https://admin.muitvkotabekasi.com/$update.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>