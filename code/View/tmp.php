<div class="container">
    <form enctype="multipart/form-data" method="post" action="/?action=load">
        <input type="file" name="uploads" />
        <input type="submit" value="load" />
    </form>
</div>

<br />
<font size='1'><table class='xdebug-error' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f
; font-size: x-large;'>( ! )</span> Warning: file() expects parameter 1 to be string, array given in
 /home/webhome/images/code/Controller/Main.php on line <i>27</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align
='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left'
 bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0003</td><td bgcolor
='#eeeeec' align='right'>337940</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='/home/webhome/images
/web/index.php' bgcolor='#eeeeec'>../index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0025</td><td bgcolor
='#eeeeec' align='right'>416196</td><td bgcolor='#eeeeec'>Controller->run(  )</td><td title='/home/webhome
/images/web/index.php' bgcolor='#eeeeec'>../index.php<b>:</b>22</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0025</td><td bgcolor
='#eeeeec' align='right'>416276</td><td bgcolor='#eeeeec'>Controller_Main->loadAction(  )</td><td title
='/home/webhome/images/code/Controller.php' bgcolor='#eeeeec'>../Controller.php<b>:</b>17</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0026</td><td bgcolor
='#eeeeec' align='right'>417076</td><td bgcolor='#eeeeec'><a href='http://www.php.net/file' target='_new'
>file</a>
(  )</td><td title='/home/webhome/images/code/Controller/Main.php' bgcolor='#eeeeec'>../Main.php<b>:
</b>27</td></tr>
</table></font>

