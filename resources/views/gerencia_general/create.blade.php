<form action="{{ url('/gerencia_general/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Aqui en el include estamos incluyendo el formulario que esta en form.blade.php -->
    @include('gerencia_general.nuevo',['modo'=>'Crear']);

    </form>

    