<fieldset class="bg-white p-2">
	<b class="w-100 border-dark text-right col-md-6 pull-right">
		<input type="date" class="m-0 " id="debut">
		<input type="date" class="m-0 ml-2 " id="fin">
		<a href="#" class=" text-white ml-2 btn btn-success btn-sm" id="show_sortie"><i class="fa fa-tv"></i>&nbsp; AFFICHER</a>
	</b>
</fieldset>
<fielsed class=" bg-white border mt-2">
	<table class="table-bordered table-hover table-strepted w-100" id="dataTable">
		<thead class="bg-<?= $nav_color ?> text-white">
			<tr>
				<th>DATE</th>
				<th>MACHINE</th>
				<th>OPERATEUR</th>
				<th>TYPE DE DECHET</th>
				<th>MATIER SORTIE</th>
				<th>POIDS</th>
				<th>DECHET RECYCLAGE</th>
			</tr>
		</thead>
	</table>
</fielsed>