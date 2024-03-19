<form action="{{ url('/gerencia_general/'.$gerencias->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('gerencia_general.nuevo',['modo'=>'Editar']);

    </form>
