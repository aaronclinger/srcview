<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Sourcer</title>
	</head>
	<body>
		<form action="/" method="post" accept-charset="utf-8" id="sign-in-form">
			<fieldset>
				<legend>Sourcer</legend>
				
				<dl>
					<dt><label for="url">URL to Fetch:</label></dt>
						<dd><input type="url" name="url" id="url" value="<?=set_value('url', 'http://');?>"></dd>
					<dt><label for="user-agent">User Agent:</label></dt>
						<dd>
							<select id="user-agent" name="user_agent">
								<option value="" <?=set_select('user_agent', '', TRUE);?>>My User Agent</option>
								<option value="desktop" <?=set_select('user_agent', 'desktop');?>>Desktop</option>
								<option value="iphone" <?=set_select('user_agent', 'iphone');?>>iPhone</option>
								<option value="ipad" <?=set_select('user_agent', 'ipad');?>>iPad</option>
								<option value="andriod_mobile" <?=set_select('user_agent', 'andriod_mobile');?>>Andriod Mobile</option>
								<option value="andriod_tablet" <?=set_select('user_agent', 'andriod_tablet');?>>Andriod Tablet</option>
								<option value="other" <?=set_select('user_agent', 'other');?>>Other:</option>
							</select>
							
							<input type="text" name="other_agent" value="<?=set_value('other_agent');?>" autocorrect="off" autocapitalize="off">
						</dd>
				</dl>
				
				<button type="submit">Fetch Source</button>
			</fieldset>
		</form>
<?php
	if (isset($source))
	{
		echo '<pre><code>' . htmlentities($source) . '</code></pre>';
	}
?>

	</body>
</html>