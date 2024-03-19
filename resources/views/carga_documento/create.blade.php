<form  action="{{ url('carga_documento/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Aqui en el include estamos incluyendo el formulario que esta en formulario.blade.php -->
    @include('carga_documento.formulario', ['modo'=>'Crear']);
</form>
