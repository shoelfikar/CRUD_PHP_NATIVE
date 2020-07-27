<?php 

$HOST = "localhost";
$USER = "root";
$PASSWORD = "";
$DATABASE = "karyawan";

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);
$noFile = '';
$notValid = '';
$toBig = '';
$registred = '';
$invailid = '';



function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function addKaryawan($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]); 
    $email = htmlspecialchars($data["email"]);
    $hp = htmlspecialchars($data["hp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    
    $foto = uploadFoto();

    if ( !$foto ) {
        return false;
    }

    $query = "INSERT INTO kary VALUES ('', '$nama', '$email', '$hp', '$jabatan', '$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function uploadFoto() {
    global $noFile;
    global $notValid;
    global $toBig;
    $name = $_FILES["foto"]["name"];
    $tmpName = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];
    $size = $_FILES["foto"]["size"];


    if ($error === 4) {
        $noFile = 'Tidak ada file yang di upload!';
        return false;
    }
    $validType = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $name);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ( !in_array($ekstensiFile, $validType) ) {
        $notValid = 'Tipe file harus : "jpg, jpeg, png"!';
        return false;
    }
    if ($size > 3000000) {
        $toBig = 'Ukuran File terlalu besar! size = 3Mb';
        return false;
    }

    $fileName = uniqid();
    $fileName .= '.';
    $fileName .= $ekstensiFile;
    move_uploaded_file($tmpName, 'Profil/' . $fileName);
    return $fileName;
}







function delete($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM kary WHERE id = $id");

    return mysqli_affected_rows($conn);
}



function update($data,$id, $gambar) {
    global $conn;
    $id = $id;
    $nama = htmlspecialchars($data["nama"]); 
    $email = htmlspecialchars($data["email"]);
    $hp = htmlspecialchars($data["hp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $foto = htmlspecialchars($gambar);


    if ($_FILES["foto"]["error"] === 4) {
        $fotoBaru = $foto;
    }else {
        $fotoBaru = uploadFoto();
    }

    $query = "UPDATE kary SET nama = '$nama', email = '$email', hp = '$hp', jabatan = '$jabatan', foto = '$fotoBaru' WHERE id = $id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




function search($keyword) {
    $query = "SELECT * FROM kary WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR hp LIKE '%$keyword%' OR jabatan LIKE '%$keyword%'";
    return query($query);
}





function registrasi($data) {
    global $conn;
    global $registred;
    $username = strtoupper(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $confirm = mysqli_real_escape_string($conn, $data["confirm"]);

    $user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_fetch_assoc($user)) {
        $registred = 'Email anda sudah terdaftar!';
        return false;
    }

    if ($password !== $confirm) {
        return false;
    }else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users VALUES ('', '$username', '$email', '$password')";
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }

}



function login($data) {
    global $conn;
    global $invailid;
    $email = $data["email"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            if (isset($data["remember"])) {
                setcookie('id', $row["id"], time() + 60 * 2);
                setcookie('remember', hash('sha256',$row["username"]), time() + 60 * 2);
            }
            return true;
        }else {
            return false;
        }
    }else {
       $invailid = 'Email anda belum terdaftar,Silahkan registrasi!';
       return false;
    }
}


?>