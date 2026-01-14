<?php
// Base abstract Person class
abstract class Person {
    protected $name;
    protected $email;
    protected $phone;

    public function __construct($name, $email, $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    abstract public function getRole();

    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
}

// Student class
class Student extends Person {
    private $studentId;
    private $course;
    private $semester;
    private $marks = [];

    public function __construct($name, $email, $phone, $studentId, $course, $semester) {
        parent::__construct($name, $email, $phone);
        $this->studentId = $studentId;
        $this->course = $course;
        $this->semester = $semester;
    }

    public function addMarks($subject, $mark) {
        $this->marks[$subject] = $mark;
    }

    public function calculateGPA() {
        if (empty($this->marks)) return 0;
        $total = array_sum($this->marks);
        return round($total / count($this->marks), 2);
    }

    public function getRole() {
        return "Student";
    }

    public function getStudentId() { return $this->studentId; }
    public function getCourse() { return $this->course; }
    public function getSemester() { return $this->semester; }
    public function getMarks() { return $this->marks; }
}

// Teacher class
class Teacher extends Person {
    private $teacherId;
    private $department;
    private $subjects = [];

    public function __construct($name, $email, $phone, $teacherId, $department) {
        parent::__construct($name, $email, $phone);
        $this->teacherId = $teacherId;
        $this->department = $department;
    }

    public function addSubject($subject) {
        $this->subjects[] = $subject;
    }

    public function getRole() {
        return "Teacher";
    }

    public function getTeacherId() { return $this->teacherId; }
    public function getDepartment() { return $this->department; }
    public function getSubjects() { return $this->subjects; }
}

// Management System class
class ManagementSystem {
    private $students = [];
    private $teachers = [];

    public function addStudent($student) {
        $this->students[] = $student;
    }

    public function addTeacher($teacher) {
        $this->teachers[] = $teacher;
    }

    public function displayStudents() {
        echo "<h2>Student List</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Semester</th><th>GPA</th></tr>";
        foreach ($this->students as $student) {
            echo "<tr>";
            echo "<td>" . $student->getStudentId() . "</td>";
            echo "<td>" . $student->getName() . "</td>";
            echo "<td>" . $student->getEmail() . "</td>";
            echo "<td>" . $student->getPhone() . "</td>";
            echo "<td>" . $student->getCourse() . "</td>";
            echo "<td>" . $student->getSemester() . "</td>";
            echo "<td>" . $student->calculateGPA() . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }

    public function displayTeachers() {
        echo "<h2>Teacher List</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Department</th><th>Subjects</th></tr>";
        foreach ($this->teachers as $teacher) {
            echo "<tr>";
            echo "<td>" . $teacher->getTeacherId() . "</td>";
            echo "<td>" . $teacher->getName() . "</td>";
            echo "<td>" . $teacher->getEmail() . "</td>";
            echo "<td>" . $teacher->getPhone() . "</td>";
            echo "<td>" . $teacher->getDepartment() . "</td>";
            echo "<td>" . implode(", ", $teacher->getSubjects()) . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }
}

$system = new ManagementSystem();

$student1 = new Student("John Doe", "john@example.com", "1234567890", "S001", "BCA", 1);
$student1->addMarks("PHP", 85);
$student1->addMarks("Database", 90);
$student1->addMarks("HTML", 88);

$student2 = new Student("Jane Smith", "jane@example.com", "9876543210", "S002", "BCSIT", 2);
$student2->addMarks("PHP", 92);
$student2->addMarks("Database", 88);
$student2->addMarks("HTML", 95);

$system->addStudent($student1);
$system->addStudent($student2);

$teacher1 = new Teacher("Mr. Ahmed", "ahmed@example.com", "5555555555", "T001", "BIT");
$teacher1->addSubject("PHP");
$teacher1->addSubject("Database");

$teacher2 = new Teacher("Ms. Sarah", "sarah@example.com", "6666666666", "T002", "BBA");
$teacher2->addSubject("HTML");
$teacher2->addSubject("CSS");

$system->addTeacher($teacher1);
$system->addTeacher($teacher2);

$system->displayStudents();
$system->displayTeachers();

?>