@extends('layout.app')
@section('contents')
<div class = 'container'>
	<div class = 'row align-item-start'>
		<h2>キャラクターリスト</h2>
	</div>
	<div class = 'row justify-content-center'>
		<div class = 'col-md-10'>
			<div class ='create'>
				<button type = 'button' name = 'create'>
			</div>
			<div class = 'list'>
				<table class = 'list table-bordered'>
					@foreach()
						<tr>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>



@endsection
