{{-- <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script> --}}


<!-- TinyMCE -->
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: '#content',
        directionality: 'rtl',
        height: 500,
        plugins: 'lists link image table code fullscreen',
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image table | code fullscreen',
        menubar: false,
        automatic_uploads: true,
        images_upload_handler: function(blobInfo, success, failure) {
            let formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            formData.append('_token', '{{ csrf_token() }}');
            fetch('{{ route('tinymce.upload') }}', {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                if (data.location) {
                    success(data.location);
                } else {
                    failure('Upload failed');
                }
            }).catch(err => failure('Upload error: ' + err.message));
        },
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            let input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                let file = this.files[0];
                let formData = new FormData();
                formData.append('file', file);
                formData.append('_token', '{{ csrf_token() }}');
                fetch('{{ route('tinymce.upload') }}', {
                    method: 'POST',
                    body: formData
                }).then(res => res.json()).then(data => cb(data.location, {
                    title: file.name
                })).catch(err => alert('Upload failed: ' + err.message));
            };
            input.click();
        }
    });
</script>
