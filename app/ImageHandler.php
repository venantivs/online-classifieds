<?php
    function UploadImages($Images) {
        $valid_formats = array("jpg", "png", "gif", "jpeg");
        $max_file_size = 1024 * 3000; //3 MiB
        $path = "../assets/classifieds/"; // Upload directory
        $count = 0;
        $ImagesArray = array();

        foreach ($Images["fileImages"]["name"] as $f => $name) {
            if ($Images['fileImages']['error'][$f] == 4) {
                continue; // Skip file if any error found
            }  

            if ($Images['fileImages']['error'][$f] == 0) {            
                if ($Images['fileImages']['size'][$f] > $max_file_size) {
                    $message[] = "$name is too large!.";
                    continue; // Skip large files
                } else if(!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)) {
                    $message[] = "$name is not a valid format";
                    continue; // Skip invalid file formats
                } else { // No error found! Move uploaded files 
                    if(move_uploaded_file($Images["fileImages"]["tmp_name"][$f], $path.$name)) {
                        array_push($ImagesArray, $name);
                        $count++; // Number of successfully uploaded file
                    }
                }
            } 
        }

        return $ImagesArray;
    }

    function UploadImage($Image) {
        $valid_formats = array("jpg", "png", "gif", "jpeg");
        $max_file_size = 1024 * 3000; //3 MiB
        $path = "../assets/users/"; // Upload directory

        if ($Image['fileImage']['error'] == 4) {
            return false;
        }  

        if ($Image['fileImage']['error'] == 0) {            
            if ($Image['fileImage']['size'] > $max_file_size) {
                return false; // Skip large files
            } else if(!in_array(pathinfo($Image["fileImage"]["name"], PATHINFO_EXTENSION), $valid_formats)) {
                return false; // Skip invalid file formats
            } else { // No error found! Move uploaded files 
                if(move_uploaded_file($Image["fileImage"]["tmp_name"], $path.$Image["fileImage"]["name"])) {
                    return $Image["fileImage"]["name"];
                }
            }
        } 
    }
?>