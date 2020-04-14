<div class="content-box"><!-- Start Content Box -->
	
	<div class="content-box-header">
		<h3><?php echo $table_text; ?></h3>
		<div class="clear"></div>
	</div>
	<!-- End .content-box-header -->
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<table>
				<thead>
					<tr>
						<th>登陆名</th>
						<?php echo $id ? '<th>当前密码</th>' : ''; ?>
						<th>密码</th>
						<th>确定密码</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<script type="text/javascript">
						function checkInfo(form1){
							if(form1.name.value.length <5)
							{
								alert('用户不能小于5个字符！');
								form1.name.focus();
								return false;
							}
							if(form1.password.value.length <5)
							{
								alert('密码不能小于5个字符！');
								form1.name.focus();
								return false;
							}
							if(form1.password.value != form1.password2.value)
							{
								alert('密码不一致！');
								form1.name.focus();
								return false;
							}
						}
					</script>
				<tbody>
					<tr class="alt-row">
						<form action="<?php echo site_url('a_admin/save'); ?>" method="post" id="form1" onsubmit="return checkInfo(this);" />
						
				<?php 
						if($id)
						{
							echo '<td>';
							echo '<input type="text" name="name" value="'.$name.'" disabled="disabled" />';
							echo '</td>';
							echo '<td>';
							echo '<input type="password" name="old_password" />';
							echo '</td>';
							echo '<input type="hidden" name="hid" value="'.$id.'"/>';							
						}else{
							echo '<td>';
							echo '<input type="text" name="name" value="" />';
							echo '</td>';
						}
						
				?>
						<td><input type="password" name="password" /></td>
						<td><input type="password" name="password2" /></td>
						<td><input class="button" type="submit" value="<?php echo $button_name; ?>"/>
							<input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" /></td>
						</form>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- End #tab2 --> 
		
	</div>
	<!-- End .content-box-content --> 
	
</div>
