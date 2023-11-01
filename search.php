<?php



// function getTimetable(timetable_search){

// }

function getTeacheres(){

    $server = 'localhost';
    $user = 'root';
    $password = "";
    $dbname = 'school';

    $conn = mysqli_connect($server,$user,$password,$dbname);

    //check conection

    if (!$conn) {
        // die("conection faild : ". mysqli_connect_error());
        die("conection faild : ". $conn -> connect_error);
    } else{
        echo "conect suc";
    };
        // $search = $_POST['teacher_name']
        echo "<tr>";
        echo "<th>T_ID</th>";
        echo "<th>Name</th>";
        echo "<th>Subject</th>";
        echo "<th>BOD</th>";
        echo "<th>Tele</th>";
        echo "</tr>";

    if (isset($_POST["teacher_name"])) {

        $search = $_POST["teacher_name"];

        if ($search ==! ''){

          $sql = "SELECT teachers.T_ID, teachers.Name, subject.name as 'subject', teachers.dob as 'DOB', teachers.Tele 
            FROM teachers join subject on teachers.subject = subject.sub_id WHERE teachers.Name 
            LIKE '%$search%' ORDER BY cast(teachers.T_ID as int) ASC;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0){

            while ($row = $result->fetch_assoc()) {

               echo "<tr>";
               echo "<td >".$row['T_ID']."</td>";
               echo "<td >".$row['Name']."</td>";
               echo "<td >".$row['subject']."</td>";
               echo "<td >".$row['DOB']."</td>";
               echo "<td >".$row['Tele']."</td>";
               echo "</tr>";
            }
            

        }  else{
            echo "<tr>"."<td colspan = '5'>". "no data found". "</td>". "</tr>";
     };
        }  
        
        else {
            $sql = "SELECT  teachers.T_ID ,teachers.Name , subject.name AS 'subject' , teachers.dob as DOB , 
            teachers.Tele FROM teachers INNER JOIN subject ON teachers.subject = subject.sub_id ORDER BY cast( teachers.T_ID as int) ASC;
            ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0){

                while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td >".$row['T_ID']."</td>";
                echo "<td >".$row['Name']."</td>";
                echo "<td >".$row['subject']."</td>";
                echo "<td >".$row['DOB']."</td>";
                echo "<td >".$row['Tele']."</td>";
                echo "</tr>";


                }
                // else{
                //     echo "<tr>"."<td colspan = '5'>". "</td>". "</tr>";
                // };
            
        }else{
            echo "<tr>"."<td colspan = '5'>". "no data found". "</td>". "</tr>";
     };

        

        $conn-> close();
        

    };

};
};


getTeacheres()

// function getStudent(){

//     //creating conection

//     $server = "localhost";
//     $user = "root";
//     $password = "";
//     $dbname = "school";

//     $conn = mysqli_connect($server,$user,$password,$dbname);

//     if (!$conn){
//         die("conected faild : ".$conn -> connect_error);
//     }

//     //table head here 




//     if (isset($_POST["get_student"])){

//         $search = $_POST['get_student'];

//         if ($search ==! ""){

//             $sql = "";

//             $result = $conn -> query($sql);

//             if ($result -> num_rows > 0) {

//                 while ($row = $result -> fetch_assoc()) {
//                     echo "<tr>";

//                     echo "</tr>";
//                 }

//             }else{
//                 echo "<tr>"."<td colspan = '5'>". "no data found". "</td>". "</tr>";
//             }

//         }
//     }

// }




////creat conection :)
//$server = 'localhost';
//$user = 'root';
//$password = "";
//$dbname = 'school';
//
//$conn = mysqli_connect($server,$user,$password,$dbname);
//
////check conection
//
//if (!$conn) {
//    // die("conection faild : ". mysqli_connect_error());
//    die("conection faild : ". $conn -> connect_error);
//} ;
//
//$search = $_POST['search'];
//
//$sql = "SELECT teachers.T_ID, teachers.Name, subject.name as 'subject', teachers.dob as 'DOB', teachers.Tele 
//FROM teachers join subject on teachers.subject = subject.sub_id WHERE teachers.Name LIKE '%$search%' ORDER BY cast(teachers.T_ID as int) ASC;";
//
//
//$result = mysqli_query($conn, $sql);
//
//if (mysqli_num_rows($result) > 0){
//    while ($row = mysqli_fetch_assoc($result)){
//        echo "<tr>";
//        echo "<td >".$row['T_ID']."</td>";
//        echo "<td >".$row['Name']."</td>";
//        echo "<td >".$row['subject']."</td>";
//        echo "<td >".$row['DOB']."</td>";
//        echo "<td >".$row['Tele']."</td>";
//        echo "</tr>";
//    }
//} else {
//    echo "<tr>"."<td colspan = '4'>"."no data found"."</td>"."</tr>";
//
//};
//
//mysqli_close($conn)
//

?>