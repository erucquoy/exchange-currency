<div class="span9">
					
					
					<h1>
						Recent Activity
					</h1>
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
						try
						{
							$bdd = new PDO('mysql:host='.$db_address.';dbname='.$db_base.'', $db_user, $db_password);
						}
	
						catch (Exception $e)
						{
							die('Erreur : ' . $e->getMessage());
						}
						$n = 1;
						if(isset($_GET['n']) && !empty($_GET['n']))
						{
							$n = intval($_GET['n']);
							$limit = $n*25;
							$dlimit = (($n*25)-25);
						}
						else
						{
							$dlimit = 0;
							$limit = 25;
						}
						
						$query = $bdd->prepare("SELECT * FROM activity ORDER BY date DESC LIMIT $dlimit,$limit");
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
							<!--<a href="index.php?p=activity">More &rarr;</a>!-->
						</li>
					</ul>
				</div>