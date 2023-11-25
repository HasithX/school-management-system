
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

window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("navbar").style.top = "-8em";
    } else {
        document.getElementById("navbar").style.top = "0px";
    }
}



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

    //-----------search data here----------\

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

    $('#T_add_button').click(function() {
        document.getElementById('T_form').reset(),
        $('#T_popup').find('input[type=button]').attr('id', 'add_teacher').val('Add');
    });

    $('#S_add_button').click(function() {
        document.getElementById('S_form').reset(),
        $('#S_popup').find('input[type=button]').attr('id', 'add_student').val('Add');
    });

});

 //---------add data here-------------\

$(document).on('click',"#add_teacher", function(){
        
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
        $("#table2").html(data);
    
    });
});

$(document).on('click',"#add_student", function(){
    
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
        $("#table3").html(data);
    });
  
});

//-----------delete data here----------\\

$(document).on('click', '.teacher_row_delete', function() {
    var teacher_id = $(this).attr('id');

    $.post("search.php",
    {
        delete_teacher: teacher_id
    },
    function(data,status){
        if (status === 'success') {
            $('#' + teacher_id ).closest('tr').remove();
        }
        $("#f_p2").html(data);
    });
});

$(document).on('click', '.student_row_delete', function() {
    var student_id = $(this).attr('id');

    $.post("search.php",
    {
        delete_student: student_id
    },
    function(data,status){
        if (status === 'success') {
            $('#' + student_id ).closest('tr').remove();
        }
        $("#f_p3").html(data);
    });
});

//-----------edit dta form data here----------\\

//find each row

$(document).on('click', '.timetable_row_edit', function() {
    var timetable_id = $(this).attr('id');

    $.post("search.php",
    {
        get_timetable_details: timetable_id
    },

    function(data,status){
        var parsedData = JSON.parse(data);
        console.log(parsedData);

        $("#tt_id").attr('ttid',parsedData.time_table_id);
        $("#tt_date").val(parsedData.date);
        $("#tt_period").val(parsedData.time);
        $("#tt_class").val(parsedData.class);
        $("#tt_subject").val(parsedData.subject);
        $("#tt_teachers").val(parsedData.teacher);

        $('#tt_popup').find('input[type=button]').attr('id', 'edit_tt').val('edit');
        popup('tt_popup');
    });
});

$(document).on('click', '.teacher_row_edit', function() {
    var teacher_id = $(this).attr('id');

    $.post("search.php",
    {
        get_teacher_details: teacher_id
    },
    function(data,status){
        var parsedData = JSON.parse(data);
        console.log(parsedData);

        $("#TT_id").attr('TTid',parsedData.T_ID);
        $("#T_id").val(parsedData.T_ID);
        $("#T_name").val(parsedData.name);
        $("#T_tp").val(parsedData.tele);
        $("#T_subject").val(parsedData.subject);
        $("#T_dob").val(parsedData.dob);

        $('#T_popup').find('input[type=button]').attr('id', 'edit_T').val('edit');
        popup('T_popup');
    });
});

$(document).on('click', '.student_row_edit', function() {
    var student_id = $(this).attr('id');

    $.post("search.php",
    {
        gae_student_detais: student_id
    },
    function(data,status){
        var parsedData = JSON.parse(data);
        console.log(parsedData);

        $("#ss_id").attr('ssid',parsedData.S_ID);
        $("#S_id").val(parsedData.S_ID);
        $("#S_name").val(parsedData.Name);
        $("#S_class").val(parsedData.class);
        $("#S_city").val(parsedData.City);
        $("#S_dob").val(parsedData.DOB);
        $("#S_tp").val(parsedData.Tele);

        $('#S_popup').find('input[type=button]').attr('id', 'edit_S').val('edit');
        popup('S_popup');
    });
});

//edit data

$(document).on('click','#edit_timetable', function(){
    $.post("search.php",
    {
        edit_timetable : "",
        tt_id :  $("#tt_id").attr('ttid').val(),
        tt_date : $("#tt_date").val(),
        tt_period : $("#tt_period").val(),
        tt_subject : $("#tt_subject").val(),
        tt_class : $("#tt_class").val(),
        tt_teachers : $("#tt_teachers").val()
    },
    function(data, status){
        $("#table1").html(data);
    
    });

});

$(document).on('click','#edit_T', function(){
    $.post("search.php",
    {
        edit_teacher : "",
        id :  $("#TT_id").attr('TTid').val(),
        name : $("#T_name").val(),
        tp : $("#T_tp").val(),
        subject : $("#T_subject").val(),
        dob : $("#T_dob").val()
    },
    function(data, status){
        $("#table2").html(data);
    
    });

});

$(document).on('click','#edit_S', function(){
    $.post("search.php",
    {
        edit_student : "",
        S_id :  $("#ss_id").attr('ssid').val(),
        S_name : $("#S_name").val(),
        S_tp : $("#S_tp").val(),
        S_class : $("#S_class").val(),
        S_dob : $("#S_dob").val(),
        S_city : $("#S_city").val()
    },
    function(data, status){
        $("#table3").html(data);
    });

});
    

    

