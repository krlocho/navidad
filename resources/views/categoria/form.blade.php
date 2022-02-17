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
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </ul>
    </div>
@endif
<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="tipo">
            Tipo
        </label>
    </div>
    <div>
        <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
            id="tipo" type="text" name="tipo" value='{{ isset($categoria->tipo) ? $categoria->tipo : '' }}'>
    </div>
</div>


<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="descripcion">
            Descripcion
        </label>
    </div>
    <div class="md:w-2/3">
        <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
            id="descripcion" type="text" name="descripcion" value='{{ isset($categoria->descripcion) ? $categoria->descripcion : '' }}'>
    </div>
</div>


    <div class=" md:flex md:items-center">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
            <input
                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit" name="Enviar" id="enviar">


        </div>
    </div>
    </form>
