<?php
   	
$url = CONFIG."/contacts.json"; // your json file path
$data = array(); // create empty array

// read json file from url
$readJSONFile = file_get_contents($url);
// print_r($readJSONFile); // display contents

//convert json to array in php
$data = json_decode($readJSONFile, TRUE);
// var_dump($data); // print array


if ($_POST) {
   
    if (!$_POST['country'] or !$_POST['email'] or !$_POST['street'] or !$_POST['mobile'] or !$_POST['city']) {
        $error = "<h2>Please complete all the fields</h2>";
    } else {
        try {
            //Get form data
            $email = $_POST['email'];
            
            try {
                // checking if
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
                  // throwing an exception in case email is not valid
                  throw new Exception($email);
                }
            } catch (Exception $e) {
                // displaying error message
                echo $e->getMessage();
            }

            // Пример использования filter_input()
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
            $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
            $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
            $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            
            $formdata = array(
                'email'=> $email,  
                'country'=> $country,
                'street'=> $street,
                'mobile'=> $mobile,
                'city' => $city
            );

            $data = [];
            // Push user data to array
	        array_push($data, $formdata);
            //Encode the array back into a JSON string.
            $json = json_encode($data);
            
            //Save the file.
            // if(file_put_contents($url, $json)) {
            //     echo 'Data successfully saved';
            // } else {
            //     echo "error";
            // }

            try {
                file_put_contents($url, $json);
                $redirect = "http://".$_SERVER['HTTP_HOST'].'/contact';
                header("Location: $redirect");
                exit();
            } catch (Exception $e) {
                // displaying error message
                echo $e->getMessage();
                throw new Exception($e);
            }

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}

render('config/index', array(
    'title' => 'Contact Configuration',
    'data' => $data
));