<div class="span9">
					<h1>
						Dashboard
					</h1>
					<div class="hero-unit">
						<h1>
							Welcome!
						</h1>
						<p>
							You can sell your PaySafeCard and Ukash Card here for a good price !
						</p>
						<p>
							<a href="index.php?p=pricing" class="btn btn-primary btn-large">Pricing</a> <!-- <a class="btn btn-large">No Thanks</a> !-->
						</p>
					</div>
					<div class="well summary">
					<?php
					try
					{
						$bdd = new PDO('mysql:host='.$db_address.';dbname='.$db_base.'', $db_user, $db_password);
					}
	
					catch (Exception $e)
					{
						die('Erreur : ' . $e->getMessage());
					}
					$query = $bdd->prepare("SELECT ip FROM visitors");
					$query->execute();
					$uniqueVisit = $query->rowCount();
					
					$pscCount = 0;
					$ukaCount = 0;
					$euroCount = 0;
					$query = $bdd->prepare("SELECT * FROM activity WHERE statut = 4");
					$query->execute();
					while($data = $query->fetch())
					{
						if($data['abr'] == "PSC")
						{
							$pscCount++;
						}
						elseif($data['abr'] == "UKA")
						{
							$ukaCount++;
						}
						else
						{
						}
						$euroCount += $data['final_value'];
					}
					?>
						<ul>
							<li>
								<a href="#"><span class="count"><?php echo $uniqueVisit; ?></span> Unique visitors</a>
							</li>
							<li>
								<a href="#"><span class="count"><?php echo $pscCount; ?></span> PSC Exchange</a>
							</li>
							<li>
								<a href="#"><span class="count"><?php echo $ukaCount; ?></span> Ukash Exchange</a>
							</li>
							<li class="last">
								<a href="#"><span class="count"><?php echo $euroCount; ?></span> Total (Eur)</a>
							</li>
						</ul>
					</div>
					<h2>
						Recent Activity
					</h2>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									Payment type
								</th>
								<th>
									Client
								</th>
								<th>
									We have paid
								</th>
								<th>
									Date
								</th>
								<th>
									Statut
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
						
						$query = $bdd->prepare("SELECT * FROM activity ORDER BY date DESC LIMIT 8");
						$query->execute();
						while($data = $query->fetch())
						{
							$name = $data['client_name'];
							if($data['hidden'] == 1)
							{
								
								$name_len = strlen($name) + 3;
								$replacename = str_repeat('*',$name_len-2);
								$name = $name[0] . $name[1] . $replacename;
							}
						
							$tdate = $data['date'];
							$fdate = date('d/m/Y H:i:s',$tdate);
							
							switch($data['statut'])
							{
								case 1:
									$statut = "Checking";
									break;
								case 2:
									$statut = "Accepted";
									break;
								case 3:
									$statut = "Transfer to paypal";
									break;
								case 4:
									$statut = "Completed";
									break;
								default:
									$statut = "Unknown";
									
							}
						
						?>
							<tr>
								<td>
									<?php echo $data['card'] . ' ' . $data['base_value'] . '&euro;'; ?>
								</td>
								<td>
									<?php echo $name; ?>
								</td>
								<td>
									<?php echo $data['final_value']; ?>
								</td>
								<td>
									<?php echo $fdate; ?>
								</td>
								<td>
									<a href="#" class="view-link"><?php echo $statut; ?></a>
								</td>
							</tr>
						
						
						
						
						<?php
						}
						?>
							
						</tbody>
					</table>
					<ul class="pager">
						<li class="next">
							<a href="index.php?p=activity">More &rarr;</a>
						</li>
					</ul>
				</div>