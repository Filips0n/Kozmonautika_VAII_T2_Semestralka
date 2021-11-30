<?php

class Rocket
{
    public function __construct(private int $id = 0, private int $manufacturer_id = 0, private ?string $image = null, private ?string $name = null, private int $human_rated = 0, private float $payload = 0.0, private float $height = 0.0)
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getManufacturerId(): int
    {
        return $this->manufacturer_id;
    }

    /**
     * @param int $manufacturer_id
     */
    public function setManufacturerId(int $manufacturer_id): void
    {
        $this->manufacturer_id = $manufacturer_id;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isHumanRated(): bool
    {
        return $this->human_rated;
    }

    /**
     * @param bool $human_rated
     */
    public function setHumanRated(bool $human_rated): void
    {
        $this->human_rated = $human_rated;
    }

    /**
     * @return float
     */
    public function getPayload(): float
    {
        return $this->payload;
    }

    /**
     * @param float $payload
     */
    public function setPayload(float $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getArray()
    {
        return [
            "height" => $this->getHeight(),
            "payload" => $this->getPayload(),
            "human_rated" => $this->isHumanRated(),
            "name" => $this->getName(),
            "manufacturer_id" => $this->getManufacturerId(),
            "id" => $this->getId()
        ];
    }
}