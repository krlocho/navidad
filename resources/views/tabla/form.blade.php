@csrf

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-none">

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error</strong>
            @foreach ($errors->all() as $error)
            <span class="block sm:inline">
                <li class="list-none">{{ $error }}</li>.
            </span>
            @endforeach
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    </ul>
</div>
@endif
<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="marca">
            Marca
        </label>
    </div>
    <div>
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="marca" type="text" name="marca" value='{{ isset($tabla->marca) ? $tabla->marca : '' }}'>
    </div>
</div>


<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="modelo">
            Modelo
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="modelo" type="text" name="modelo" value='{{ isset($tabla->modelo) ? $tabla->modelo : '' }}'>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="tamaño">
            Tamaño
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="tamaño" type="text" name="tamaño" value='{{ isset($tabla->tamaño) ? $tabla->tamaño : '' }}'>
    </div>
</div>


<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="volumen">
            Volumen
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="volumen" type="text" name="volumen" value='{{ isset($tabla->volumen) ? $tabla->volumen : '' }}'>
    </div>
</div>


<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="num_quillas">
            Numero de quillas
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="num_quillas" type="text" name="num_quillas" value='{{ isset($tabla->num_quillas) ? $tabla->num_quillas : '' }}'>
    </div>
</div>

<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="f_creacion">
            Fecha de creacion
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="f_creacion" type="text" name="f_creacion" value='{{ isset($tabla->f_creacion) ? $tabla->f_creacion : '' }}'>

    </div>
</div>

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="categoria_id">
                Categoria
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="categoria_id" type="select" name="categoria_id" value='{{ isset($tabla->categoria_id) ? $tabla->categoria_id : '' }}'>

        </div>

    </div>

    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="foto">
                Foto
            </label>
        </div>



        <div class="md:w-2/3">
            @if (isset($tabla->foto))
            <img src="{{ asset('storage') . '/' . $tabla->foto }}" alt="">
            @endif
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="foto" type="file" name="foto" ">
        </div>
    </div>



    <div class=" md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="Enviar" id="enviar">


            </div>
        </div>
        </form>

        <script>
         $(function() {
            $( "#f_creacion" ).datepicker();
         });
      </script>
            
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">