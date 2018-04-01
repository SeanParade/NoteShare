<h3 class="center">Upload a Markdown File</h3>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="file-field input-field">
        <div class="btn center">
            <span>File</span>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate"  type="text">
        </div>
    </div>
    <button class="btn center" type="submit">Submit</button>
</form>
<?
