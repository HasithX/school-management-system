function checkPeriod() {
    // Get current time in hours and minutes
    $currentTime = date('H:i');

    // Convert current time to minutes past midnight
    $currentMinutes = (int)substr($currentTime, 0, 2) * 60 + (int)substr($currentTime, 3);

    // Define start time of first period in minutes past midnight
    $startTime = 7 * 60; // 7:00 AM

    // Calculate which period it currently is
    if ($currentMinutes >= $startTime) {
        $elapsedMinutes = $currentMinutes - $startTime;
        $period = floor($elapsedMinutes / 45) + 1;

        // Check if it's break time (every four periods)
        if ($period % 4 == 0 && $elapsedMinutes % 45 < 15) {
            return 'break';
        }

        // If it's not break time, return the period number
        if ($period <= 8) {
            return 'period' . $period;
        }
    }

    // If it's before the start time or after all periods, return 'done'
    return 'done';
}






SELECT 
    timetable.time_table_id AS 'id',
    timetable.date, 
    timetable.time, 
    class.name AS 'class', 
    subject.name as 'subject', 
    teachers.name AS 'teacher' 
FROM 
    timetable 
INNER JOIN class ON timetable.class = class.C_ID
INNER JOIN teachers ON timetable.teacher = teachers.T_ID
INNER JOIN subject ON timetable.subject = subject.sub_id
WHERE 
    timetable.class LIKE '%12%' AND 
    timetable.date LIKE 'monday' 
ORDER BY 
    cast(timetable.date as int) ASC 
LIMIT 10;



SELECT *
FROM timetable
WHERE class = '12A' AND date = 'Monday'
ORDER BY time;


ALTER TABLE timetable
ADD COLUMN time_table_id INT AUTO_INCREMENT,
ADD PRIMARY KEY (time_table_id);


function addteacher(){

$conn = dbconection();

$name = $_POST['name'];
$id = $_POST['id'];
$tele = $_POST['tp'];
$subject = $_POST['subject']; // Make sure this value exists in the 'sub_id' column of the 'subject' table
$dob = $_POST['dob'];

$sql = "INSERT INTO `teachers`(`T_ID`, `Name`, `Tele`, `subject`, `dob`) 
        VALUES ('$id','$name','$tele','$subject','$dob')";

if ($conn -> query($sql) === TRUE)  {
    echo "Record updated successfully :)";
} else{
    echo "Update failed: " . $conn -> error; // This will give you more information about the error
};

$conn -> close();
};

if (isset($_POST["addteacher"])) {
addteacher();
}


$.ajax({
    url: 'search.php', // URL of the PHP file
    type: 'post', // The HTTP method to use for the request
    data: {
        addteacher : "",
        name : $("#T_name").val(),
        id : $("#T_id").val(),
        tp : $("#T_tp").val(),
        subject : $("#T_subject").val(),
        dob : $("#T_dob").val()
    }, // The data to send to the server
    success: function(data, status) {
        $("#f_p").html(data); // What to do when the request is successful
    },
    error: function(xhr, status, error) {
        console.log('Error: ' + error.message); // What to do if the request fails
    },
});


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

