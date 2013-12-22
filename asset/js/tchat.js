function timeConverter(UNIX_timestamp){
 var a = new Date(UNIX_timestamp*1000);
 var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
     var year = a.getFullYear();
     var month = months[a.getMonth()];
     var date = a.getDate();
     var hour = a.getHours();
     var min = a.getMinutes();
     var sec = a.getSeconds();
     var time = date+' '+month+' '+year+' '+hour+':'+min+':'+sec ;
     return time;
 }

function onKeyEnter(key)
  {      
    if (key == 13) {
      sendmessage(document.getElementById('pseudo').value,document.getElementById('message').value);
      return true;
    }
    return false;
  }
  
function Ajx() 
  {
    var request = false;
        try {request = new ActiveXObject('Msxml2.XMLHTTP');}
        catch (err2) {try {request = new ActiveXObject('Microsoft.XMLHTTP');}
          	catch (err3) {try {request = new XMLHttpRequest();}
			catch (err1) {request = false;}
           	}
        }
    return request;
  }
  
function refreshchat(time)
  {
    var xhr = Ajx(); 
    xhr.onreadystatechange  = function(){if(xhr.readyState  == 4){ 
      if(xhr.status  == 200) {
	var messages= new Array();
	eval ("messages = " + xhr.responseText);
	var yaDesNouveauxMessages=false;
	for (var l in messages){
            var date = new Date(messages[l][0]);
	  yaDesNouveauxMessages=true;
	  var pmessage=document.createElement("p");
	  pmessage.innerHTML='\
            <em class="date">'+ timeConverter(messages[l][0]) + '</em><em class="pseudo">' + messages[l][1] + ':</em>' + messages[l][2];
	  document.getElementById("tchat").appendChild(pmessage);
	  lasttime=messages[l][0];
	}
	if (yaDesNouveauxMessages){
	  //on redescend la scrollbar
	  document.getElementById("tchat").scrollTop=document.getElementById("tchat").scrollHeight;
	}
	t=setTimeout("refreshchat(lasttime)",3000);
      }else{
	alert("Error code " + xhr.status);
      }
    }};
    xhr.open("POST", "index.php",  true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('act=refresh&lasttime=' + time);
  }
  
function sendmessage(pseudo,message)
  {
    pseudo = pseudo.replace(/&/g,"%26");
    message= message.replace(/&/g,"%26");
    pseudo = pseudo.replace(/\+/g,"%2B");
    message= message.replace(/\+/g,"%2B");
    if ((message=='') || (pseudo=='')){
      alert('Veuillez mettre un pseudo et un message');
    }
    var xhr = Ajx(); 
    xhr.onreadystatechange  = function(){if(xhr.readyState  == 4){ 
      if(xhr.status  == 200) {
	document.getElementById("message").value="";
      }else{
	alert("Error code " + xhr.status);
      }
    }};
    xhr.open("POST", "index.php",  true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('act=add&pseudo=' + pseudo +  '&message=' + message );
  }