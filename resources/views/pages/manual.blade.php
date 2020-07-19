	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>Sector 1</th>
				<th>Sector 2</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<input type="checkbox" name="#toggle1" id="toggle1" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('24') }}>
				</td>
				<td>
					<input type="checkbox" name="toggle2" id="toggle2" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('25') }}>
				</td>
			</tr>
		</tbody>
		<thead class="thead-light">
			<tr>
				<th>Sector 3</th>
				<th>Sector 4</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<input type="checkbox" name="toggle3" id="toggle3" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('26') }}>
				</td>
				<td>
					<input type="checkbox" name="toggle4" id="toggle4" data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-off="Apagado" data-on="Encendido" {{ btnact('27') }}>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="justify-content-right">
		<div class="form-group">
			<div class="btn-group">
			<button type="button" class="btn btn-outline-primary" id="changemode" value="1">Modo automático</button>
			</div>
	</div>
