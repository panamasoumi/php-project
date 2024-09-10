<?php 

class Student 
{
    public string $firstname;
    
    public string $lastname;
    
    public string $idNumber;

    public string $mobile;

    public string $average;

    public function __constructor($firstname,$lastname,$idNumber,$mobile,$average){
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->idNumber=$idNumber;
        $this->mobile=$mobile;
        $this->average=$average;
    }

    public function fullname (): string 
    {
        return $this->firstname .' ' .$this->lastname;
    }
     
    function validateMobileNumber($mobile) {
        if (preg_match("/^09[0-9]{9}$/", $mobile)) {
            return "The mobile number is valid.";
        } else {
            return "The mobile number is invalid.";
        }
    }

   public function Calcualateaverage (){
    
   }

}