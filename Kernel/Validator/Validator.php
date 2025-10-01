<?php

namespace App\Kernel\Validator;

class Validator
{
    private array $errors = [];
    // validate(['name' => 'test']), ['name'=>'required|min:3|max:10']) 
    // сохраняет ошибки
    private array $data;
    public function validate(array $data, array $rules): bool
    {
        $this->errors = []; // очищаем ошибки
        $this->data = $data;
        // заносим весь массив
        foreach ($rules as $key => $rule) {
            $rules = $rule;

            foreach ($rules as $rule) {
                $rule = explode(':', $rule);

                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $error = $this->validateRule($key, $ruleName, $ruleValue);

                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function validateRule(string $key, string $ruleName, ?string $ruleValue = null): string|false
    {
        $value = $this->data[$key];

        switch ($ruleName) {
            case 'required':
                if (empty($value)) {
                    return 'Field is required';
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                    return "Field must be at least {$ruleValue} characters long}";
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                    return "Field must be at least {$ruleValue} characters long}";
                }
                break;
            case 'email':
                if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return "Field must be at valid email adress}";
                }
                break;
        }
        return false;
    }
}
