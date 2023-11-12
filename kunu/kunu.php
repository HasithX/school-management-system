


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

