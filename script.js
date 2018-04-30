function subnav1(){
    $("#subnav1").toggle(300);
}
function subnav2(){
    $("#subnav2").toggle(300);
}
function ajax(id){
        var show = $("#"+id).attr('path');
        $.ajax({
            url:"core.php?type=ajaxpages&page="+show+".php",
            method:"POST",
            success:function(data){
                $('.changes-panel').html(data);
            }
        }); 
}
function overline(page , id){
    $.ajax({
        url:"core.php?type=overline&page="+page+"&id="+id,
        method:"POST",
        success:function(data){
            $('.markedpanel').html(data);
        }
    });
}
function deleteall(page){
    var response = confirm("Are you sure want to delete all!!");
    if(response == false){
        return false;
    }
    $.ajax({
        url:"core.php?type=deleteall&page="+page,
        method:"POST",
        success:function(data){
            $(".previous_list").css("display","none");
            $(".content_list").html(data);
            $(".message-panel").css("display","none");
            $(".message-panel").slideDown(700);
            $(".message-panel").delay(2000);
            $(".message-panel").slideUp(700);  
        }
    });
    badge(page);
}
function todo(page,e){
        var str = $("#"+page).val();
        $("#"+page).val('');
        var pagelowercase = page.toLowerCase();
        $.ajax({
            url:"core.php?type=create&page="+pagelowercase+"&val="+str,
            method:"POST",
            success:function(data){
                $(".previous_list").css("display","none");
                $(".content_list").html(data);
                badge(pagelowercase);              
            }
        });
        e.preventDefault();
}
function badge(page){
    $.ajax({
        url:"core.php?type=badge&page="+page+"&cache="+Math.random(),
        method:"POST",
        cache:false,
        success:function(data){
            $("#todo-badge-"+page).css("display","block");
            $(".badge-"+page).html(data);
        }
    });
}
/* On just pressing enter todo will save */
function onenter(event){
    if(event.keyCode == 13 || event.which == 13){
        $('#add-btn').click();
    }
}
function del(page,id){
    var rub = page.split("-"); 
    var currpage = rub[0];
    $.ajax({
        url:"core.php?type=delete&page="+currpage+"&id="+id,
        method:"POST",
        success:function(data){
            $('.previous_list').css("display","none");
            $(".content_list").html(data);
            badge(currpage);
        }
    });
}