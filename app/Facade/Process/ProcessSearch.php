<?php
namespace App\Facade\Process;

class ProcessSearch
{
    public function search($keyword)
    {
        $character = [
            '%',
            '_',
            '\\',
        ];
        $replace = [
            '\%',
            '\_',
            '\\\\',
        ];
        $keyword = str_replace($character, $replace, $keyword);
        return $keyword;
    }
}
