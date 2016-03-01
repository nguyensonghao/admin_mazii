@if (Session::get('result-edit') == -2)
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Lỗi!</strong> trường Comp_Detail hoặc Examples không phải là json.
	</div>
@endif

<form action="{{  Asset('edit-kanji') }}" method="POST">
	<legend>Chỉnh sửa Kanji</legend>

	<div class="form-group">
		<label>Id:</label>
		<input type="number" name="id" class="form-control number"
		 value="{{ $wordDatabase->id }}" readonly>
	</div>

	<div class="form-group">
		<label>Kanji:</label>
		<input type="text" name="kanji" class="form-control" required="required" 
		value="{{ ($wordDatabase->kanji) }}">			
	</div>

	<div class="form-group">
		<label>Mean:</label>
		<input type="text" name="mean" class="form-control" required="required" 
		value="{{ ($wordDatabase->mean) }}">
	</div>

	<div class="form-group">
		<label>Level:</label>
		<input type="number" name="level" class="form-control number"
		 value="{{ $wordDatabase->level }}" readonly>
	</div>

	<div class="form-group">
		<label>On:</label>
		<input type="text" name="on" class="form-control" required="required" 
		value="{{ $wordDatabase->on }}">
	</div>

	<div class="form-group">
		<label>Kun:</label>
		<input type="text" name="kun"class="form-control" 
		value="{{ $wordDatabase->kun }}">
	</div>

	<div class="form-group">
		<label>Img:</label>
		<input type="text" name="img" class="form-control" value="{{ htmlentities($wordDatabase->img) }}"
		readonly>
	</div>

	<div class="form-group">
		<label>Detail:</label>
		<textarea name="detail" class="form-control" rows="10" required="required">
			{{ $wordDatabase->detail }}
		</textarea>
	</div>

	<div class="form-group">
		<label>Short:</label>
		<input type="text" name="short" class="form-control"
		value="{{ $wordDatabase->short }}">
	</div>

	<div class="form-group">
		<label>Freq:</label>
		<input type="number" name="freq" class="form-control number" value="{{ $wordDatabase->freq }}">
	</div>

	<div class="form-group">
		<label>Comp:</label>
		<input type="text" name="comp" class="form-control" required="required" 
		value="{{ $wordDatabase->comp }}">
	</div>

	<div class="form-group">
		<label>Stroke_count:</label>
		<input type="number" name="stroke_count" class="form-control number" 
		value="{{ $wordDatabase->stroke_count }}" readonly>
	</div>

	<div class="form-group">
		<label>Comp_Detail:</label>
		<textarea name="compDetail" class="form-control json" rows="10" required="required">
			{{ $wordDatabase->compDetail }}
		</textarea>
	</div>	

	<div class="form-group">
		<label>Examples:</label>
		<textarea name="examples" class="form-control json" rows="20" required="required">
			{{ $wordDatabase->examples }}
		</textarea>
	</div>	

	<button type="submit" class="btn btn-primary">Thay đổi</button>
	<button type="reset" class="btn btn-default">Làm mới</button>
</form>

<script>
	
	$(document).ready(function () {
		$('textarea').each(function (){
			$(this).val($(this).val().trim());
		})

		$('.json').each(function () {
			var meanJson = $(this).val();
			meanJson = JSON.stringify(JSON.parse(meanJson), undefined, 2);
			$(this).val(meanJson);
		})

	})

</script>