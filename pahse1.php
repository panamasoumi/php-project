<?php 

class Student 
{
    public string $firstname;
    
    public string $lastname;
    
    public string $idNumber;

    public string $mobile;

    public string $average;

    public function __construct($firstname,$lastname,$idNumber,$mobile,$average)
    {
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

    
    


    public function validateMobileNumber() {
       
    }
  


    public function Calcualateaverage (){
    
    }

    
}
$user=new Student ("john","lee","12","0936139974", "12");

    echo $user->fullName();