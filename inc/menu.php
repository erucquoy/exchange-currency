				<div class="span3">
					<div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
							<li class="nav-header">
								Exchange-Currency
							</li>
							<li <?php if($page == "dashboard") { echo 'class="active"'; } ?>>
								<a href="index.php?p=dashboard"><i class="icon-home"></i> Dashboard</a>
							</li>
							<li <?php if($page == "sell") { echo 'class="active"'; } ?>>
								<a href="index.php?p=sell"><i class="icon-folder-open"></i> Sell a card</a>
							</li>
							<li <?php if($page == "activity") { echo 'class="active"'; } ?>>
								<a href="index.php?p=activity"><i class="icon-list-alt"></i> Public Activity</a>
							</li>
							<li class="nav-header">
								Your Account
							</li>
							<?php
							if($connected)
							{
							?>
							<li <?php if($page == "stats") { echo 'class="active"'; } ?>>
								<a href="index.php?p=stats"><i class="icon-user"></i> Your stats</a>
							</li>
							<li <?php if($page == "settings") { echo 'class="active"'; } ?>>
								<a href="index.php?p=account"><i class="icon-cog "></i> Settings</a>
							</li>
							<li <?php if($page == "messages") { echo 'class="active"'; } ?>>
								<a href="#"><i class="icon-envelope "></i> Messages</a>
							</li>
							<?php
							}
							else
							{
                            /*
							?>
							<li <?php if($page == "register") { echo 'class="active"'; } ?>>
								<a href="index.php?p=register"><i class="icon-user "></i> Register</a>
							</li>
							<li <?php if($page == "login") { echo 'class="active"'; } ?>>
								<a href="index.php?p=login"><i class="icon-cog "></i> Login</a>
							</li>
							<?php
                            */
							}
							?>
							<li class="divider">
							</li>
							<li <?php if($page == "help") { echo 'class="active"'; } ?>>
								<a href="index.php?p=help"><i class="icon-info-sign "></i> Help</a>
							</li>
							<li class="nav-header">
								About US
							</li>
							<!--
							<li>
								<a href="gallery.htm"><i class="icon-picture"></i> Gallery</a>
							</li>!-->
							<li <?php if($page == "support") { echo 'class="active"'; } ?>>
								<a href="index.php?p=support"><i class="icon-question-sign "></i> Support</a>
							</li>
						</ul>
					</div>
				</div>