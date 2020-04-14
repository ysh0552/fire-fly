<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script>
<!--
/*	function changeID(id){
		var sProID = window.parent.document.all.sProID;
		if(sProID.value == ''){
			sProID.value = id;
		}else{
			sProID.value = sProID.value + ',' + id
			}
		window.parent.TB_remove();
	}


function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}*/
-->

</script>
<style>
body{ margin:0px; padding:0px; font-size:12px; background:url(../images/bgg.gif) center 0 repeat-x;}
dl,dd,dt,ul,li,a,ol{ margin:0px; padding:0px; list-style:none; text-decoration:none;}
img{ border:0px;}
.info{ width:100%; height:auto; float:left;}
.info p{ width:480px; margin:0 auto; height:30px; line-height:30px; }
.info p span{ width:100px; float:left; font-weight:bold; font-size:14px; text-align:right;}
</style>
<body>
<div class="info">
<p><span>createtime：</span><?php echo $msginfo[0]['createtime']; ?></p>
<p><span>name：</span><?php echo $msginfo[0]['name']; ?></p>
<p><span>email：</span><?php echo $msginfo[0]['email']; ?></p>
<p><span>subject：</span><?php echo $msginfo[0]['subject']; ?></p>
<p><span>content：</span><?php echo str_replace('<br/><br/>','<br/>',$msginfo[0]['content']); ?></p>
</div>

</body>
</html>
