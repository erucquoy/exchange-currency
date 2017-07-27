<div class="span9">
					<h1>
						Our Prices
					</h1>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									Payment Type
								</th>
								<th>
									Base Value
								</th>
								<th>
									Paypal Value
								</th>
								<th>
									Ratio
								</th>
								<th>
									Percentage
								</th>
								<th>
									Visualization
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
						try
						{
							$bdd = new PDO('mysql:host='.$db_address.';dbname='.$db_base.'', $db_user, $db_password);
						}
						catch (Exception $e)
						{
							die('Erreur : ' . $e->getMessage());
						}
						
						$reponse = $bdd->query('SELECT * FROM pricing ORDER BY id');
						
						while ($donnees = $reponse->fetch())
						{
						$prc = $donnees['ratio']*100;
						$paypalvalue = $donnees['ratio']*$donnees['basevalue'];
						?>
							<tr>
								<td>
									<?php echo $donnees['type']; ?>
								</td>
								<td>
									<?php echo $donnees['basevalue']; ?> Euro
								</td>
								<td>
									<?php echo $paypalvalue; ?> Euro
								</td>
								<td>
									<span class="badge"><?php $temp547 = $paypalvalue/$donnees['basevalue']; echo $temp547 . '&euro; PP / 1&euro; '.$donnees['abr'] ; ?></span>
								</td>
								<td>
									<span class="badge"><?php echo $prc ?>%</span>
								</td>
								<td>
									<div class="progress">
										<div class="bar" style="width: <?php echo $prc ?>%;"></div>
									</div>
								</td>
							</tr>
							
							
		
						<?php
						}

						$reponse->closeCursor();

						?>

						</tbody>
					</table>
					
					For SMS and Audiotel, contact us. -> <a href="mailto:contact@exchange-currency.pw">contact@exchange-currency.pw</a><br /><br /><br />
					<!--
					<a class="toggle-link" href="#new-project"><i class="icon-plus"></i> New Project</a>
					<form id="new-project" class="form-horizontal hidden">
						<fieldset>
							<legend>New Project</legend>
							<div class="control-group">
								<label class="control-label" for="input01">Project Name</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="select01">Client</label>
								<div class="controls">
									<select id="select01"> <option>-- Select client --</option> <option>Bad Robot</option> <option>Evil Genius</option> <option>Monsters Inc</option> </select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="textarea">Project Summary</label>
								<div class="controls">
									<textarea class="input-xlarge" id="textarea" rows="3"></textarea>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Create</button> <button class="btn">Cancel</button>
							</div>
						</fieldset>
					</form>
					!-->
				</div>