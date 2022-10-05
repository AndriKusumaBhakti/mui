<?php
    require('../connect.php');
    header('Content-Type: application/json');
    function liveStreaming(){
        global $conn;
        $response["status"] = false;
        $response["message"] = "";
        $response["result"] = []; 
        $getsurat = mysqli_query($conn, "select * from m_channel_youtobe where (time_from_show < time_to_show and cast(NOW() as TIME) between time_from_show and time_to_show)");
        if(mysqli_num_rows($getsurat) > 0){
            while($row = mysqli_fetch_array($getsurat)){
                $response['result'][] = [
                    'id' => $row['id'],
                    'link_channel' => $row['link_channel'],
                    'judul' => $row['judul'],
                    'description' => $row['description']
                ];
            }
            $response['status'] = TRUE;
            $response['message'] = "Data ditemukan";
        }else{
            $response['message'] = "Data tidak ditemukan";
        }
        return $response;
    }

    function mediaSosial(){
        global $conn;
        $response["status"] = FALSE;
        $response["message"] = "";
        $response["result"] = []; 
        $getsurat = mysqli_query($conn, "select * from master_data where tipe IN ('longitude', 'latitude', 'facebook', 'instagram', 'youtube', 'twitter', 'website', 'privacy_police') ORDER BY tipe ASC");
        if(mysqli_num_rows($getsurat) > 0){
            while($row = mysqli_fetch_array($getsurat)){
                $response['result'][] = [
                    'tipe' => $row['tipe'],
                    'kode' => $row['kode'],
                    'nama' => $row['nama'],
                    'description' => $row['deskripsi']
                ];
            }
            $response['status'] = TRUE;
            $response['message'] = "Data ditemukan";
        }else{
            $response['message'] = "Data tidak ditemukan";
        }
        return $response;
    }

    $method = $_GET['method'];
    $data = $method();
    echo json_encode($data);
?>