<fieldset>
	<legend>Javascript</legend>
	<div style="padding:10px;">	
		<P>如果需要使用JavaScript来监测网站，请将下面的代码复制粘贴到你的HTML页面中。 </P>
	
		<textarea cols="110" rows="18">
				
<?php echo $tracking_code; ?>
				
		</textarea>
	</div>		
</fieldset>
			
<fieldset>
	<legend>PHP</legend>
	<div style="padding:10px;">
	
		<P>如果需要使用PHP来监测网站，请将下面代码复制粘贴到你的PHP脚本、应用中。</P>
			
		<textarea cols="75" rows="12">
		
require_once('<?php echo OWA_BASE_CLASSES_DIR;?>owa_php.php');
		
$owa = new owa_php();
// Set the site id you want to track
$owa->setSiteId('<?php echo $site_id;?>');
// Uncomment the next line to set your page title
//$owa->setPageTitle('somepagetitle');
// Set other page properties
//$owa->setProperty('foo', 'bar');
$owa->trackPageView();
		</textarea>
	
	</div>
</fieldset>
			
