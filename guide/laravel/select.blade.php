<!-- 
	web.php
	--------------
		Route::get("/select", [MainController::class, "select_page"]);
		
	MainController.php
	--------------
		public function select_page() {
			$content = DB::table("table")->get();
			return view("select", ["content" => $content]);
		}
-->
	
	<table>
		<tr>
			<th>id</th>
			<th>Поле 1</th>
			<th>Поле 2</th>
			<th>Поле 3</th>
		</tr>
		@if(count($content))
			@foreach($content as $value)
				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ $value->field_1 }}</td>
					<td>{{ $value->field_2 }}</td>
					<td>{{ $value->field_3 }}</td>
				</tr>
			@endforeach
		@else
			<tr><td colspan="4">Данные отсутствуют</td></tr>
		@endif

	</table>

