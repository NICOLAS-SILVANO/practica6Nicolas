<x-layout>
    <div class="container">
        <h1 class="mb-4">Agreagar producto</h1>

        <form class="row g-3 needs-validation" novalidate
         method= "POST" action="{{ url('/products') }}">
          @csrf
        <input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
            <div class="col-sm-8 col-md-4" >
                <label for="validationCustom01" class="form-label">nombre</label>
                <input type="text" class="form-control {{ $errors->has('name')? 'is-invalid' : '' }}" id="validationCustom01" required name="name"
                    maxlength="50" value="{{ old('name' , $product->name ?? '') }}">
                <div class="invalid-feedback">
                     {{ $errors->has('name')? $errors->first('name') : 'campo requerido maximo de 40 caracteres'}}
                    Este campo debe tener maximo 40 caracteres
                </div>
                 <div class="col-sm-4 col-md-5 col-lg-5" novalidate
                      method= "POST" action="{{ url('/products') }}">
                      @csrf
                    <label for="validationCustomUsername" class="form-label">precio</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">$</span>
                        <input type="number" class="form-control" id="validationCustomUsername"
                        value="{{ old('price' , $product->price ?? '') }}" name="price"
                            aria-describedby="inputGroupPrepend" required min="1" max="9999999" step="0.01">
                        <div class="invalid-feedback">
                             {{ $errors->has('price')? $errors->first('price') : 'entre uno al 999999'}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <label for="validationCustom02" class="form-label">Descripcion</label>
                <textarea class="form-control" name="description" id="validationCustom02" required maxlength="100"
                    rows="3">{{ old('description' , $product->description ?? '') }}</textarea>
                </textarea>
                <div class="invalid-feedback">
                     {{ $errors->has('description')? $errors->first('description') : 'campo requerido maximo de 100 caracteres'}}

                </div>

             </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div>

    @section('js')
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
    @endsection



</x-layout>