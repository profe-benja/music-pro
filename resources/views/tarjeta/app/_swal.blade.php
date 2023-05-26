<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
  Swal.fire({
    icon: 'success',
    // title: 'Correo enviado',
    text: "{{ session('success') }}",
  })
</script>
@endif
@if (session('danger'))
<script>
  Swal.fire({
    icon: 'error',
    // title: 'Correo no existe',
    text: "{{ session('danger') }}",
  })
</script>
@endif
@if (session('info'))
<script>
  Swal.fire({
    icon: 'info',
    // title: 'Correo no existe',
    text: "{{ session('info') }}",
  })
</script>
@endif
@if (session('warning'))
<script>
  Swal.fire({
    icon: 'warning',
    // title: 'Correo enviado',
    text: "{{ session('warning') }}",
  })
</script>
@endif
