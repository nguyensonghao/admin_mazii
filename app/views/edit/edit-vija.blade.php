@if (Session::get('result-edit') == -2)
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Lỗi!</strong> trường mean không phải là json.
	</div>
@endif

<form action="{{  Asset('edit-vija') }}" method="POST" id="formVija">
	<legend>Chỉnh sửa Vija</legend>

	<div class="form-group">
		<label>Id:</label>
		<input type="number" name="id" class="form-control number" 
		value="{{ $wordDatabase->id }}" readonly>
	</div>

	<div class="form-group">
		<label>Word:</label>
		<textarea name="word" class="form-control not-json" rows="3" required="required">
			{{ ($wordDatabase->word) }}
		</textarea>
	</div>

	<div class="form-group">
		<label>Mean:</label>
		<textarea name="mean" class="form-control not-json" rows="10" required="required">
			{{ $wordDatabase->mean }} 
		</textarea>
	</div>

	
	<button type="submit" class="btn btn-primary">Thay đổi</button>
	<button type="reset" class="btn btn-default">Làm mới</button>
</form>

<script>
	$(document).ready(function () {
		$('.not-json').each(function (){
			$(this).val($(this).val().trim());
		})

		var meanJson = $('textarea[name="mean"]').val();
		meanJson = JSON.stringify(JSON.parse(meanJson), undefined, 2);
		$('textarea[name="mean"]').val(meanJson);

	})
</script>