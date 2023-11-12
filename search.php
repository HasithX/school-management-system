<?php

//------------another function here-----------------\\

function dbconection(){
    $server = 'localhost';
    $user = 'root';
    $password = "";
    $dbname = 'school';

    $conn = mysqli_connect($server,$user,$password,$dbname);

    //check conection

    if (!$conn) {
        // die("conection faild : ". mysqli_connect_error());
        return die("conection faild : ". $conn -> connect_error);
    } 

    return $conn;
};

function checkPeriod() {
    $currentTime = date('H:i');
    $currentDay = date('w'); // Get the current day of the week (0 for Sunday, 6 for Saturday)

    // Return 'done' if it's Saturday or Sunday
    if ($currentDay == 0 || $currentDay == 6) {
        return 'done';
    }

    $currentMinutes = (int)substr($currentTime, 0, 2) * 60 + (int)substr($currentTime, 3);

    $startTime = 8 * 60; // School starts at 8:00 AM
    $endTime = 13 * 60; // School ends at 1:00 PM

    if ($currentMinutes >= $startTime && $currentMinutes < $endTime) {
        $elapsedMinutes = $currentMinutes - $startTime;
        $period = floor($elapsedMinutes / 45) + 1;

        // Check if it's a break period
        if ($period % 4 == 0 && $elapsedMinutes % 45 < 20) {
            return 'brake';
        }

        // Check if it's a school period
        if ($period <= 8) {
            return "period".$period;
        }
    }

    // If it's not a school day or school hours, return 'done'
    return 'done';
}



//-----------------------get data----------------------\\
function getTimetable(){
    
    $conn = dbconection();

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "<th>Class</th>";
    echo "<th>Subject</th>";
    echo "<th>Teacher</th>";
    echo "<th class='data_edit_colum'></th>";
    echo "<th class='data_edit_colum'></th>";
    echo "</tr>";

    if (isset($_POST["timetable_name"])) {

        $search = $_POST["timetable_name"];

        if ($search ==! ''){
          $sql = "SELECT timetable.time_table_id, 
                timetable.date, 
                timetable.time, 
                class.name as class, 
                subject.name as subject,
                teachers.name as teacher 
                FROM timetable 
                INNER JOIN class ON timetable.class = class.C_ID
                INNER JOIN subject ON timetable.subject = subject.sub_id
                INNER JOIN teachers on timetable.teacher = teachers.T_ID
                WHERE timetable.class LIKE '%$search%'
                ORDER BY timetable.class
                LIMIT 10;";
        }  else {
            $day = date('w');
            $period = checkPeriod();

            if ($period == 'break'){
                echo "<tr>"."<td colspan = '8'>". "|------INTERVAL TIME-------|". "</td>". "</tr>";
            }elseif($period == 'done'){
                echo "<tr>"."<td colspan = '8'>". "!---------AUTO TIMETABLE CLOSE---------!". "</td>". "</tr>";
            }else{
            $sql = "SELECT timetable.time_table_id,
                timetable.date, 
                timetable.time, 
                class.name as class, 
                subject.name as subject,
                teachers.name as teacher 
                FROM timetable 
                INNER JOIN class ON timetable.class = class.C_ID
                INNER JOIN subject ON timetable.subject = subject.sub_id
                INNER JOIN teachers on timetable.teacher = teachers.T_ID
               WHERE timetable.date LIKE '%$day%' AND 
               timetable.time LIKE '%$period%'
               ORDER BY timetable.class
                LIMIT 10;";
            };
        }

            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td >".$row['time_table_id']."</td>";
                echo "<td >".$row['date']."</td>";
                echo "<td >".$row['time']."</td>";
                echo "<td >".$row['class']."</td>";
                echo "<td >".$row['subject']."</td>";
                echo "<td >".$row['teacher']."</td>";
                echo "<td >"."<i class='fa fa-edit'></i>"."</td>";
                echo "<td >"."<i class='fa fa-trash' style='color:red;'></i>"."</td>";
                echo "</tr>";
                }           
            }  else{
                echo "<tr>"."<td colspan = '8'>". "no data found". "</td>". "</tr>";
                };        
        };
    $conn-> close();
};

function get_teachers_list(){

    $conn = dbconection();
    $sql = "SELECT T_ID, Name FROM teachers ORDER BY cast(T_ID as int) asc;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo "<option value='$row[T_ID]'>$row[Name]</option>";
        }
        
    }
    $conn-> close();
}

// teachers data


function getTeacheres(){

    $conn = dbconection();
        
        echo "<tr>";
        echo "<th>T_ID</th>";
        echo "<th>Name</th>";
        echo "<th>Subject</th>";
        echo "<th>BOD</th>";
        echo "<th>Tele</th>";
        echo "<th class='data_edit_colum'></th>";
        echo "<th class='data_edit_colum'></th>";
        echo "</tr>";

    if (isset($_POST["teacher_name"])) {

        $search = $_POST["teacher_name"];

        if ($search ==! ''){

          $sql = "SELECT teachers.T_ID, teachers.Name, subject.name as 'subject', teachers.dob as 'DOB', teachers.Tele 
            FROM teachers join subject on teachers.subject = subject.sub_id WHERE teachers.Name 
            LIKE '%$search%' ORDER BY cast(teachers.T_ID as int) ASC;";

        }  else {
            $sql = "SELECT  teachers.T_ID ,teachers.Name , subject.name AS 'subject' , teachers.dob as DOB , 
            teachers.Tele FROM teachers INNER JOIN subject ON teachers.subject = subject.sub_id ORDER BY cast( teachers.T_ID as int) ASC;
            ";
            };

        $result = $conn->query($sql);

        if ($result->num_rows > 0){

            while ($row = $result->fetch_assoc()) {

               echo "<tr>";
               echo "<td >".$row['T_ID']."</td>";
               echo "<td >".$row['Name']."</td>";
               echo "<td >".$row['subject']."</td>";
               echo "<td >".$row['DOB']."</td>";
               echo "<td >".$row['Tele']."</td>";
               echo "<td >"."<i class='fa fa-edit'></i>"."</td>";
               echo "<td >"."<i class='fa fa-trash' style='color:red;'></i>"."</td>";
               echo "</tr>";
            }
            

        }  else{
            echo "<tr>"."<td colspan = '5'>". "no data found". "</td>". "</tr>";
            };
   };
$conn-> close();
};

//student data

function getStudent(){

    $conn = dbconection();
        
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Class</th>";
        echo "<th>City</th>";
        echo "<th>Date of birth</th>";
        echo "<th>phone No</th>";
        echo "<th class='data_edit_colum'></th>";
        echo "<th class='data_edit_colum'></th>";
        echo "</tr>";

    if (isset($_POST["student_name"])) {

        $search = $_POST["student_name"];

        if ($search ==! ''){

          $sql = "SELECT 
          students.S_ID,
          students.name,
          class.name as class,
          students.City,
          students.DOB,
          students.Tele
          FROM students
          INNER JOIN class ON students.class = class.C_ID
          WHERE students.name LIKE '%$search%'
          ORDER BY cast(students.S_ID AS int) ASC;";

        }  else {
            $sql = "SELECT 
            students.S_ID,
            students.name,
            class.name as class,
            students.City,
            students.DOB,
            students.Tele
            FROM students
            INNER JOIN class ON students.class = class.C_ID
            ORDER BY cast(students.S_ID AS int) ASC;";
            };

        $result = $conn-> query($sql);

        if ($result->num_rows > 0){

            while ($row = $result->fetch_assoc()) {
        
               echo "<tr>";
               echo "<td >".$row['S_ID']."</td>";
               echo "<td >".$row['name']."</td>";
               echo "<td >".$row['class']."</td>";
               echo "<td >".$row['City']."</td>";
               echo "<td >".$row['DOB']."</td>";
               echo "<td >".$row['Tele']."</td>";
               echo "<td >"."<i class='fa fa-edit'></i>"."</td>";
               echo "<td >"."<i class='fa fa-trash' style='color:red;'></i>"."</td>";
               echo "</tr>";
            }
            

        }  else{
            echo "<tr>"."<td colspan = '8'>". "no data found". "</td>". "</tr>";
            };
   };
$conn-> close();
};


//------------------------------add data here------------------------\\

function addtimetable(){

    $conn = dbconection();

    $tt_date = $_POST['tt_date'];
    $tt_period = $_POST['tt_period'];
    $tt_subject = $_POST['tt_subject'];
    $tt_class = $_POST['tt_class'];
    $tt_teachers = $_POST['tt_teachers'];
    
    $sql = "INSERT INTO `timetable`(`class`, `date`, `subject`, `teacher`, `time`) 
    VALUES ('tt_class', 'tt_date', 'tt_subject', 'tt_teachers', 'tt_period');";
    
    $result = $conn -> query($sql);

    if ($result ==! TRUE)  {
        echo "Update failed: ". $conn -> error;
    } 
    
    $conn -> close();

};

function addteacher(){

    $conn = dbconection();

    $name = $_POST['name'];
    $id = $_POST['id'];
    $tele = $_POST['tp'];
    $subject = $_POST['subject'];
    $dob = $_POST['dob'];
    
    $sql = "INSERT INTO teachers(`T_ID`, `Name`, `Tele`, `subject`, `dob`) 
            VALUES ('$id','$name','$tele','$subject','$dob');";
    
    $result = $conn -> query($sql);

    if ($result ==! TRUE)  {
        echo "Update failed: ". $conn -> error;
    } 
    
    $conn -> close();

};


function addstudent(){

    $conn = dbconection();

    $S_name = $_POST['S_name'];
    $S_id = $_POST['S_id'];
    $S_tp = $_POST['S_tp'];
    $S_class = $_POST['S_class'];
    $S_dob = $_POST['S_dob'];
    $S_city = $_POST['S_city'];
    
    $sql = "INSERT INTO students(`S_ID`, `name`, `Tele`, `class`, `DOB`, `City`) 
            VALUES ('$S_id','$S_name','$S_tp','$S_class','$S_dob','$S_city');";
    
    $result = $conn -> query($sql);

    if ($result ==! TRUE)  {
        echo "Update failed: ". $conn -> error;
    } 
    
    $conn -> close();
};




if (isset($_POST['timetable_name'])) {
    getTimetable();
}

if (isset($_POST['teacher_name'])) {
    getTeacheres();
}

if (isset($_POST['student_name'])) {
    getStudent();
}

if (isset($_POST['add_teacher'])) {
    addteacher();
}

if (isset($_POST['add_student'])) {
    addstudent();
}

if (isset($_POST['add_timetable'])) {
    addtimetable();
}

if (isset($_POST['get_teachers_list'])) {
    get_teachers_list();
}



?>