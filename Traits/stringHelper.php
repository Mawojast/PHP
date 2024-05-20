<?php
trait StringHelper{

    public function upperWords(string $string): string{

        $stringArr = explode(" ", $string);
        for($i = 0; $i < count($stringArr); $i++){
            $stringArr[$i] = ucfirst($stringArr[$i]);
        }

        return implode(" ", $stringArr);
    }

    public function length(string $string): int{

        // str_word_count($string, 0)
        return count(explode(" ", $string));
    }

    // static functions are provided by traits
    public static function count_words(string $string, string $word, bool $sensitive = true): int{

        $stringArr = explode(" ", $string);
        $countedStringValues = array_count_values($stringArr);

        if(!$sensitive){
            $word = strtolower($word);
            $countedStringValues = array_change_key_case($countedStringValues, CASE_LOWER);
        }
    
        return $countedStringValues[$word] ?? 0 ;
    }
}
