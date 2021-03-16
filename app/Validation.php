<?php
namespace TodoApp;
class Validation {
    private static $errors=[];
    public static function validate($data){
        self::validateTitle($data['subject']);
        self::validatePriority($data['priority']);
        self::validateDate($data['dueDate']);
       return self::$errors;
    }
    public static function validateTitle($title){
        $valid=preg_match('/^[\w\d ,.]{5,150}$/',$title);
        if(empty($title)){
            Validation::$errors['title']="Input required";
        } else if(!$valid){
            Validation::$errors['title']="Subject length 5-150";
        } else {
            Validation::$errors['title']="";
        }
    }
    public static function validatePriority($priority){
        if(empty($priority)){
            Validation::$errors['priority']="Input required";
        } else {
            Validation::$errors['priority']="";
        }
    }
    public static function validateDate($date){
        if(empty($date)){
            Validation::$errors['date']="Input required";
        }else {
            Validation::$errors['date']="";
        }
    }
}