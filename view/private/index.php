<?php
if($_SESSION['usersconnect'] != 'connect'){
    redirect('login.php', 'Veillez vous connecter!');
}else{
     echo '<tr><td class="w580" width="580"><p class="article-title" align="left"><singleline label="Title">
           Welcome to your IM.<br><br><br>
           </singleline></p><div class="article-content" align="left">';
     echo '<multiline label="Description" style="margin-left : 40%;">';
                
     echo '</multiline>';
     echo '</div></td></tr><tr><td class="w580" height="10" width="580"></td></tr>';
}



