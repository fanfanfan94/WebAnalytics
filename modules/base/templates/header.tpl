<div id="owa_header">

	<span class="owa_logo"><img src="<?php echo $this->makeImageLink( owa_coreAPI::getSetting( 'base', 'logo_image_path' ) ); ?>" alt="Open Web Analytics"></span>
	 &nbsp
	<span class="owa_navigation">
		<UL>
			<LI><a href="<?php echo $this->makeLink(array('do' => 'base.sites'));?>">报告</a></LI>
			<LI><a href="<?php echo $this->makeLink(array('do' => 'base.optionsGeneral'));?>">管理员</a></LI>
			<LI><a href="http://wiki.openwebanalytics.com">帮助</a></LI>
			<LI><a href="http://trac.openwebanalytics.com">问题反馈</a></LI>
			
		</UL>
	</span>
	<?php $cu = $this->getCurrentUser(); ?>
	<span class="user-greating" style="">
		Hi, <?php $this->out( $cu->getUserData('user_id') );?> ! &bull;
		<?php if ( ! owa_coreAPI::getSetting( 'base', 'is_embedded' ) ):?>
			
				<?php if ( owa_coreAPI::isCurrentUserAuthenticated() ):?>
				<a class="login" href="<?php echo $this->makeLink(array('do' => 'base.logout'), false);?>">登出</a>
				<?php else:?>
				<a class="login" href="<?php echo $this->makeLink(array('do' => 'base.loginForm'), false);?>">登录</a>
				<?php endif;?>
			
			<?php endif;?>	
	</span>
	<div class="post-nav"></div>
	<?php if (!empty($service_msg)): ?>
	<div class="owa_headerServiceMsg"><?php echo $service_msg; ?></div>
	<?php endif;?>
				
	<?php $this->headerActions(); ?>
	
</div>