<p>网站助手的账号已经创建完成</p>

<p> 你的用户名是: <?php $this->out( $user_id );?></p> 

<p>需要设置密码请点击下面的链接。</p>

<p><?php echo $this->makeAbsoluteLink(array('do' => 'base.usersPasswordEntry', 'k' => $key));?> </p>

<p>当你的密码设置完成你可以通过下面的链接访问我们的页面。</p>

<p><?php echo $this->makeAbsoluteLink(array('do' => 'base.reportDashboard'));?></p> 