<?php

// namespace Helpers;

require_once __DIR__ . '/../../src/Users/User.php';

require 'vendor/autoload.php';

use Faker\Factory;


class RandomGenerator {

    // todo: fanction名をクラス名にしておいおい増やす

    // ---------- employee -----------------

    /**
     * ランダムなEmployeeを生成する
     *
     * @return Employee
     */
    public static function employee(): Employee {
        $faker = Factory::create();

        // randomな賞
        $AWARDS = [
            "Best Innovative Company",
            "Employee's Choice Award",
            "Leader in Sustainability",
            "Top 100 Companies to Work For",
            "Best Customer Service",
            "Product of the Year",
            "Best Design Award",
            "Environmental Leadership",
            "Top Exporter of the Year",
            "Fastest Growing Company",
            "Technology Pioneer Award",
            "Community Involvement Award",
            "Best in Diversity & Inclusion",
            "Corporate Social Responsibility Award",
            "Excellence in Leadership"
        ];

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),

            // jobtitle
            $faker->jobTitle,
            // salary
            $faker->randomFloat(2, 10, 100),
            // startDate
            $faker->dateTimeBetween('-30 years', 'now'),
            // awards
            $faker->randomElement($AWARDS)
        );
    }

    /**
     * ランダムなEmployeeの配列を生成する
     *
     * @param integer $min
     * @param integer $max
     * @return array
     */
    public static function employees(int $min, int $max):array {
        $faker = Factory::create();
        $employee = [];
        $numOfEmployees = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::employee();
        }

        return $employees;
    }


    // ---------- user ---------------------
    /**
     * ランダムなユーザを生成する
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
     * ランダムなユーザーの配列を生成する
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