<div class="card" style="margin: 30px;">	
	<table class="table table-bordered table-head-bg-info table-bordered-bd-info 
	" style="width: 100%">
	<thead>
		<tr>
			<th class="title">Tiêu đề</th>
			<th class="content">Nội dung</th>
			<th class="file">File đính kèm</th>
			<th class="file">Sửa</th>
			<th class="file">Xóa</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $value)
		<tr>
			<td class="title">{{ $value->title }}</td>
			<td class="content">{!! $value->content !!}</td>
			<td class="file"><a href='{{ asset("$value->filePath") }} '><?php echo $value->fileName ?></a>
			</td>
			<td><a href="edit-notifications/{{$value->id}}">Sửa</a></td>
			<td><a href="delete-notifications/{{$value->id}}">Xóa</a></td>
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