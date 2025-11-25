import './bootstrap';
if (window.laravelFlash?.success) {
    Swal.fire({
        title: "Berhasil!",
        text: window.laravelFlash.success,
        icon: "success",
        timer: 1800,
        showConfirmButton: false,
    });
}

if (window.laravelFlash?.error) {
    Swal.fire({
        title: "Gagal!",
        text: window.laravelFlash.error,
        icon: "error",
    });
}

window.confirmDelete = function(id) {
    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data yang sudah dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm' + id).submit();
        }
    });
};
