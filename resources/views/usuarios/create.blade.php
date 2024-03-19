<form action="{{ url('usuarios/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Aqui en el include estamos incluyendo el formulario que esta en form.blade.php -->
    @include('usuarios.nuevo', ['modo'=>'Crear']);
</form>