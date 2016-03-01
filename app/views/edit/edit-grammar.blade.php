@if (Session::get('result-edit') == -2)
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Lỗi!</strong> trường detail không phải là json
	</div>
@endif

<form action="{{  Asset('edit-grammar') }}" method="POST">
	<legend>Chỉnh sửa ngữ pháp</legend>

	<div class="form-group">
		<label>Id:</label>
		<input type="number" name="id" class="form-control number" 
		value="{{ $wordDatabase[0]->id }}" readonly>
	</div>

	<div class="form-group">
		<label>Struct:</label>
		<textarea name="struct" class="form-control not-json" rows="3" required="required" value="">
			{{ ($wordDatabase[0]->struct) }}
		</textarea>
	</div>

	<div class="form-group">
		<label>Detail:</label>
		<textarea name="detail" class="form-control" rows="12" required="required">
			{{ $wordDatabase[0]->detail }}
		</textarea>
	</div>

	<div class="form-group">
		<label>Level:</label>
		<input type="number" name="level" class="form-control number" 
		value="{{ $wordDatabase[0]->level }}" readonly>
	</div>	

	<div class="form-group">
		<label>Struct_vi:</label>
		<textarea name="struct_vi" class="form-control not-json" rows="3" required="required">
			{{ $wordDatabase[0]->struct_vi }}
		</textarea>
	</div>	

	<button type="submit" class="btn btn-primary">Thay đổi</button>
	<button type="reset" class="btn btn-default btn-refesh">Làm mới</button>
</form>

<script>
	$(document).ready(function () {
		$('.not-json').each(function (){
			$(this).val($(this).val().trim());
		})

		var meanJson = $('textarea[name="detail"]').val();
		meanJson = JSON.stringify(JSON.parse(meanJson), undefined, 2);
		$('textarea[name="detail"]').val(meanJson);
	})
</script>