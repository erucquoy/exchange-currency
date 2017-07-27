
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php">Exchange-Currency</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li class="active">
									<a href="index.php?p=dashboard">Dashboard</a>
								</li>
                                <!--
								<li>
									<a href="index.php?p=account">Account Settings</a>
								</li>!-->
								<!--<li>
									<a href="index.php?p=help">Help</a>
								</li>!-->
								<li class="dropdown">
									<a href="index.php?p=help" class="dropdown-toggle" data-toggle="dropdown">Informations <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li>
											<a href="index.php?p=pricing">Pricing</a>
										</li>
										<li>
											<a href="index.php?p=work">How it's work</a>
										</li>
										<?php
										/*
										<li>
											<a href="help.htm">Task Assignment</a>
										</li>
										<li>
											<a href="help.htm">Access Permissions</a>
										</li>
										<li class="divider">
										</li>
										*/
										?>
										<li class="nav-header">
											Global help
										</li>
										<li>
											<a href="index.php?p=help">Help</a>
										</li>
										<?php
										/*
										<li>
											<a href="help.htm">Using file version</a>
										</li>
										*/ ?>
									</ul>
								</li>
							</ul>
							<form class="navbar-search pull-left" action="">
								<input type="text" class="search-query span2" placeholder="Search don't work now" />
							</form>
							<ul class="nav pull-right">
							<?php
							if($connected)
							{
								?>
								<li>
									<a href="index.php?p=account"><?php echo $pseudo; ?></a>
								</li>
								<li>
									<a href="index.php?p=logout">Logout</a>
								</li>
								<?php
							}
							else
							{
								?>
								<li>
									<a href="index.php?p=register">Register</a>
								</li>
								<li>
									<a href="index.php?p=login">Login</a>
								</li>
								<?php
							}
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>