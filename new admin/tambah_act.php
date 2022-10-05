<?php
    include "./config.php";
    $add = $_POST["add"];
    $query = "";
    if ($add == "streaming"){
        $time_from_show = $_POST["time_from_show"];
        $link_channel = $_POST["link_channel"];
        $judul = $_POST["judul"];
        $description = $_POST["description"];
        $time_to_show = $_POST["time_to_show"];
        $link_channel_web = $_POST["link_channel_web"];
        $query = "INSERT INTO `m_channel_youtobe` (`time_from_show`, `link_channel`,  `judul`, `description`, `time_to_show`, `link_channel_web`) VALUES('$time_from_show', '$time_to_show', '$judul' ,'$description','$time_to_show','$link_channel_web')";
    }else if ($add == "berita"){
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
                $judul = $_POST["judul"];
                $kategori_code = $_POST["kategori_code"];
                $query = "INSERT INTO `berita` (`tanggal`, `judul`,  `berita`, `image_src`, `kategori_code`) VALUES('$tanggal', '$judul', '$berita' ,'$file_name_new','$kategori_code')";
            }else{
                echo "ERROR Aploud FILE";
            }
        }else{
            echo "ERROR file Terlalu besar";
        }
    }else if ($add == "kategori"){
        
        $add = "kategori_berita";
        $kategori = $_POST["kategori"];
        $deskripsi = $_POST["deskripsi"];
        $jml = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM `master_data` WHERE tipe = 'kategori'");
        $feact_jml = mysqli_fetch_array($jml);
        $jumlah = $feact_jml['jumlah'];
        $jumlah = $jumlah +1;
        $jumlah = "00$jumlah";
        $query = "INSERT INTO `master_data` (`kode`, `nama`,  `tipe`, `deskripsi`) VALUES('$jumlah', '$kategori', 'kategori' ,'$deskripsi')";
    }
    if(mysqli_query($conn, $query)){
        header("Location: https://admin.muitvkotabekasi.com/$add.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>