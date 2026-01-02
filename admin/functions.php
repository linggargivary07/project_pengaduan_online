<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "pengaduan_kampus");

// ini_set('display_errors', 1);
// error_reporting(E_ALL);


// if ($conn->connect_error) {
//     // Jika koneksi gagal, hentikan eksekusi dan tampilkan pesan error
//     die("Koneksi gagal: " . $conn->connect_error);
// }
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $room_name = $data['room_name'];
    $description = htmlspecialchars($data['description']);
    $price_per_night = htmlspecialchars($data['price_per_night']);
    $max_guest = htmlspecialchars($data['max_guest']);
    $bed_type = htmlspecialchars($data['bed_type']);
    $status = htmlspecialchars($data['status']);
    $room_type = htmlspecialchars($data['room_type']);
    
    
    // upload gambar
    $image_url = upload();
    if( !$image_url ) {
        return false;
    }

    $query = "INSERT INTO room 
        (room_id, room_name, description, price_per_night, max_guest, bed_type, image_url, status, room_type)
        VALUES 
        (NULL, '$room_name', '$description', '$price_per_night', '$max_guest', '$bed_type', '$image_url', '$status', '$room_type')
    ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}

function upload() {
    $nameFile = $_FILES['image_url']['name'];
    $sizeFile = $_FILES['image_url']['size'];
    $error = $_FILES['image_url']['error'];
    $tmpName = $_FILES['image_url']['tmp_name'];
    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $sizeFile > 1000000 ) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../img/room_hotel/' . $namaFileBaru);

    return $namaFileBaru;
    
}

function update($data) {
    global $conn;

    $room_name = $data['room_name'];
    $description = htmlspecialchars($data['description']);
    $price_per_night = htmlspecialchars($data['price_per_night']);
    $max_guest = htmlspecialchars($data['max_guest']);
    $bed_type = htmlspecialchars($data['bed_type']);
    $status = htmlspecialchars($data['status']);
    $room_type = htmlspecialchars($data['room_type']);
    
    
    // upload gambar
    $image_url = upload();
    if( !$image_url ) {
        return false;
    }

    $query = "UPDATE room SET
        room_id = $data[room_id],
        room_name = '$room_name',
        description = '$description',
        price_per_night = '$price_per_night',
        max_guest = '$max_guest',
        bed_type = '$bed_type',
        image_url = '$image_url',
        status = '$status',
        room_type = '$room_type'
        WHERE room_id = $data[room_id]
    ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));


    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM room WHERE room_id = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function register($data) {
    global $conn;

    $name = htmlspecialchars($data['name']);
    $email = strtolower(stripslashes($data['email']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $role = htmlspecialchars($data['role']);

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('Email sudah terdaftar!');
              </script>";
        return false;
    }

    // enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$name', '$email', '$password', '$role')");

    return mysqli_affected_rows($conn);
}   

function login($data) {
    global $conn;

    $email = $data["email"];
    $password = $data["password"];
    $_SESSION["email"] = $email;

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    // $_SESSION['user_id'] = mysqli_fetch_assoc($result)['user_id'];

    // cek email
    if(mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if($password == $row["password"]) {
            // set session
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            if( $row["role"] == "admin" ) {
                header("Location: admin/admin_dashboard.php");
                exit;
            }else {
                header("Location: student_dashboard.php");
                exit;
            }
        }
    }

    echo "<script>
            alert('Email atau password salah!');
          </script>";
    return false;
}

?>