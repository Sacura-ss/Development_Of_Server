<?php
class FakeDataInstance {
    public string $name;
    public float  $temperature;
    public float  $color;
    public string $date;
    public float $pollution;

    public function __construct(string $name, 
                                float  $temperature,
                                float  $color,
                                DateTime $date,
                                float $pollution) {
        $this->name = $name;
        $this->temperature = $temperature;
        $this->color = $color;
        $this->date = $date->format('Y-m-d');
        $this->pollution = $pollution;
    }

}

?>