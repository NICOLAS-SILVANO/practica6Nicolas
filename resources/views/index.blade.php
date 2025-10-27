<x-layout>

    <div class ="container mt-4">
        <div class="row">
            <div class="col-3">
                <div class="card border-secondary text-center shadow" onclick="location.href='/productos'" style="cursor: pointer;">
                <img class="rounded-circle d-block mx-auto mt-2" width="80" height="80"
                        src="{{ asset('images/logo.jpg') }}" alt="Logo" />
                    <div class="card-body">
                        <h4 class="card-title">Productos</h4>
                        <p class="card-text">Gestión de productos</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
