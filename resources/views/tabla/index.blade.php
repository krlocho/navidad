<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tablas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href='{{ url("tablas/create") }}'>
                    <input
                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 mb-3 px-4 rounded "
                    type="submit" name="Crear" id="crear" value="Crear">
                    </a>

                    <a href='{{ url("tablas/pdf") }}'>
                        <input
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 mb-3 px-4 rounded "
                        type="submit" name="Pdf" id="pdf" value="PDF">
                        </a>

                    <table id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Tamaño</th>
                                <th>Volumen</th>
                                <th>Numero de quillas</th>
                                <th> Categoria</th>
                                <th>Antiguedad </th>
                                <th>Foto</th>
                                <th></th>
                                <th></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tablas as $tabla)
                                <tr data-id="{{ $tabla->id }}">
                                    <td>{{ $tabla->id }}</td>
                                    <td>{{ $tabla->marca }}</td>
                                    <td>{{ $tabla->modelo }}</td>
                                    <td>{{ $tabla->tamaño }}</td>
                                    <td>{{ $tabla->volumen }}</td>
                                    <td>{{ $tabla->num_quillas }}</td>
                                    <td>{{ $tabla->categoria->tipo}}</td>

                                    <td>{{ $tabla->edad()}} años</td>


                                    <td><img src="{{asset('storage').'/'.$tabla->foto}}" alt="" width="100" ></td>


                                    <td><img class='btn_borrar' width="32px"
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Delete-button.svg/1725px-Delete-button.svg.png"></td>
                                    <td><a href='{{ url("tablas/$tabla->id/edit") }}'><img class='btn_editar'
                                                width="32px"
                                                src="https://image.flaticon.com/icons/png/512/84/84380.png"></a>
                                    </td>
                                    <td><a href='{{url("tablas/qr")}}/{{$tabla->id}}'><img class='btn_qr' width="25px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/QR_icon.svg/1024px-QR_icon.svg.png"></a></td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $("#tabla").DataTable({
                                language: {
                                    url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                                },
                            });

                            $(".btn_borrar").click(function() {
                                const $tr = $(this).closest("tr");
                                const id = $tr.data("id");




                                Swal.fire({
                                    title: '¿Estás seguro que quieres borrar este centro?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Borrar',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.isConfirmed) { //se pulsó el botón de confirmado
                                        $.ajax({
                                            method: "POST",
                                            url: "{{ url('/tablas') }}/" + id,
                                            data: {
                                                _method: 'DELETE',
                                                _token: "{{ csrf_token() }}",
                                            },
                                            success: function() {
                                                $tr.fadeOut()
                                            }
                                        })
                                    }
                                })
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
