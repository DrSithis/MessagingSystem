<?php
require_once './view/header.php';

echo '
<tr><td class="w640" height="30" bgcolor="#000000" width="640"></td></tr>
<tr id="simple-content-row"><td class="w640" bgcolor="#000000" width="640">
        <table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
            <tbody><tr>
                    <td class="w30" width="30"></td>
                    <td class="w580" width="580">
            <repeater>

                <layout label="Text only">
                    <table class="w580" border="0" cellpadding="0" cellspacing="0" width="580">
                        <tbody><tr>
                                <td class="w580" width="580">
                                    <p class="article-title" align="left"><singleline label="Title">Add a title</singleline></p>
                        <div class="article-content" align="left">
                            <multiline label="Description">Enter your description</multiline>
                        </div>
                        </td>
                        </tr>
                        <tr><td class="w580" height="10" width="580"></td></tr>
                        </tbody></table>
                </layout>
                </td>
                <td class="w30" width="30"></td>
                </tr>
                </tbody>
        </table>
    </td>
</tr>
<tr><td class="w640" height="15" bgcolor="#000000" width="640"></td></tr>
';

require_once './view/footer.php';