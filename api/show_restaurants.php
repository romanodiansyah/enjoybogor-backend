<?php
//todo: give filter, where;
include '../connect/db_connect.php';

$sql = "SELECT * FROM restaurants";
$result = $connect->query($sql);
$limit = $_GET['limit'];

$data = array();




// if ($result->num_rows >0) {
//     while ($row = $result->fetch_assoc()) {
//         $data[]=array("name"=>$row['restaurant_name'], "address" =>$row['restaurant_address'], "category"=> $row['restaurant_category'], "contact"=>  $row['restaurant_contact'],"descripttion"=> $row['restaurant_description']);
//         echo json_encode($data);
//     }
// } else {
//     echo "no data";
// }




echo '[{"id_artikel":"426","id_kategori":"2","id_topik":null,"id_komoditas":null,"name":"Kematian Pohon Pete Akibat Campuran Terasi","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"Weni Handayani","total_baca":"805","total_komentar":"1","foto":null},{"id_artikel":"425","id_kategori":"2","id_topik":null,"id_komoditas":null,"name":"Bagaimana pengolahan singkong agar bisa menjadi beras dan disimpan dalam jangka waktu yang lama? ","description":"Bagaimana pengolahan singkong agar bisa menjadi beras dan disimpan dalam jangka waktu yang lama?","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"Weni Handayani","total_baca":"152","total_komentar":"0","foto":null},{"id_artikel":"422","id_kategori":"2","id_topik":null,"id_komoditas":null,"name":"Apakah padi ipb 3s dan pepaya calina cocok untuk ditanam di daerah puncak dekat Cipanas?","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"IPBCYBEX","total_baca":"144","total_komentar":"0","foto":null},{"id_artikel":"421","id_kategori":"2","id_topik":null,"id_komoditas":null,"name":"Apakah kotoran ayam bisa dijadikan pupuk cair? ","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"IPBCYBEX","total_baca":"206","total_komentar":"0","foto":null},{"id_artikel":"420","id_kategori":"2","id_topik":null,"id_komoditas":null,"name":"Bagaimana Cara Pengolahan Singkong Menjadi Beras atau Oyek?","description":"Pertanyaan IPB Cyber Extension (Cybex) 2016 Lembaga Penelitian dan Pengabdian kepada Masyarakat  IPB...","artikel_status":"publish","tanggal":"6 bulan yang lalu","nama_user_input":"IPBCYBEX","total_baca":"130","total_komentar":"0","foto":null}]';
