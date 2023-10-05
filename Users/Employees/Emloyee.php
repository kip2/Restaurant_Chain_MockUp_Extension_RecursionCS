<?php

// todo: userクラスの読み込み
// todo: FileConvetibleの読み込み

class Emloyee extends User implements FileConvertible{

    private string $jobTitle;
    private float $salary;
    // todo: DateTImeの依存解消
    private DateTime $startDate;
    // todo: string arrayの宣言方法
    private array $awards;

    public function toString():string{
        return "";
    }
    public function toHTML():string{
        return "";
    }
    public function toMarkdown():string{
        return "";
    }
    public function toArray():array{
        return array();
    }
}