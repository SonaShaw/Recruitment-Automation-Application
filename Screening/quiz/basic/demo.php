<div class = "panel-body">
					
					
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="1"/>&nbsp &nbsp <font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font><br/>
					<?php } ?>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="2"/>&nbsp &nbsp <font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font><br/>
					<?php } ?>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="3"/>&nbsp &nbsp <font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font><br/>
					<?php } ?>
					<?php if(isset($q["answer1"])){ ?>
					<input type="radio" name="<?php echo $q["qid"] ?>" value="4"/>&nbsp &nbsp <font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font>
					<?php } ?>
					<input type="radio" checked = "checked" style = "visibility:hidden" name="<?php echo $q["qid"] ?>" value="0"/>
				</div>
				
				<?php  

					$i++;
				}  ?> 
				
				
				
				
				
				
	<!----table form---->
	
	<div class = "panel-body">
					<table>
					<col width="40">
					<col width="960">
						
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="1"/>
							</td>
							<td>
								<strong><font face = "Times New Roman" size = "3"> <?php echo nl2br($q["answer1"]); ?></font></strong>
							</td>
						</tr>
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="2"/>
							</td >
							<td>
								<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer2"]); ?></font></strong>
							</td>
						</tr>
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="3"/>
							</td>
							<td>
								<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer3"]); ?></font></strong>
							</td>
						</tr>						
						<tr valign = "top">
							<td>
								<input type="radio" name="<?php echo $q["qid"] ?>" value="4"/>
							</td>
							<td>
								<strong><font face = "Times New Roman" size = "3"><?php echo nl2br($q["answer4"]); ?></font></strong>
								<input type="radio" checked = "checked" style = "visibility:hidden" name="<?php echo $q["qid"] ?>" value="0"/>
							</td>
						</tr>
						
					
					</table>
					
				</div>
				
				<?php  

					$i++;
				}  ?>