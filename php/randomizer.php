<?php
session_start();
include("connection.php");
static $store_value; 
 $num_input = NULL;
 $num_input_err = NULL;
 $choices = array(); 
 $form_element = NULL;
 $form_choices = NULL;
 $decision = NULL;

//  if($num_input === NULL){
//     $form_element = "<span class='error'>Enter number of choices</span>";
//     return 0;
//  }

 if($_SERVER["REQUEST_METHOD"] === "POST") {
     $num_input = validate_data($_POST["num-inputs"]);
    if(!preg_match("/^[0-9]*$/", $num_input)) {
        $num_input_err = "Please enter a number";
        echo('<script>alert("Please enter a number")</script>');
    } 
    if ($num_input_err === NULL) {
         // convert to num 
        $num_input = (int) $num_input;
        echo $num_input;
        if($num_input > 0 && $num_input <= 10) {
            $form_choices = "<div>You have <br>$num_input<br>choices!<br><span>Select below to begin!</span>";
            $form_element="";
            for ($element = 0; $element < $num_input; $element++) {
                $name = "input" . ($element + 1);
                $id = "input" . ($element + 1);
                $data_holder = "Enter Input " . ($element + 1) . ":";
                $form_element = $form_element . "<div class='wrap-input100 validate-input'>
                <input class='input100' type='text' name='$name' id='$id' requried> 
                <span class='focus-input100' data-placeholder='$data_holder'></span>
                </div>";
            }
            
            // check for picked choice 
            $decision = input_test($store_value, $choices);

          
        } else {
            $num_input_err = "Enter a number between 1 - 10";
            echo('<script>alert("Enter a number between 1 - 10")</script>');
        }
        
    }
 }

  function set_value($num){
      $store_value = $num;
  }

  function get_value() {
      return $store_value;
  }
 function input_test($input_num, $choices_list){
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // add elemets to array
        add_elements($input_num, $choices_list);
        // get random number
        $selected_choice = randomize($choices_list, $input_num);
        $store_value = 0;
        return $selected_choice;
        
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