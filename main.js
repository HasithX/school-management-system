



$(document).ready(function(){

    //------------------data loding here------------\

    $.post("search.php",
    {
        timetable_data:""
    },
    function(data, status){
    $("#table1").html(data);
    });

    $.post("search.php",
    {
        teacher_name:""
    },
    function(data, status){
    $("#table2").html(data);
    });

    $.post("search.php",
    {
        student_data:""
    },
    function(data, status){
    $("#table3").html(data);
    });

    


    //-----------search data here----------\

    //timetable
    // $("#search1").keyup(function(){
    //     var timename = $("#search1").val();
    //     $.post('search.php',
    //     {
    //         timetable_name : timename,
            
    //     }, 
    //     function(data,status){
    //         $("#table1").html(data);
    //     });
    // });

    //teachers
    $("#search2").keyup(function(){
        var tname =$("#search2").val();
        $.post("search.php",
        {
            teacher_name : tname,

        },
        function(data, status){
            $("#table2").html(data);
        });
    });

    //students
    $("#search3").keyup(function(){
        var stname =$("#search3").val();
        $.post("search.php",
        {
            student_data : stname,

        },
        function(data, status){
            $("#table3").html(data);
        });
    });

});


var popup = document.getElementById("T_popup");
var btn = document.getElementById("loginBtn");
var span = document.getElementsByClassName("close")[0];

function popup(point){
    if (point == 'tt_popup') {
        document.getElementById('tt_popup').style.display = "block";
    }
    if (point == 'T_popup') {
        document.getElementById('T_popup').style.display = "block";
    }
    if (point == 'S_popup') {
        document.getElementById('S_popup').style.display = "block";
    }

}
function popdown(point){
    if (point == 'tt_popup') {
        document.getElementById('tt_popup').style.display = "none";
    }
    if (point == 'T_popup') {
        document.getElementById('T_popup').style.display = "nonw";
    }
    if (point == 'S_popup') {
        document.getElementById('S_popup').style.display = "none";
    }
}
