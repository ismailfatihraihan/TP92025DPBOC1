<?php
class Mahasiswa
{
    var $nim;
    var $nama;
    var $gender;
    var $tempat;
    var $tl;
    var $email;
    var $telp; 

    function __construct($nim = '', $nama = '', $gender = '', $tempat = '', $tl = '', $email = '', $telp = '')
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->gender = $gender;
        $this->tempat = $tempat;
        $this->tl = $tl;
        $this->email = $email;
        $this->telp = $telp; 
    }

    function setNim($nim)
    {
        $this->nim = $nim;
    }

    function setNama($nama)
    {
        $this->nama = $nama;
    }

    function setGender($gender)
    {
        $this->gender = $gender;
    }
    
    function setTempat($tempat)
    {
        $this->tempat = $tempat;
    }
    
    function setTl($tl)
    {
        $this->tl = $tl;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function setTelp($telp)
    {
        $this->telp = $telp;
    }

    function getNim()
    {
        return $this->nim;
    }

    function getNama()
    {
        return $this->nama;
    }

    function getGender()
    {
        return $this->gender;
    }
    
    function getTempat()
    {
        return $this->tempat;
    }
    
    function getTl()
    {
        return $this->tl;
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
    function getTelp()
    {
        return $this->telp;
    }
}
?>