<?php
// footer.php
?>
</main>
<!-- jQuery + Bootstrap JS (CDN) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS: konfirmasi hapus + preview image -->
<script>
// konfirmasi hapus (delegation)
$(document).on('click', '.btn-delete', function(e){
    e.preventDefault();
    if(confirm('Yakin mau hapus produk ini? Data dan gambarnya akan terhapus permanen.')) {
        // kirim form delete yang tersembunyi
        $(this).closest('form').submit();
    }
});

// preview image ketika upload pada form (input file dengan id #image)
$(document).on('change', '#image', function(){
    const file = this.files[0];
    if (!file) return;
    // simple size check (2MB)
    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran file terlalu besar (max 2MB).');
        $(this).val('');
        return;
    }
    const reader = new FileReader();
    reader.onload = function(e) {
        $('#preview').attr('src', e.target.result).show();
    }
    reader.readAsDataURL(file);
});
</script>

</body>
</html>
