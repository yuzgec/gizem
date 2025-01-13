<script src="/backend/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

        CKEDITOR.replace( 'aciklama{{$localeCode}}', {
        allowedContent: true,
        filebrowserUploadUrl: "{{ route('page.postUpload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        height : 300
        });

        CKEDITOR.replace( 'short{{$localeCode}}', {
        allowedContent: true,
        filebrowserUploadUrl: "{{ route('page.postUpload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        height : 300
        });

    @endforeach
</script>
