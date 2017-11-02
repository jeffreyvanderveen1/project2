<?php

	$activeonce = 0;

    foreach ($_POST as $key => $value)  
    {  
		if(empty($value))
		{
			if(!$activeonce) 
			{
				echo "<div id = 'response-negative'>";
				echo "<span style ='padding-top:5px;'>Er is iets fout gegaan, u heeft de volgende velden niet goed ingevuld:<br/><br/></span>";
				$activeonce = 1;
				
				?>
				<script>
				//check_forms();
				</script>
				<?php
			}
			echo "<span style = 'padding-left:5px;'>$key<br/></span>";
		}
    } 
	
	if($activeonce) 
	{
		echo "</div>";
	}
	else
	{
		?>
		
		<div id = "response-success">
		jajajajajajaja jaj aja j aja ja ja j
		</div>
		
		<?php
	}
	
 
?>
