<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>srcview</title>
		<meta name="description" content="A web utility to fetch and view the source of a remote URL. Useful for debugging on mobile or across user agents.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="/assets/css/styles.css" type="text/css">
<?php if (isset($source)) { ?>
		<link rel="icon" type="image/gif" href="/assets/img/favicon-success.gif">
		<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<?php } else if (isset($error)) { ?>
		<link rel="icon" type="image/gif" href="/assets/img/favicon-error.gif">
<?php } else { ?>
		<link rel="icon" type="image/gif" href="/assets/img/favicon.gif">
<?php } ?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="/assets/js/scripts.min.js"></script>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<h1><span>src</span>View</h1>
			<p>A web utility to fetch and view the source of a remote URL. Useful for debugging on mobile or across user agents.</p>
<?php if (isset($error)) { ?>
			
			<p class="message"><?php echo isset($message) ? $message : 'HTTP Error: ' . $error; ?></p>
<?php } ?>
			
			<form action="/" method="post" accept-charset="utf-8">
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
								<option value="googlebot" <?=set_select('user_agent', 'googlebot');?>>Googlebot</option>
								<option value="other" <?=set_select('user_agent', 'other');?>>Other:</option>
							</select>
							
							<input type="text" name="other_agent" value="<?=set_value('other_agent');?>" autocorrect="off" autocapitalize="off" placeholder="User Agent String">
						</dd>
				</dl>
				
				<button type="submit">Fetch Source</button>
			</form>
		</header>
<?php if (isset($source)) { ?>
		
		<pre><code class="prettyprint linenums"><?php echo htmlentities($source, ENT_QUOTES, 'UTF-8'); ?></code></pre>
<?php } ?>
		
		<footer>
			<p>Built by <a href="http://aaronclinger.com/" target="_blank">Aaron</a> &amp; <a href="http://lucasishuman.com/" target="_blank">Lucas</a>.<br>Powered by <a href="http://ellislab.com/codeigniter" target="_blank">CodeIgniter</a>, <a href="http://jquery.com/" target="_blank">jQuery</a> &amp; <a href="http://code.google.com/p/google-code-prettify/" target="_blank">Prettify</a>.<br>Source on <a href="https://github.com/aaronclinger/srcview" target="_blank">GitHub</a>.</p>
		</footer>
	</body>
</html>