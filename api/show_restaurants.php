<?php
//todo: give filter, where;
include '../connect/db_connect.php';

$sql = "SELECT * FROM restaurants";
$result = $connect->query($sql);
$limit = $_GET['limit'];

$data = array();

$sql = "SELECT * FROM restaurants WHERE active = 2";
$result = $connect->query($sql);


if ($result->num_rows >0) {
    while ($row = $result->fetch_assoc()) {
        $data[]=array("name"=>$row['restaurant_name'], "address" =>$row['restaurant_address'], "category"=> $row['restaurant_category'], "contact"=>  $row['restaurant_contact'],"description"=> $row['restaurant_description'],"restaurant_id"=>$row['restaurant_id']);
    }
    echo json_encode($data);
} else {
    echo '[{"name":"no data yet"}]';
}


//name , nama_user_input  , tanggal , description , total_baca  total_komentar

// echo '[{"name":"Kematian Pohon Pete Akibat Campuran Terasi","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"Weni Handayani","total_baca":"805","total_komentar":"1","foto":null},{"name":"Bagaimana pengolahan singkong agar bisa menjadi beras dan disimpan dalam jangka waktu yang lama? ","description":"Bagaimana pengolahan singkong agar bisa menjadi beras dan disimpan dalam jangka waktu yang lama?","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"Weni Handayani","total_baca":"152","total_komentar":"0","foto":null},{"name":"Apakah padi ipb 3s dan pepaya calina cocok untuk ditanam di daerah puncak dekat Cipanas?","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"IPBCYBEX","total_baca":"144","total_komentar":"0","foto":null},{"name":"Apakah kotoran ayam bisa dijadikan pupuk cair? ","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"IPBCYBEX","total_baca":"206","total_komentar":"0","foto":null},{"name":"Bagaimana Cara Pengolahan Singkong Menjadi Beras atau Oyek?","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"IPBCYBEX","total_baca":"130","total_komentar":"0","foto":null}]';
