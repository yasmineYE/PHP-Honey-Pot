function getXMLHttpRequest()
{
    var xhrequest = null;

    if(window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject){
            try{
                xhrequest = new ActiveXObject("Msxml2.XMLHTTP");
            }catch(e){
                xhrequest = new ActiveXObject("Microsoft.XMLHttp");
            }
        }else{
            xhrequest = new XMLHttpRequest();

        }
    }else{
        alert("XMLHttpRequest is not supported by this browser");
        return null;
    }

    return xhrequest;
}

function connect()
{
    var req = getXMLHttpRequest();

    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;


    var params="login="+login+"&password="+password;

    req.open('POST', './connect.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(params);


    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){

            var result = req.responseText;

            if(result == 'Connected'){
                window.location.replace("./comment.php");
            }else{
                alert(result);

            }
        }
    }
}

function createUser()
{
    var req = getXMLHttpRequest();

    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;
    var sd_password = document.getElementById("sd_password").value;


    var params="login="+login+"&password="+password+"&sd_password="+sd_password;

    req.open('POST', './creation.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(params);


    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){

            var result = req.responseText;

            if(result == 'Registred'){
                window.location.replace("./comment.php")
            }else{
                alert(result);
            }
        }
    }
}

function back()
{
    window.location.replace("./comment.php");
}

function createComment()
{
    window.location.href= "./newComment.php";
}

function send(){
    var req = getXMLHttpRequest();

    var title = document.getElementById("title").value;
    var content = document.getElementById("content").value;

    var params = "title="+title+"&content="+content;

    req.open('POST', './createComment.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(params);

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var result = req.responseText;

            if(result == "OK"){
                alert("Successfully submitted");
            }else{
               alert(result);
            }
        }
    }
}


function onRowClick(){
    $(document).ready(function(){
      $("#commentTable").find('tr').click( function(){
        index = $(this).index();
    });
});
return index;
}

function displayComment()
{
    var req = getXMLHttpRequest();
    var nodeList = document.getElementsByTagName("a");
    var title;
    var date;

    index = onRowClick();
    //alert(index);

    title = nodeList.item(index-1).firstChild.nodeValue;
    date = document.getElementsByTagName("td").item(index-1).firstChild.nodeValue;

    var params = "title="+title+"&date="+date;

    req.open('POST', './displayComment.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(params);

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var result = req.responseText;

            document.getElementById("menu").innerHTML = ' ';

            var div = document.getElementById("main");
            div.innerHTML = ' ';


            div.innerHTML = result;

        }
    }

}

function foo()
{
    var req = getXMLHttpRequest();
    var index = onRowClick();

    var nodeList = document.getElementsByTagName("a");
    var title = nodeList.item(index-1).firstChild.nodeValue;

    var param = "title="+title;

    req.open('POST', './removeComment.php', true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(param);

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var result = req.responseText;

            if(result == "removed"){
                document.getElementById("commentTable").deleteRow(index);
                window.location.replace('./comment.php');
            }else{
                document.getElementById("message").innerHTML= result;
            }
        }
    }

}
