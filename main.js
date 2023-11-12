

$(document).ready(function(){

    //------------------data loding here------------\

    $.post("search.php",
    {
        timetable_name:""
    },
    function(data, status){
    $("#table1").html(data);
    });

    $.post("search.php",
    {
        teacher_name : ""
    },
    function(data, status){
        $("#table2").html(data);
    });

    $.post("search.php",
    {
        student_name:""
    },
    function(data, status){
    $("#table3").html(data);
    });

    $.post("search.php",
    {
        get_teachers_list:""
    },
    function(data, status){
    $("#tt_teachers").html(data);
    });

    // //-----------search data here----------\

    //timetable
    $("#search1").keyup(function(){
        var timename = $("#search1").val();
        $.post('search.php',
        {
            timetable_name : timename,
            
        }, 
        function(data,status){
            $("#table1").html(data);
        });
    });

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
            student_name : stname,

        },
        function(data, status){
            $("#table3").html(data);
        });
    });

    //---------add data here-------------\
    // $("#add_timetable").click(function(){
    //     $.post("search.php",
    //     {
    //         timetable_name:""
    //     },
    //     function(data, status){
    //     $("#table1").html(data);
    //     }),
    //     $.post("search.php",
    //     {
    //         add_timetable : "",
    //         tt_date : $("#tt_date").val(),
    //         tt_period : $("#tt_period").val(),
    //         tt_subject : $("#tt_subject").val(),
    //         tt_class : $("#tt_class").val(),
    //         tt_teachers : $("#tt_teachers").val()
    //     },
    //     function(data, status){
    //         $("#f_p1").html(data);
        
    //     }),
    //     $.post("search.php",
    //     {
    //         timetable_name:""
    //     },
    //     function(data, status){
    //     $("#table1").html(data);
    //     });
        
    // });


    $("#add_teacher").click(function(){
        $.post("search.php",
        {
            teacher_name : ""
        },
        function(data, status){
            $("#table2").html(data);
        }),
        $.post("search.php",
        {
            add_teacher : "",
            name : $("#T_name").val(),
            id : $("#T_id").val(),
            tp : $("#T_tp").val(),
            subject : $("#T_subject").val(),
            dob : $("#T_dob").val()
        },
        function(data, status){
            $("#f_p2").html(data);
        
        }),
        $.post("search.php",
        {
            teacher_name : ""
        },
        function(data, status){
            $("#table2").html(data);
        });
    });

    $("#add_student").click(function(){
        $.post("search.php",
        {
            student_name:""
        },
        function(data, status){
        $("#table3").html(data);
        }),
        $.post("search.php",
        {
            add_student : "",
            S_name : $("#S_name").val(),
            S_id : $("#S_id").val(),
            S_tp : $("#S_tp").val(),
            S_class : $("#S_class").val(),
            S_dob : $("#S_dob").val(),
            S_city : $("#S_city").val()
        },
        function(data, status){
            $("#f_p3").html(data);
        })
        $.post("search.php",
        {
            student_name:""
        },
        function(data, status){
        $("#table3").html(data);
        });
    });
    
});



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
        document.getElementById('T_popup').style.display = "none";
    }
    if (point == 'S_popup') {
        document.getElementById('S_popup').style.display = "none";
    }
}

