<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
<h1>TinyMCE Quick Start Guide</h1>
  <form method="post">
    <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>
  </form>
</body>

<script src='https://cdn.tiny.cloud/1/p3csjt5oty0rg11v4xhaimflizpd65z3ddm9x4n0wr7oqtst/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</html>