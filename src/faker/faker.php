<?php
# содержит все библиотеки
require_once '../../vendor/autoload.php';
require_once 'FakeDataInstance.php';

function generateData() {
    $AMOUNT_ROWS = 50;
    $data = array();

    # create and initialize a faker generator
    // use the factory to create a Faker\Generator instance
    $faker = Faker\Factory::create();
    # A Faker\Generator alone can't do much generation.
    #It needs Faker\Provider objects to delegate the data generation to them. 
    $faker->addProvider(new Faker\Provider\en_US\Lorem($faker));
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));

    for ($i = 0; $i < $AMOUNT_ROWS; $i++) {
        $row = new FakeDataInstance(
            $faker->sentence(1),
            # количество знаков после запятой, ниж и верх границы
            $faker->randomFloat(1, 20, 30),
            $faker->randomFloat(1, 740, 770),
            $faker->dateTimeInInterval('-4 month', '+25 days'),
            $faker->randomFloat(1, 0, 10)
        );
        $data[] = $row;
    }
    $jsonData = json_encode($data);
    file_put_contents('data.json', $jsonData);
}
?>
