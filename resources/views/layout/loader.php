<?php
$bg_array = array("#CEED9D","#ECED9D","#EDCF9D","#EC9CA7","#ED9DD0","#EE9DE2","#D69DEC","#9E9CEC");
$bg = array_rand($bg_array,1);
?>
<div class="loader" style="background-color:<?php echo $bg_array[$bg];?>;" >
<div class="txt-title">jQuery DIV Auto Load Refresh</div>
<div class="txt-subtitle">This Banner auto loads and refreshes every 2 seconds.</div>
</div>