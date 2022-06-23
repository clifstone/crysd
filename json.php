<?php

header('Content-Type: application/json');

//decode the json file, and split up the JSON columns
$the_json = file_get_contents('JSON.json');
$jsonarr = (json_decode($the_json, true));
$people = $jsonarr['people'];
$hobbies = $jsonarr['hobbies'];

//loops through hobbies column and compares the interests passed
//by get_hobbies_out_of_interests. To avoid duplicates, it first
//checks for the values in the array, then if not, push the key (hobby name)
//to an array and return
function get_hobbies($hobbies, $interests){
    $hobbiesarr=[];
    foreach($hobbies as $key => $value){
        foreach($interests as $interest){
            if(in_array($interest, $value)){
                if(!in_array($key, $hobbiesarr)){
                    array_push($hobbiesarr, $key);
                }
            }
        }
    }
    return $hobbiesarr;
}

function get_the_people($people, $hobbies){
    $newarr = [];
    foreach($people as $key=>$value){
    
        if($value['hobby'] == null){
            $value['hobby'] = get_hobbies($hobbies, $value['interests']);
        }
    
        array_push($newarr, $value);
    }
    return $newarr;
}


//call main function to get back the array to encode and print out
$newjson = get_the_people($people, $hobbies);
$json = json_encode($newjson);
print $json;