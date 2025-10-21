<x-layout>
    <div class="container">
        <h1 class="mb-4">Agreagar producto</h1>

        <form class="row g-3 needs-validation" novalidate>
            <div class="col-sm-8 col-md-4" >
                <label for="validationCustom01" class="form-label">nombre</label>
                <input type="text" class="form-control" id="validationCustom01" value="" required name="name"
                    maxlength="40">
                <div class="invalid-feedback">
                    Este campo debe tener maximo 40 caracteres
                </div>
                 <div class="col-sm-4 col-md-5 col-lg-5">
                    <label for="validationCustomUsername" class="form-label">precio</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">$</span>
                        <input type="number" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required min="1" max="9999999" step="0.01">
                        <div class="invalid-feedback">
                            Este campo es sumamente requerido y debe estar en 1 y 9999999
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <label for="validationCustom02" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="validationCustom02" required maxlength="100"
                    rows="3">
                </textarea>
                <div class="invalid-feedback">
                    Este campo debe tener maximo 100 caracteres
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