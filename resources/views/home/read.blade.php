
@extends('welcome')

@section('content')
        {{$member}}

<!-- View Data -->
			<table border="0">
				<th colspan="5">Client Table</th>
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Gender</td>
					<td>Phone</td>
					<td>Email</td>
					<td>Address</td>
					<td>Nationality</td>
					<td>Date of birth</td>
					<td>Educational Background</td>
					<td>Prefered mode of Contact</td>
				</tr>

				@foreach($member as $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->gender}}</td>
					<td>{{$value->phone}}</td>
					<td>{{$value->email}}</td>
					<td>{{$value->address}}</td>
					<td>{{$value->nationality}}</td>
					<td>{{$value->birth}}</td>
					<td>{{$value->education}}</td>
					<td>{{$value->modeofcontact}}</td>
				</tr>
				@endforeach
			</table>


            			
@endsection