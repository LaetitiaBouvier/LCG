<?php
if(isset($_SESSION["ID_Utilisateur"]))
	{$IDU = $_SESSION["ID_Utilisateur"];} ?>

<link rel="stylesheet" href="notation.css" />

<form name="notation" action="notation.php">
	 Note de l'évènement : <?php include ("note_moyenne.php");  ?> 

	<h4>Noter l'évènement :</h4>

	<ul class="notes-echelle">
		<li>
			<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
			<input type="radio" name="notesA" id="note01" value="1" />
		</li>
		<li>
			<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
			<input type="radio" name="notesA" id="note02" value="2" />
		</li>
		<li>
			<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
			<input type="radio" name="notesA" id="note03" value="3" />
		</li>
		<li>
			<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
			<input type="radio" name="notesA" id="note04" value="4" />
		</li>
		<li>
			<label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
			<input type="radio" name="notesA" id="note05" value="5" />
		</li>
	</ul>
	<input type="submit" name="Noter" value="Noter/re-Noter Event.<?php echo(''.$ID.'');?>"/>
</form>
