<?php

include_once("KontrakView.php");
include_once(__DIR__ . "/../presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
    private $prosesmahasiswa;
    private $tpl;

    function __construct()
    {
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $data = null;

        $data .= '<div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Data Mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <a href="index.php?add=1" class="btn btn-success mb-3">Add New Student</a>
                        <div id="message-container"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tempat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';

        $no = 1;
        $dataMahasiswa = $this->prosesmahasiswa->getDataMahasiswa();
        foreach ($dataMahasiswa as $val) {
            $data .= '<tr>
                        <td>' . $no . '</td>
                        <td>' . $val->getNim() . '</td>
                        <td>' . $val->getNama() . '</td>
                        <td>' . $val->getGender() . '</td>
                        <td>' . $val->getTempat() . '</td>
                        <td>' . $val->getTl() . '</td>
                        <td>' . $val->getEmail() . '</td>
                        <td>' . $val->getTelp() . '</td>
                        <td>
                            <a href="index.php?edit=' . $val->getNim() . '" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?delete=' . $val->getNim() . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this student?\')">Delete</a>
                        </td>
                    </tr>';
            $no++;
        }

        $data .= '</tbody>
                </table>
            </div>
        </div>
    </div>';

        // Load template
        $this->tpl = new Template(__DIR__ . "/../templates/skin.html");
        $this->tpl->replace("DATA_MAIN", $data);
        $this->tpl->write();
    }

    function tampilForm($action, $data = null)
    {
        $nim = "";
        $nama = "";
        $gender_l = "";
        $gender_p = "";
        $tempat = "";
        $tl = "";
        $email = "";
        $telp = "";
        $title = "Add New Student";
        $button = "Add";
        $url = "index.php?add_process=1";

        if ($action == "edit" && $data != null) {
            $nim = $data->getNim();
            $nama = $data->getNama();
            $gender = $data->getGender();
            $gender_l = ($gender == "L") ? "checked" : "";
            $gender_p = ($gender == "P") ? "checked" : "";
            $tempat = $data->getTempat();
            $tl = $data->getTl();
            $email = $data->getEmail();
            $telp = $data->getTelp();
            $title = "Edit Student";
            $button = "Update";
            $url = "index.php?edit_process=1";
        }

        $form = '<div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">' . $title . '</h3>
                    </div>
                    <div class="card-body">
                        <div id="message-container"></div>
                        <form action="' . $url . '" method="post">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="' . $nim . '" ' . ($action == "edit" ? "readonly" : "required") . '>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="' . $nama . '" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_l" value="L" ' . $gender_l . ' required>
                                    <label class="form-check-label" for="gender_l">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_p" value="P" ' . $gender_p . '>
                                    <label class="form-check-label" for="gender_p">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" value="' . $tempat . '" required>
                            </div>
                            <div class="form-group">
                                <label for="tl">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tl" name="tl" value="' . $tl . '" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="' . $email . '" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="' . $telp . '" required>
                            </div>
                            <button type="submit" class="btn btn-primary">' . $button . '</button>
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>';

        // Load template
        $this->tpl = new Template(__DIR__ . "/../templates/skin.html");
        $this->tpl->replace("DATA_MAIN", $form);
        $this->tpl->write();
    }

    function tampilMessage($message, $type)
    {
        $alertClass = ($type == "success") ? "alert-success" : "alert-danger";
        
        $alert = '<div class="alert ' . $alertClass . ' alert-dismissible fade show" role="alert">
                    ' . $message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                  
        return $alert;
    }
    
    // Add a new method to display message with data
    function tampilWithMessage($message)
    {
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $data = null;

        // Add message at the top
        $data .= $message;

        $data .= '<div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Data Mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <a href="index.php?add=1" class="btn btn-success mb-3">Add New Student</a>
                        <div id="message-container"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tempat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';

        $no = 1;
        $dataMahasiswa = $this->prosesmahasiswa->getDataMahasiswa();
        foreach ($dataMahasiswa as $val) {
            $data .= '<tr>
                        <td>' . $no . '</td>
                        <td>' . $val->getNim() . '</td>
                        <td>' . $val->getNama() . '</td>
                        <td>' . $val->getGender() . '</td>
                        <td>' . $val->getTempat() . '</td>
                        <td>' . $val->getTl() . '</td>
                        <td>' . $val->getEmail() . '</td>
                        <td>' . $val->getTelp() . '</td>
                        <td>
                            <a href="index.php?edit=' . $val->getNim() . '" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?delete=' . $val->getNim() . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this student?\')">Delete</a>
                        </td>
                    </tr>';
            $no++;
        }

        $data .= '</tbody>
                </table>
            </div>
        </div>
    </div>';

        // Load template
        $this->tpl = new Template(__DIR__ . "/../templates/skin.html");
        $this->tpl->replace("DATA_MAIN", $data);
        $this->tpl->write();
    }
}