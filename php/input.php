<?php

function input_test($num_input, $choices){
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // add elemets to array
        add_elements($num_input, $choices);
        // get random number
        $selected_choice = randomize($choices, $num_input);
        $num_input = 0;
        
    }
}

// adds elememts to array 
function add_elements($input_num, $choice_list) {
    for ($x = 0; $x < $input_num; $x++) {
        $name = "input" . ($x + 1);
        if(empty($_POST[$name])) {
            break;
        } else {
            $option = validate_data($_POST[$name]);
            $choices_list[$x] = $option;
        }    
    }

 }
 // picks a random choice
 function randomize($choice_list, $input_num){ 
     $random_choice = rand(1, $input_num);
     $choice = $choice_list[($random_choice - 1)];
     return $choice;
 }

 function validate_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 
?>