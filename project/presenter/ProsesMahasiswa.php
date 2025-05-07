<?php

include_once(__DIR__ . "/KontrakPresenter.php");
include_once(__DIR__ . "/../model/TabelMahasiswa.class.php");
include_once(__DIR__ . "/../model/Mahasiswa.class.php");

class ProsesMahasiswa implements KontrakPresenter
{
    private $tabelmahasiswa;
    private $data = [];
    private $error = "";

    function __construct()
    {
        $this->tabelmahasiswa = new TabelMahasiswa();
    }

    function prosesDataMahasiswa()
    {
        $this->tabelmahasiswa->open();
        $this->data = array();
        
        $result = $this->tabelmahasiswa->getMahasiswa();
        
        if ($result) {
            while ($row = $this->tabelmahasiswa->getResult()) {
                $mahasiswa = new Mahasiswa();
                $mahasiswa->setNim($row['nim']);
                $mahasiswa->setNama($row['nama']);
                $mahasiswa->setGender($row['gender']);
                $mahasiswa->setTempat(isset($row['tempat']) ? $row['tempat'] : '');
                $mahasiswa->setTl(isset($row['tl']) ? $row['tl'] : '');
                $mahasiswa->setEmail(isset($row['email']) ? $row['email'] : '');
                $mahasiswa->setTelp(isset($row['telp']) ? $row['telp'] : ''); 
                
                $this->data[] = $mahasiswa;
            }
        } else {
            $this->error = $this->tabelmahasiswa->getError();
        }
        
        $this->tabelmahasiswa->close();
    }

    function getId($id)
    {
        $this->tabelmahasiswa->open();
        $this->tabelmahasiswa->getMahasiswaById($id);
        $data = $this->tabelmahasiswa->getResult();
        
        if ($data) {
            $mahasiswa = new Mahasiswa();
            $mahasiswa->setNim($data['nim']);
            $mahasiswa->setNama($data['nama']);
            $mahasiswa->setGender($data['gender']);
            $mahasiswa->setTempat(isset($data['tempat']) ? $data['tempat'] : '');
            $mahasiswa->setTl(isset($data['tl']) ? $data['tl'] : '');
            $mahasiswa->setEmail(isset($data['email']) ? $data['email'] : '');
            $mahasiswa->setTelp(isset($data['telp']) ? $data['telp'] : ''); 
            
            $this->data = $mahasiswa;
        } else {
            $this->error = $this->tabelmahasiswa->getError();
            $this->data = null;
        }
        
        $this->tabelmahasiswa->close();
        
        return $this->data;
    }

    function prosesAddMahasiswa($data)
    {
        $this->tabelmahasiswa->open();
        $result = $this->tabelmahasiswa->addMahasiswa($data);
        
        if (!$result) {
            $this->error = $this->tabelmahasiswa->getError();
        }
        
        $this->tabelmahasiswa->close();
        
        return $result;
    }

    function prosesUpdateMahasiswa($data)
    {
        $this->tabelmahasiswa->open();
        $result = $this->tabelmahasiswa->updateMahasiswa($data);
        
        if (!$result) {
            $this->error = $this->tabelmahasiswa->getError();
        }
        
        $this->tabelmahasiswa->close();
        
        return $result;
    }

    function prosesDeleteMahasiswa($id)
    {
        $this->tabelmahasiswa->open();
        $result = $this->tabelmahasiswa->deleteMahasiswa($id);
        
        if (!$result) {
            $this->error = $this->tabelmahasiswa->getError();
        }
        
        $this->tabelmahasiswa->close();
        
        return $result;
    }

    function getDataMahasiswa()
    {
        return $this->data;
    }
    
    function getError()
    {
        return $this->error;
    }
}