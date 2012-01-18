<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Welcome to <?php echo $site_name; ?>!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">

<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Message from <?=$first_name?> <?=$last_name?></h2>
<br/><br/>
<p>
<b>Title:</b> <?=$title?>
</p>
<p>
<b>Description:</b> <?=$description?>
</p>
<p>
<b>Company Name:</b> <?=$company_name?>
</p>
<p>
<b>Address:</b> <?=$address?>
</p>
<p>
<b>Phone:</b> <?=$phone?>
</p>
<p>
<b>Email:</b> <?=$email?>
</p>
<p>
<b>IP Address:</b> <?=$ipaddress?>
</p>


</td>
</tr>
</table>
</div>
</body>
</html>