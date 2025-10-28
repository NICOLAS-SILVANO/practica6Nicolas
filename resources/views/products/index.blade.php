<x-layout>

    <?php
       // $products = [
          //  ['id' => 1, 'name' => 'Coca600ml', 'description' => 'Coca cola de 600 grs', 'price' => 18.00]
        //    , ['id' => 2, 'name' => 'Pepsi600ml', 'description' => 'Pepsi de 600 grs', 'price' => 17.00]
          //  , ['id' => 3, 'name' => 'Manzanita600ml', 'description' => 'Manzanita de 600 grs', 'price' => 16.00]
          //  , ['id' => 4, 'name' => 'Fanta600ml', 'description' => 'Fanta de 600 grs', 'price' => 15.00]
           // , ['id' => 5, 'name' => 'Sprite600ml', 'description' => 'Sprite de 600 grs', 'price' => 14.00]
        //    , ['id' => 6, 'name' => 'Coca2L', 'description' => 'Coca cola de 2 litros', 'price' => 35.00]
         //   , ['id' => 7, 'name' => 'Pepsi2L', 'description' => 'Pepsi de 2 litros', 'price' => 34.00]
         //   , ['id' => 8, 'name' => 'Manzanita2L', 'description' => 'Manzanita de 2 litros', 'price' => 33.00]
         //   , ['id' => 9, 'name' => 'Fanta2L', 'description' => 'Fanta de 2 litros', 'price' => 32.00]
           // , ['id' => 10, 'name' => 'Sprite2L', 'description' => 'Sprite de 2 litros', 'price' => 31.00]
       // ];
    ?>
    <div class="container">
        <div class="row my-4 mx-1">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Productos</h1>
                <button class="btn btn-primary btn-sm" onclick="execute('/productos/agregar')">
                    <i class="bi bi-plus"></i>
                    <span class="d-none d-sm-inline">Agregar</span>
                </button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th class="text-end text-nowrap w-auto">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['description'] }}</td>
                                <td>${{ number_format($product['price'], 2) }}</td>
                                <td class="text-end text-nowrap w-auto">
                                    <button class="btn btn-primary btn-sm" onclick="execute('/products/{{ $product['id'] }}/edit')">
                                        <i class="bi bi-pencil"></i>
                                            <span class="d-none d-sm-inline">Edit</span>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteRecord('/products/{{ $product['id'] }}/delete')">
                                        <i class="bi bi-trash"></i>
                                        <span class="d-none d-sm-inline">Delete</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section('js')
    <script>
      new DataTable('#myTable');
      function execute(url) {
          window.location.href = url;

      }
      @if (session('success'))
      alert( '{{ session('success')}}');
      @endif
    </script>
  @endsection

</x-layout>