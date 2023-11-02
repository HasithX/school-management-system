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

    $currentMinutes = (int)substr($currentTime, 0, 2) * 60 + (int)substr($currentTime, 3);

    $startTime = 7 * 60; 

    if ($currentMinutes >= $startTime) {
        $elapsedMinutes = $currentMinutes - $startTime;
        $period = floor($elapsedMinutes / 45) + 1;

        if ($period % 4 == 0 && $elapsedMinutes % 45 < 15) {
            return 'break';
        }

        if ($period <= 8) {
            return $period;
        }
    }
    return 'done';
}

function timetable_get_data(){
    $result = $conn->query($sql);

        if ($result->num_rows > 0){

            while ($row = $result->fetch_assoc()) {

               echo "<tr>";
               echo "<td >".$row['time_table_id']."</td>";
               echo "<td >".$row['date']."</td>";
               echo "<td >".$row['class']."</td>";
               echo "<td >".$row['subject']."</td>";
               echo "<td >".$row['teacher']."</td>";
               echo "<td >"."<i class='fa fa-edit'></i>"."</td>";
               echo "<td >"."<i class='fa fa-trash' style='color:'red';'></i>"."</td>";
               echo "</tr>";
            }           

        }  else{
            echo "<tr>"."<td colspan = '5'>". "no data found". "</td>". "</tr>";
            }; 
}


//-----------------------grt data----------------------\\
function getTimetable(){
    
    $conn = dbconection();

    echo "<tr>";
    echo "<th>ID</th>";
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

            timetable_get_data()

        }  
        else {
            $day = date('1');
            $period = checkPeriod();

            if ($period == 'break'){
                echo "<tr>"."<td colspan = '5'>". "..INTERVAL TIME..". "</td>". "</tr>";
            }elseif($period == 'done'){
                echo "<tr>"."<td colspan = '5'>". "..AUTO TIMETABLE CLOSE..". "</td>". "</tr>";
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

            timetable_get_data()
            };
        }
           
    };
    $conn-> close();

};

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



if (isset($_POST['timetable_name'])) {
    getTimetable();
}

if (isset($_POST['teacher_name'])) {
    getTeacheres();
}
?>