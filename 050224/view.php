File: resources/views/components/head/tinymce-config.blade.php

<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>

File: resources/views/components/forms/tinymce-editor.blade.php

<form method="post">
  <textarea id="myeditorinstance">Hello, World!</textarea>
</form>