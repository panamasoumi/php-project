<?php 

class User
{
    public string $id,$firstname, $lastname,$idnumber,$mobile,$email;


    public function __construct($id,$firstname, $lastname,$idnumber,$moblie,$email)
    {
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->idnumber=$idnumber;
        $this->moblie=$moblie;
        $this->email=$email;
    }

    public function fullName():string
    {
        return $this->firstname." ".$this->lastname;
    }

    public function isValidEmail()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
           return "is Valid";
        else
           return "is not Valid";
        
    }

    public function isValidMobileNumber(): string
    {
        if(preg_match("/^09[0-9]{9}$/", $this->mobile)){
            return "mobile number is Valid";
        }
        
        return "mobile number is not Valid";
    }

}


class Student extends User
{
    public function calculateAverage()
    {
        //
    }

    public function courseCount()
    {
        //
    }

}

class Teacher  extends User
{
    public function calculateSalary()
    {
        //
    }

    public function courseCount()
    {
        //

    }
}

class Employee extends User
{
    public array $courses;
    public function addCourse(Course $course): void
    {
        $this->courses[] = $course;
    }

    public function removeCourse(Course $course): string
    {
        $key = array_search($course, $this->courses);
        if ($key !== false) {
            unset($this->courses[$key]);
            return "Course Removed";
        }

        return "Course Does Not Exist";
    }
}

class Course 
{
    use courseManagement;

    public string $name,$code,$unit ;

    public Teacher $teacher;

    public array $students;

    public function __construct($name, $code, $unit,$teacher,$students = [])
    {
        $this->name = $name;
        $this->code = $code;
        $this->unit = $unit;
        $this->teacher = $teacher;
        $this->students = $students;
    }

    public function getTeacherName():string
    {
        return $this->teacher->fullName();

    }
    public function getCourseInfo(): void
    {
        echo $this->name . '  ' . $this->code . ' ' . $this->unit . ' ' . $this->teacher->fullName();
    }

    public function getStudents(): void
    {
        print_r($this->students);
    }
    

}
class Board 
{
    public $Students=[];

    public $teachers=[];

    public $Courses=[];


    public function addTeacher(Teacher $teacher)
    {
        $this->teachers[]=$teacher;

    }

    public function removeTeacher(Teacher $teacher)
    {
        $key = array_search($teacher, $this->teachers);
        if($key !== false){
            unset($this->teachers[$key]);
            return "teacher removed";
        }
        return "teacher does not exist";

    }

    public function addStudent(Student $student)
    {
        $this->Students[] = $student;

    }

    public function removeStudent(Student $student)
    {
        $key = array_search($student, $this->Students);
        if($key !== false){
            unset($this->students[$key]);
            return "student is removed";
        }
        return "student does not exist";
    
    }

    public function addCourse(Course $course)
    {
        $this->Courses[] = $course;
    }
    public function removeCourse(Course $course)
    {
        $key = array_search($course, $this->Courses);
        if($key !== false)
        {
            unset($this->courses[$key]);
            return "course is removed";
        }
        return "course does not exist";

    }
    public function assignTeacherToCourse(Teacher $teacher,Course $course)
    {
        $course->teacher = $teacher;
        return "The teacher is assigned";

    }

    public function removeTeacherFromCourse(Teacher $teacher,Course $course)
    {
        if ($course->teacher === $teacher) {
            $course->teacher = null;
        return "The teacher is removed";
    }
    }

    public function assignStudentsToCourse(Student $student, Course $course) 
    {
        $course->students[] = $student;
        return "The student is assigned";
    }
    public function removeStudentsFromCourse(Student $student, Course $course)
    {
       $key=array_search($student,$course->students);
       if ($key !== false)
       {
        unset($this->students[$key]);
        return "student is removed ";
       }
       return "student does not exist";
    }
    
}

trait courseManagement
{
    public function assignTeacher(Teacher $teacher): void
    {
        $this->teacher = $teacher;
    }
    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }
    public function removeStudent(Student $student): string
    {
        $key = array_search($student, $this->students);
        if ($key !== false) {
            unset($this->students[$key]);
            return "Student Removed";
        }

        return "Student Does Not Exist";
    }
}


$diana=new Student ("1","diana,Rostami","11","09121112222","112","dianarostami@gmail.com");
$sheida=new Student("2","sheida,samadi","12","09121210000","111","sheidasamadi@gmail.com");
$mohamadali=new Teacher("1","mohamadali","Nazemi","1","0912111111","mahamadalinazemi@gmail.com");
$course= new Course ("laravel","111","1",$mohamadali);

//echo $diana->fullName();
//echo "\n";
//echo $sheida->fullName();
//echo "\n";
//echo $course->getCourseInfo();

//$course->addStudent($diana);
//$course->addStudent($sheida);
//$course->removeStudent($diana);
//$course->getcourseinfo();
//$course->getStudents();
//$course->assignTeacher($mohamadali);
//echo "\n";
//$course->getCourseInfo();


