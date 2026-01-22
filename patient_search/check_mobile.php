<?php
include '../../db_Setup/db.php';  

$mobile = $_POST['mobile'];

$sql = "SELECT * FROM patients WHERE mobile = '$mobile'";
$result = $conn->query($sql);

$response = ['duplicate' => false, 'table' => ''];

if ($result->num_rows > 0) {
    $response['duplicate'] = true;
    $table = '<table><tr><th>নাম</th><th>বয়স</th><th>অ্যাড্রেস</th></tr>';
    while ($row = $result->fetch_assoc()) {
        $table .= '<tr><td>' . $row['name'] . '</td><td>' . $row['age'] . '</td><td>' . $row['address'] . '</td></tr>';
    }
    $table .= '</table>';
    $response['table'] = $table;
}

echo json_encode($response);
?>