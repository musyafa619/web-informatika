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
?>