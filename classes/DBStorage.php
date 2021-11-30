<?php

class DBStorage
{
    private $con;

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=semestralka", "root", "dtb456");
            $this->con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Chyba: " .$e->getMessage());
        }
    }

    /**
     *
     * @return Rocket[]
     */
    public function getAllRocketsFromCountry(int $id): array
    {
        $st = $this->con->prepare("SELECT * FROM rockets WHERE rockets.manufacturer_id IN (SELECT manufacturers.id from manufacturers WHERE manufacturers.country_id = $id) ORDER BY human_rated DESC, name");
        $st->execute();
        /** @var Rockets[] $rockets **/
        return $st->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Rocket::class);
    }

    public function getAllManufacturersById(int $id) {
        $st = $this->con->prepare("SELECT * FROM manufacturers WHERE id = ?");
        $st->execute([intval($id)]);
        return $st->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Manufacturer::class);
    }

    public function getAllManufacturersFromCountry(int $country_id) {
        $st = $this->con->prepare("SELECT * FROM manufacturers WHERE country_id = ?");
        $st->execute([intval($country_id)]);
        return $st->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Manufacturer::class);
    }

    public function getAllManufacturers() {
        $st = $this->con->prepare("SELECT * FROM manufacturers");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Manufacturer::class);
    }

    public function addRocket(Rocket $rocket)
    {
        $this->con->prepare("INSERT INTO rockets (manufacturer_id, image, name, human_rated, payload, height) VALUES (?,?,?,?,?,?)")
            ->execute([intval($rocket->getManufacturerId()), $rocket->getImage(), $rocket->getName(), intval($rocket->isHumanRated()), floatval($rocket->getPayload()), floatval($rocket->getHeight())]);
    }

    public function removeRocket($id)
    {
        $st= $this->con->prepare("DELETE FROM rockets WHERE id = ?");
        $st->execute([$id]);
    }

    public function updateRocket($id,Rocket $rocket)
    {
        $this->con->prepare("UPDATE rockets SET manufacturer_id = ?, name = ?, human_rated = ?, payload = ?, height = ? WHERE id = ?")
            ->execute([intval($rocket->getManufacturerId()), $rocket->getName(), intval($rocket->isHumanRated()), floatval($rocket->getPayload()), floatval($rocket->getHeight()), intval($id)]);
    }
}