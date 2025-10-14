

{{-- 
<div class="col-12 mb-3">
                    <label for="content" class="form-label">المحتوى</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div> --}}


                <div class="col-12 mb-3">
    <label for="content" class="form-label">المحتوى</label>
    <textarea name="content" id="content" class="form-control">{{ old('content', $content ?? '') }}</textarea>
    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
</div>
