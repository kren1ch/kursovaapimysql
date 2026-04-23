<?php

class Validator
{
    public static function validateBook(array $data): array
    {
        $errors = [];

        if (empty($data['title'])) {
            $errors[] = 'Поле title є обов’язковим.';
        }

        if (empty($data['author_id']) || !is_numeric($data['author_id'])) {
            $errors[] = 'Поле author_id є обов’язковим і має бути числом.';
        }

        if (isset($data['publish_year']) && !is_numeric($data['publish_year'])) {
            $errors[] = 'Поле publish_year має бути числом.';
        }

        if (isset($data['available']) && !in_array((int)$data['available'], [0, 1], true)) {
            $errors[] = 'Поле available повинно бути 0 або 1.';
        }

        return $errors;
    }
}