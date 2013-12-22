function onKeyEnter(key)
{
    if (key === 13) { sendmessage(document.getElementById('speudo').value, document.getElementById('message').value); return true; }
    return false;
}

function Ajx()
{
    var request = false;
    try { request = new ActiveXObject('Msxml2.XMLHTTP'); }
    catch (err2) {
        try { request = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (err3) {
            try { request = new XMLHttpRequest(); }
            catch (err1) { request = false; }
        }
    }
    return request;
}

function refreshchat(time)
{
    var xhr = Ajx();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var messages = new Array();
                eval("messages = " + xhr.responseText);
                var newsMessages = false;
                for (var l in messages) {
                    newsMessages = true;
                    var pmessage = document.createElement("p");
                    pmessage.innerHTML = '<em class="date">' + messages[l][0] + '</em><em class="speudo">' + messages[l][1] + ':</em>' + messages[l][2];
                    document.getElementById("tchat").appendChild(pmessage);
                    lasttime = messages[l][0];
                }
                if (newsMessages) { document.getElementById("tchat").scrollTop = document.getElementById("tchat").scrollHeight; }
                t = setTimeout("refreshchat(lasttime)", 3000);
            } 
            else { alert("Error code " + xhr.status); }
        }
    };
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('act=refresh&lasttime=' + time);
}

function sendmessage(speudo, message)
{
    print('dans js send');
    speudo = speudo.replace(/&/g, "%26");
    message = message.replace(/&/g, "%26");
    speudo = speudo.replace(/\+/g, "%2B");
    message = message.replace(/\+/g, "%2B");
    if ((message === '') || (speudo === '')) { alert('Please put a message'); }
    var xhr = Ajx();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) { document.getElementById("message").value = "";} 
            else { alert("Error code " + xhr.status); }
        }
    };
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('act=add&speudo=' + speudo + '&message=' + message);
}


