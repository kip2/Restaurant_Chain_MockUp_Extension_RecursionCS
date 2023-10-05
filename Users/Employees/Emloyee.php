<?php

// todo: userクラスの読み込み

class Emloyee extends User {

    private string $jobTitle;
    private float $salary;
    // todo: DateTImeの依存解消
    private DateTime $startDate;
    // todo: string arrayの宣言方法
    private array $awards;

}