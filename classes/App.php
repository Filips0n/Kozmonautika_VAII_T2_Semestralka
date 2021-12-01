<?php
require "DBStorage.php";
require "Rocket.php";
require "Manufacturer.php";

class App
{
    private DBStorage $storage;
    private string $imageName="";
    public function __construct()
    {
        $this->storage = new DBStorage();
        if (isset($_FILES['file'])) {
            if ($this->validateFormAdd()) {

                $this->saveImage();

                $manufacturer_id = $this->test_input($_POST["manufacturer_id"]);
                $name = $this->test_input($_POST["name"]);
                $human_rated = $this->test_input($_POST["human_rated"]);
                $payload = $this->test_input($_POST["payload"]);
                $height = $this->test_input($_POST["height"]);

                $newRocket = new Rocket(0, $manufacturer_id, $this->imageName, $name, $human_rated, $payload, $height);
                $this->storage->addRocket($newRocket);
            }
        }

        if (isset($_GET['delete'])) {
            $this->storage->removeRocket($_GET['delete']);
            header('Location: /semestralka2/php/rakety.php');
            exit;
        }

        if (isset($_POST['rocket-edit'])) {
            if ($this->validateFormEdit()) {
                $manufacturer_id = $this->test_input($_POST["rocket-edit-manufacturer"]);
                $name = $this->test_input($_POST["rocket-edit-name"]);
                $human_rated = $this->test_input($_POST["rocket-edit-human-rated"]);
                $payload = $this->test_input($_POST["rocket-edit-payload"]);
                $height = $this->test_input($_POST["rocket-edit-height"]);
                $id = $this->test_input($_POST["rocket-edit-id"]);

                $rocket = new Rocket($id, $manufacturer_id, $this->imageName, $name, $human_rated, $payload, $height);
                //$rocket = new Rocket($_POST['rocket-edit-id'], manufacturer_id: $_POST['rocket-edit-manufacturer'], name: $_POST['rocket-edit-name'], human_rated: $_POST['rocket-edit-human-rated'], payload: $_POST['rocket-edit-payload'], height: $_POST['rocket-edit-height']);
                $this->storage->updateRocket($id, $rocket);
            }
        }
    }

    private function validateFormAdd(): bool
    {
        $name = $_POST ["name"];
        if (empty($_POST["name"]) || !preg_match ("/^[A-Za-z0-9-_ ]+$/", $name) || strlen($name) > 20) {
            return false;
        }

        $humanRated = $_POST['human_rated'];
        if (!preg_match ("/^[01]*$/", $humanRated)) {
            return false;
        }

        $numbers09Add = array($_POST['manufacturer_id'], $_POST['payload'], $_POST['height']);
        foreach ($numbers09Add as $number) {
            if (!preg_match ("/^[0-9,.]*$/", $number) || $_POST['payload'] > 999.0 || $_POST['height'] > 999.0) {
                return false;
            }
        }

        $img = $_FILES['file']['name'];
        if (empty($_FILES['file']['name']) || strlen($img) > 100) {
            return false;
        }

        return true;
    }

    private function validateFormEdit(): bool
    {
        $name = $_POST ["rocket-edit-name"];
        if (empty($_POST["rocket-edit-name"]) || !preg_match ("/^[A-Za-z0-9-_ ]+$/", $name) || strlen($name) > 20) {
            return false;
        }

        $humanRated = $_POST['rocket-edit-human-rated'];
        if (!preg_match ("/^[01]*$/", $humanRated)) {
            return false;
        }

        $id = $_POST['rocket-edit-id'];
        if (!preg_match ("/^[0-9]*$/", $id)) {
            return false;
        }

        $numbers09Edit = array($_POST['rocket-edit-manufacturer'], $_POST['rocket-edit-payload'], $_POST['rocket-edit-height']);
        foreach ($numbers09Edit as $number) {
            if (!preg_match ("/^[0-9,.]*$/", $number) || $_POST['rocket-edit-payload'] > 999.0 || $_POST['rocket-edit-height'] > 999.0) {
                return false;
            }
        }
        return true;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getAllRocketsFromCountry(int $id): array
    {
        return $this->storage->getAllRocketsFromCountry($id);
    }

    public function getManufacturerById(int $id): array
    {
        return $this->storage->getManufacturerById($id);
    }

    public function getAllManufacturersFromCountry(int $country_id): array
    {
        return $this->storage->getAllManufacturersFromCountry($country_id);
    }

    public function getAllManufacturers(): array
    {
        return $this->storage->getAllManufacturers();
    }

    public function getNumberOfCountries()
    {
        return $this->storage->getNumberOfCountries();
    }

    public function getAllAgencyNames()
    {
        return $this->storage->getAllAgencyNames();
    }

    public function getAllRocketPrefixesNames()
    {
        return $this->storage->getAllRocketPrefixesNames();
    }

    private function saveImage()
    {
        if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $this->imageName = $this->test_input($_FILES['file']['name']);
            $this->imageName = date('Y-m-d-H-m-s_').$this->imageName;
            $path = "../assets/rockets/$this->imageName";
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
        } else {
            $message = match ($_FILES['file']['error']) {
                UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
                UPLOAD_ERR_NO_FILE => "No file was uploaded",
                UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
                UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
                UPLOAD_ERR_EXTENSION => "File upload stopped by extension",
                default => "Unknown upload error",
            };
            die($message);
        }
    }
}