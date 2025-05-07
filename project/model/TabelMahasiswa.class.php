<?php
class TabelMahasiswa extends DB
{
    function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa";
        return $this->execute($query);
    }

    function getMahasiswaById($id)
    {
        $query = "SELECT * FROM mahasiswa WHERE nim='$id'";
        return $this->execute($query);
    }

    function addMahasiswa($data)
    {
        $nim = $data->getNim();
        $nama = $data->getNama();
        $gender = $data->getGender();
        $tempat = $data->getTempat();
        $tl = $data->getTl();
        $email = $data->getEmail();
        $telp = $data->getTelp(); // Changed from getPhone to getTelp
        
        // Escape strings to prevent SQL injection
        $nim = mysqli_real_escape_string($this->db_link, $nim);
        $nama = mysqli_real_escape_string($this->db_link, $nama);
        $gender = mysqli_real_escape_string($this->db_link, $gender);
        $tempat = mysqli_real_escape_string($this->db_link, $tempat);
        $tl = mysqli_real_escape_string($this->db_link, $tl);
        $email = mysqli_real_escape_string($this->db_link, $email);
        $telp = mysqli_real_escape_string($this->db_link, $telp); 
        
        $query = "INSERT INTO mahasiswa (nim, nama, gender, tempat, tl, email, telp) 
                  VALUES ('$nim', '$nama', '$gender', '$tempat', '$tl', '$email', '$telp')"; 
        
        return $this->execute($query);
    }

    function updateMahasiswa($data)
    {
        $nim = $data->getNim();
        $nama = $data->getNama();
        $gender = $data->getGender();
        $tempat = $data->getTempat();
        $tl = $data->getTl();
        $email = $data->getEmail();
        $telp = $data->getTelp(); // Changed from getPhone to getTelp
        
        // Escape strings to prevent SQL injection
        $nim = mysqli_real_escape_string($this->db_link, $nim);
        $nama = mysqli_real_escape_string($this->db_link, $nama);
        $gender = mysqli_real_escape_string($this->db_link, $gender);
        $tempat = mysqli_real_escape_string($this->db_link, $tempat);
        $tl = mysqli_real_escape_string($this->db_link, $tl);
        $email = mysqli_real_escape_string($this->db_link, $email);
        $telp = mysqli_real_escape_string($this->db_link, $telp); 
        
        $query = "UPDATE mahasiswa 
                  SET nama='$nama', gender='$gender', tempat='$tempat', tl='$tl', email='$email', telp='$telp' 
                  WHERE nim='$nim'"; 
        
        return $this->execute($query);
    }

    function deleteMahasiswa($id)
    {
        $id = mysqli_real_escape_string($this->db_link, $id);
        $query = "DELETE FROM mahasiswa WHERE nim='$id'";
        return $this->execute($query);
    }
}
?>