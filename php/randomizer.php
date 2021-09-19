<?php
session_start();
include("connection.php");
 $num_input = NULL;
 $num_input_err = NULL;
 $choices = array(); 
 $form_element = NULL;


 if($_SERVER["REQUEST_METHOD"] === "POST") {
     $num_input = validate_data($_POST["num-inputs"]);
    if(!preg_match("/^[0-9][0-9]?$/", $num_input)) {
        $num_input_err = "Enter a number between 1 - 10";
    } 
    // convert to num 
    $num_input = (int) $num_input;
    echo $num_input;

    // <div class="wrap-input100 validate-input">
    //                 <input class="input100" type="text" name="input1" id="input1" required>
    //                 <span class="focus-input100" data-placeholder="Enter Inputs:"></span>
    // </div>
    // check if it is between 1 and 10
    if($num_input > 0 && $num_input <= 10) {
        // show form with num_input elements 
        // use a loop with name and id appending values
        $form_element="";
        for ($element = 0; $element < 10; $element++) {
            $name = "input" . $element;
            $id = "input" . $element;
            $data_holder = "Enter Input " . $element . ":";
            $form_element = $form_element . "<div class='wrap-input100 validate-input'>
            <input class='input100' type='text' name='$name' id='$id' requried> 
            <span class='focus-input100' data-placeholder='$data_holder'></span>
            </div>";
        }


    }
 }

 // adds elememts to array 
 function add_elements($input_num, $choice_list) {

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