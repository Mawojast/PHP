<?php
class InputValidation{

    public function validateEmail(string $email): array{

        $result = [];
        $is_email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if($is_email){

            //$username = strstr($email, '@', true);
            $splittedEmail = explode('@', $email);
            $username = array_shift($splittedEmail);

            $splittedDomainPart = explode('.',implode($splittedEmail));
            $topLevelDomain = array_pop($splittedDomainPart);
            $domain = implode('.',$splittedDomainPart);

            $result['is_valid'] = true;
            $result['value'] = $email;
            $result['username'] = $username;
            $result['domain'] = $domain;
            $result['top_level_domain'] = $topLevelDomain;
        }
        else{

            $result['is_valid'] = $is_email;
            $result['value'] = $email;
        }

        return $result;
    }

    public function trimAndRemoveSeveralWhitespaces(string $text): string{

        return trim(preg_replace('/\s+/', ' ', $text));
    }

    public function maxLength(string $text, int $length): array{

        $result = [];
        $textLength = strlen($text);

        if($textLength <= $length){

            $result['exceeded'] = false;
            $result['max_length'] = $length;
            $result['text_length'] = $textLength;
            $result['length_left'] = $length - $textLength;
            $result['text'] = $text;
        }
        else{

            $result['exceeded'] = true;
            $result['max_length'] = $length;
            $result['text_length'] = $textLength;
            $result['exceeded_length'] = $textLength - $length;
            $result['text'] = $text;
            $result['in_range'] = substr($text, -0, $length);
            $result['exceeded_text'] = substr($text, $length);
        }

        return $result;
    }
}

$input = new InputValidation();

var_dump($input->validateEmail('user@example.com'));
/*
array(5) {
    ["is_valid"]=>
    bool(true)
    ["value"]=>
    string(16) "user@example.com"
    ["username"]=>
    string(4) "user"
    ["domain"]=>
    string(7) "example"
    ["top_level_domain"]=>
    string(3) "com"
}
*/

var_dump($input->trimAndRemoveSeveralWhitespaces('   Hello  World! '));
//string(11) "Hello World"

var_dump($input->maxLength('The maximum length was exceeded', 31));
/*
array(7) {
    ["exceeded"]=>
    bool(true)
    ["max_length"]=>
    int(12)
    ["text_length"]=>
    int(31)
    ["exceeded_length"]=>
    int(19)
    ["text"]=>
    string(31) "The maximum length was exceeded"
    ["in_range"]=>
    string(12) "The maximum "
    ["exceeded_text"]=>
    string(19) "length was exceeded"
}
*/