<x-layouts.app :title="__('Dashboard')">
  <div class="container mx-auto mb-4">
    <h1 class="text-2xl font-bold mb-4">Lista de usuarios registrados</h1>
    <a href="{{route('crear_usuario')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo registro</a>
  </div>
  

<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  #
              </th>
              <th scope="col" class="px-6 py-3">
                  Nombre
              </th>
              <th scope="col" class="px-6 py-3">
                  Correo electrónico
              </th>
              <th scope="col" class="px-6 py-3">
                  Password
              </th>
              <th scope="col" class="px-6 py-3">
                  Acciones
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($usuarios as $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$item->id}}
              </th>
              <td class="px-6 py-4">
                {{$item->name}}
              </td>
              <td class="px-6 py-4">
                {{$item->email}}
              </td>
              <td class="px-6 py-4">
                {{$item->password}}
              </td>
              <td class="px-6 py-4">
                 <a href="{{route('actualizar_usuario',$item->id)}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">actualizar</a>
              </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>

</x-layouts.app>