<!DOCTYPE html>
<html>
    <head>
        <title>PHP POO Messagerie</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=320, target-densitydpi=device-dpi">
        <link rel="stylesheet" href="./asset/css/style.css">
        <script src="asset/js/jquery.js"></script>
        <!--[if gte mso 9]>
        <style _tmplitem="1324" >
        .article-content ol, .article-content ul {
           margin: 0 0 0 24px;
           padding: 0;
           list-style-position: inside;
        }
        </style>
        <![endif]-->
    </head>
    <body>
        <table id="background-table" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                    <td align="center" bgcolor="#1c141c">
                        <table class="w640" style="margin:0 10px;" border="0" cellpadding="0" cellspacing="0" width="800">
                            <tbody><tr><td class="w640" height="20" width="800"></td></tr>

                                <tr>
                                    <td class="w640" width="800">
                                        <table id="top-bar" class="w640" bgcolor="#694f80" border="0" cellpadding="0" cellspacing="0" width="800">
                                            <tbody><tr>
                                                    <td class="w15" width="15"></td>
                                                    <td class="w325" align="left" valign="middle" width="350">
                                                        <table class="w325" border="0" cellpadding="0" cellspacing="0" width="350">
                                                            <tbody><tr><td class="w325" height="8" width="350"></td></tr>
                                                            </tbody></table>
                                                        <div class="header-content">
                                                            <span class="hide">
                                                                <a href="./index.php">Home</a> |
                                                                <?php
                                                                if($_SESSION['usersconnect'] != 'connect'){
                                                                    echo '<a href="./signup.php">Sign Up</a> |'; 
                                                                    echo '<a href="./login.php">Login</a>';
                                                                }else{ echo '<a href="./logout.php">Logout</a>'; }?>
                                                            </span>
                                                        </div>
                                                        <table class="w325" border="0" cellpadding="0" cellspacing="0" width="350">
                                                            <tbody><tr><td class="w325" height="8" width="350"></td></tr>
                                                            </tbody></table>
                                                    </td>
                                                    <td class="w30" width="30"></td>
                                                    <td class="w255" align="right" valign="middle" width="255">
                                                        <table class="w255" border="0" cellpadding="0" cellspacing="0" width="255">
                                                            <tbody><tr><td class="w255" height="8" width="255"></td></tr>
                                                            </tbody></table>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>



                                                                </tr>
                                                            </tbody></table>
                                                        <table class="w255" border="0" cellpadding="0" cellspacing="0" width="255">
                                                            <tbody><tr><td class="w255" height="8" width="255"></td></tr>
                                                            </tbody></table>
                                                    </td>
                                                    <td class="w15" width="15"></td>
                                                </tr>
                                            </tbody></table>

                                    </td>
                                </tr>

                                <tr>
                                    <td id="header" class="w640" align="center" bgcolor="#694f80" width="800">

                                        <table class="w640" border="0" cellpadding="0" cellspacing="0" width="800">
                                            <tbody><tr><td class="w30" width="30"></td><td class="w580" height="30" width="580"></td><td class="w30" width="30"></td></tr>
                                                <tr>
                                                    <td class="w30" width="30"></td>
                                                    <td class="w580" width="580">
                                                        <div id="headline" align="center">
                                                            <p>
                                                                <strong><singleline label="Title">Messaging system</singleline></strong>
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="w30" width="30"></td>
                                                </tr>
                                            </tbody></table>


                                    </td>
                                </tr>