function connect() {
  var login = document.getElementById("login").value;
  var password = document.getElementById("password").value;
  var params="login="+login+"&password="+password;

  $.post('./connect.php', params, function(data) {
    if(data == 'Connected'){
      window.location.replace("./comment.php");
    }else{
      alert(result);
    }
  });
}

function createUser() {
  var login = document.getElementById("login").value;
  var password = document.getElementById("password").value;
  var sd_password = document.getElementById("sd_password").value;
  var params = {
    "login": login,
    "password": password,
    "sd_password": sd_password
  };

  $.post('./creation.php', params, function(data) {
    if(data == 'Registred'){
      window.location.replace("./comment.php")
    }else{
      alert(result);
    }
  });
}

function back() {
  window.location.replace("./comment.php");
}

function createComment() {
  window.location.href= "./newComment.php";
}

function send() {
  var title = document.getElementById("title").value;
  var content = document.getElementById("content").value;
  var params = {
    "title": title,
    "content": content
  };

  $.post('./createComment.php', params, function(data) {
    if(data == "OK"){
      alert("Successfully submitted");
    }else{
      alert(result);
    }
  });
}

function onRowClick() {
  return $("#commentTable").find('tr').index();
};

function displayComment() {
  var nodeList = document.getElementsByTagName("a");
  var index = onRowClick();
  var title = nodeList.item(index).firstChild.nodeValue;
  var date = document.getElementsByTagName("td").item(index).firstChild.nodeValue;
  var params = {
    "title": title,
    "date": date
  };

  $.post('./displayComment.php', params, function(data) {
    document.getElementById("menu").innerHTML = ' ';
    var div = document.getElementById("main");
    div.innerHTML = ' ';
    div.innerHTML = data;
  });
}

function foo() {
  var index = onRowClick();
  var nodeList = document.getElementsByTagName("a");
  var title = nodeList.item(index).firstChild.nodeValue;
  var params = {
    "title": title
  };

  $.post('./removeComment.php', params, function(data) {
    if(data == "removed"){
      document.getElementById("commentTable").deleteRow(index);
      window.location.replace('./comment.php');
    }else{
      document.getElementById("message").innerHTML= data;
    }
  });
}
