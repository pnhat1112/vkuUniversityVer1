<div class="card" style="margin: 30px;">	
	<table class="table table-bordered table-head-bg-info table-bordered-bd-info 
	" style="width: 100%">
	<thead>
		<tr>
			<th class="nameEvent">Tên sự kiện</th>
			<th class="time">Thời gian</th>
			<th class="file">Sửa</th>
			<th class="file">Xóa</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $value)
		<tr>
			<td>{{ $value->nameEvent }}</td>
			<td>{!! date('d/m/y', strtotime($value->time)) !!}</td>
			<td><a href="edit-event/{{$value->id}}">Sửa</a></td>
			<td><a href="delete-event/{{$value->id}}">Xóa</a></td>
		</tr>
		@endforeach
	</tbody>
</table>

</div>

<style type="text/css">
	table {
		width: 100%;
	}
	th.title {
		width: 30%;
	}
	th.content {
		width: 60%;
	}
	th.file {
		width: 10%;
	}
</style>