$(document).ready(function() {
    var condition = 0; //i get this from database
    var c = condition;


    if(c == 0){

        $('.a').css({'display':''});
    }else if(c == 1){

        $('.b').css({'display':''});
    }

    $('.a').click(function(){
        $('.a').hide();
        $('.b').show();
    });
    $('.b').click(function(){
        $('.b').hide();
        $('.a').show();
    });
});


function SwitchButtons(buttonId) {
    var hideBtn, showBtn
    if (buttonId == 'button1') {
        $(".button2").show();
        $(".button1").hide();
        // showBtn = 'button2';
        // hideBtn = 'button1';
    } else {
        $(".button1").show();
        $(".button2").hide();
        // showBtn = 'button1';
        // hideBtn = 'button2';
    }
    //I don't have your menus, so this is commented out.  just uncomment for your usage
    // document.getElementById(menuToggle).toggle(); //step 1: toggle menu
    document.getElementsByClassName(hideBtn).style.display = 'none'; //step 2 :additional feature hide button
    document.getElementsByClassName(showBtn).style.display = ''; //step 3:additional feature show button
}


function loadDoc(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET","/admin_sale_edit_ajax?q="+str,true);
        xhttp.send();
    }

    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } else {
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp1.open("GET","/admin_rent_edit_ajax?q="+str,true);
        xhttp1.send();
    }

    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
        return;
    } else {
        var xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp2.open("GET","/admin_purchase_edit_ajax?q="+str,true);
        xhttp2.send();
    }
}


