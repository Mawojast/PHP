<?php
spl_autoload_register();

$markers = [
    new RegexpMarker("/f.ve"),
    new MatchMarker("five"),
    new MarkLogicMarker('$input equals "five"'),
];

foreach($markers as $marker){
    echo get_class($marker). "\n";
    $question = new TextQuestion("How many beans make five", $marker);

    foreach(["five", "four"] as $response){
        echo " response: $response: ";
        if($question->mark($response)){
            echo "well done\n";
        }else{
            echo "never mind\n";
        }
    }
}
?>