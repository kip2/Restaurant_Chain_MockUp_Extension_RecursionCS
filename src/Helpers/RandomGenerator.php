<?php

// namespace Helpers;

require_once __DIR__ . '/../../src/Users/User.php';

require 'vendor/autoload.php';

use Faker\Factory;

class RandomGenerator {

    // todo: fanction名をクラス名にしておいおい増やす
    /**
     * ランダムな値を持ったユーザを生成する
     *
     * @return User
     */
    public static function user(): User {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    /**
     * ランダムな値を持ったユーザーの配列を生成する
     *
     * @param integer $min
     * @param integer $max
     * @return array
     */
    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }
}


?>