function openCenteredWindow(url, w, h) {
    var width = parseInt(w);
    var height = parseInt(h);
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + "px ,height=" + height +
      "px,status=no,resizable=no,location=no,left=" + left + ",top=" + top +
      "screenX=" + left + ",screenY=" + top;
    myWindow = window.open(url, "subWind", windowFeatures);
    return myWindow;
}

function loadBlog(url, func) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      func(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function callbackBlog(xhttp) {
  document.getElementById('leftcolumn').innerHTML=xhttp.responseText;
  $("html, body").animate({scrollTop: 0},"slow");
  //loadLogin("login.php", callbackLogin);
  $(".react").each(function() {
    $(this).hide();
  });
  $(".button10").each(function() {
    $(this).on("click", function() {

      var $div = $(this).siblings("#react");
      $div.toggle(2000);
    });
  });
  
}

function loadLogin(url, func) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      func(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function callbackLogin(xhttp) {
  document.getElementById('toprow').innerHTML=xhttp.responseText;
  $("html, body").animate({scrollTop: 0},"slow");
}

function validate(form) {
	fail  = validateTitle(form.title.value)
	fail += validateText(form.text.value)
	if (fail == "") return true
	else { alert(fail); return false }
}

function validateTitle(field) {
	if (field == "") return "Je hebt geen titel ingevuld.\n"
	return ""
}

function validateText(field) {
	if (field == "") return "Je hebt geen tekst toegevoegd.\n"
	return ""
}

function getSelectValues(select) {
  var result = [];
  var options = select && select.options;
  var opt;
  for (var i=0; i<options.length; i++) {
    opt = options[i];
    if (opt.selected) {
      result.push(opt.text);
    }
  }
  return result;
}

shortcuts = {
  "abr" : "August Burns Red",
  "atg" : "At The Gates",
  "bt" : "Brutal Truth",
  "ax" : "asphyx",
  "fap" : "Fleshgod Apocalypse",
  "sls" : "Slayer Sucks!!",
  "slr" : "Slayer Reigns!!"
};

function magic() {
  var ta = document.getElementById("textarea");
  var timer = 0;
  var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");
  update = function() {
    ta.value = ta.value.replace(re, function($0, $1) {
      return shortcuts[$1.toLowerCase()];
    });
  }
  ta.onkeydown = function() {
    for(i=0; i<carray.length; i++) {
      if(ta.value.search(carray[i]) > -1) {
        ta.value = ta.value.replace(carray[i], "<b style='color:darkred;'>"+carray[i].toUpperCase()+"</b>");
      }
    }
    clearTimeout(timer);
    timer = setTimeout(update, 200);
  }
}

$("#button1").on("click", function() {
  location.href = "newArticle.php";
});

$("#button2").on("click", function() {
  $('#sel').toggle(1000);
});

var sel3 = [];
$("#button3").on("click", function() {
  var elem = document.getElementsByTagName('select')[0];
  sel3 = getSelectValues(elem);
  loadBlog("blogcontent.php?options="+sel3, callbackBlog);
});

$("#button4").on("click", function() {
  var search = document.getElementById('search').value;
  loadBlog("blogcontent.php?search="+search, callbackBlog);
});

