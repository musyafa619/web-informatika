<?php
 $koneksi = mysqli_connect("localhost", "root", "root", "informatik");

    if(!$koneksi){
        die("Koneksi Gagagl".mysqli_connect_error());
    }else{
        // echo "Koneksi Berhasil !!!";
    }

    function tampilDataMahasiswa($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function hapusDataMahasiswa($id){
        global $koneksi;
        $query = "DELETE FROM mahasiswa WHERE id=$id";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

     function tambahDataMahasiswa($data){
      global $koneksi;

        var_dump($data);
        $nama = $data['nama'];
        $nim = $data['nim'];
        $jurusan = $data['jurusan'];
        $alamat = $data['alamat'];
        $foto = date('DMY_Hm') . $_FILES['foto']['name'];
        $tmpFoto = $_FILES['foto']['tmp_name'];
        $folder= 'images/';
        $path = $folder . $foto;

        if(move_uploaded_file($tmpFoto, $path)){
            $query = "INSERT INTO mahasiswa (nama, foto, nim, jurusan, alamat) VALUES ('$nama', '$foto', '$nim', '$jurusan', '$alamat')";
            mysqli_query($koneksi, $query);
            return mysqli_affected_rows($koneksi);
        } else {
            return mysqli_affected_rows($koneksi);
        }
    }

    function editDataMahasiswa($id,$data){
      global $koneksi;

        var_dump($data);
        $nama = $data['nama'];
        $nim = $data['nim'];
        $jurusan = $data['jurusan'];
        $alamat = $data['alamat'];
        $foto = date('DMY_Hm') . $_FILES['foto']['name'];
        $tmpFoto = $_FILES['foto']['tmp_name'];
        $folder= 'images/';
        $path = $folder . $foto;

        if(move_uploaded_file($tmpFoto, $path)){
            $query = "UPDATE mahasiswa set 
            foto= '$foto',
            nama= '$nama',
            nim= '$nim',
            jurusan= '$jurusan',
            alamat= '$alamat' 
            WHERE id=$id";
            var_dump($query);
            mysqli_query($koneksi, $query);
            return mysqli_affected_rows($koneksi);
        } else {
            return mysqli_affected_rows($koneksi);
        }
    }

    function register($data){
        global $koneksi;

        var_dump($data);
        $username = trim($data['username']);
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        $query_user_name = "SELECT id from user where username = $username";

        $username_check =  mysqli($koneksi, $query_user_name);

        if(mysqli_num_rows($username_check) > 0) {
            return "Username sudah terdaftar";
        }
        

        if(!preg_match("/[^a-zA-Z0-9._-]+$/",$username)){
            return "Username tidak valid";
        }

        if($password !== $confirmPassword){
            return "Konfirmasi password salah";
        }

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        
        if(mysqli_query($koneksi, $query)){
            return "Register berhasil";
        }else{
            return "Register gagal";
        }
    }

?>