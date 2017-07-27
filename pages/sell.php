
				<div class="span9">
					<h1>
						Sell your card !
					</h1>
						<?php
							$_SESSION['captcha'] = generateString(6);
							if(isset($_GET['err']))
							{
							
								echo '<span style="color:red">Error, please verify your datas</span>';
							
							}
							?>
						<?php 
						if($connected)
						{
						?>
							<form id="edit-profile" class="form-horizontal" action="index.php?p=sold" method="post">
							<fieldset>
							<legend>Payments are made within 24 hours</legend>
							
								
								<div class="control-group">
									<label class="control-label" for="email">Code paysafecard/ukash</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="email" name="email" placeholder="With or without spaces" />
									</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="optionsCheckbox">Can see your name in public history ?</label>
								<div class="controls">
									<input type="checkbox" id="optionsCheckbox" name="hidden" checked="checked" />
								</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="type">Card type</label>
								<div class="controls">
									<select name="type">
										<option value="paysafecard">Paysafecard</option>
										<option value="ukash">Ukash</option>
									</select>
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="value">Value</label>
								<div class="controls">
									<select name="value">
										<option value="5">5 EUR</option>
										<option value="10">10 EUR</option>
										<option value="25">25 EUR</option>
										<option value="50">50 EUR</option>
										<option value="100">100 EUR</option>
									</select>
								</div>
								</div>
								<div class="control-group">
                                <div class="controls">
                                <?php
                                    require_once('inc/recaptchalib.php');
                                    $publickey = "6Lfs7vcSAAAAAAyi9vk_1hJAXXNBIjKKpbJr0fiX"; // you got this from the signup page
                                    echo recaptcha_get_html($publickey);
                                ?>
                                </div>
                                </div>
								
								<div class="form-actions">
									<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Sell my card</button> <!--<button class="btn">Cancel</button>!-->
								</div>
								
							</fieldset>
							</form>						
						
						<?php
						}
						else
						{
						?>
						
							<form id="edit-profile" class="form-horizontal" action="index.php?p=sold" method="post">
							<fieldset>
							<legend>Payments are made within 24 hours</legend>
								<div class="control-group">
									<label class="control-label" for="email">Contact email</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="email" name="email" placeholder="john.smith@example.org" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="email">Paypal email</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="paypalemail" name="paypalemail" placeholder="john.smith@example.org" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="email">Code paysafecard/ukash</label>
									<div class="controls">
										<input type="text" class="input-xlarge" id="card" name="card" placeholder="With or without spaces" />
									</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="optionsCheckbox">Can see your name in public history ?</label>
								<div class="controls">
									<input type="checkbox" id="optionsCheckbox" name="hidden" checked="checked" />
								</div>
								</div>
							
								<div class="control-group">
								<label class="control-label" for="type">Card type</label>
								<div class="controls">
									<select name="type" id="type">
										<option value="paysafecard">Paysafecard</option>
										<option value="ukash">Ukash</option>
									</select>
								</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="value">Value</label>
								<div class="controls">
									<select name="value" id="value">
										<option value="5">5 EUR</option>
										<option value="10">10 EUR</option>
										<option value="25">25 EUR</option>
										<option value="50">50 EUR</option>
										<option value="100">100 EUR</option>
									</select>
								</div>
								</div>
								<br />
                                <div class="control-group">
                                <div class="controls">
                                <?php
                                    require_once('inc/recaptchalib.php');
                                    $publickey = "6Lfs7vcSAAAAAAyi9vk_1hJAXXNBIjKKpbJr0fiX"; // you got this from the signup page
                                    echo recaptcha_get_html($publickey);
                                ?>
                                </div>
                                </div>
								
								<div class="form-actions">
									<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Sell my card</button> <!--<button class="btn">Cancel</button>!-->
								</div>
								
							</fieldset>
							</form>
						
						
						
						<?php
						}
						?>
					
				</div>
			