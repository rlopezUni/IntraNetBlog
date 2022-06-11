<x-guest-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl max-l-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-xl sm:rounded-lg">

                <!--aqui empieza el desmais -->

                <div class="col-md-12">

                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3>NPS Docentes</h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('nps.store') }}" aria-label="{{ __('docente') }}" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>¿Recomendarias a un familiar o conocido la universidad Univer?
Contesta del 1 al 10,
Donde 1 es lo más bajo, es decir no recomendarías a Univer
10 es lo más alto, totalmente recomendaría a Univer.</h4>
                                        </center>
                                    </div>
                                    
                                   

                                    <div class="col-md-4">
                                        <label for="correo">correo Institucional</label>
                                        <input id="correo" type="email" placeholder="Correo" class="form-control" name="correo"  required autofocus>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="respuesta">Respuesta</label>
                                        <select  id="respuesta" name="respuesta" class="form-control selectpicker "data-live-search="true">
                                             <option value="">Seleciona una respuesta</option>
                                            @for($i = 1; $i<=10; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>

                                     <div hidden class="col-md-12" id="otraPregunta1Div">  
                                        <label for="otraPregunta1">¿Que es lo que no te gusta de Univer?</label>
                                        <input id="otraPregunta1" type="text"  class="form-control" name="otraPregunta1" required>
                                    </div>
                                    <div hidden class="col-md-12" id="otraPregunta2Div">  
                                        <label for="otraPregunta2">¿Que podemos hacer para que tengas una mejor experiencia en Univer?</label>
                                        <input id="otraPregunta2" type="text"  class="form-control" name="otraPregunta2" required>
                                    </div>
                                    <div hidden class="col-md-12" id="otraPregunta3Div">  
                                        <label for="otraPregunta3">¿Que es lo que más te gusta de trabajar en Univer?</label>
                                        <input id="otraPregunta3" type="text"  class="form-control" name="otraPregunta3" required>
                                    </div>
                                    
                                </div>

                            </div>


                            <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-success">
                                            <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
                                        </button>
                                        
                                    </center>
                                </div>
                            </div>
                        </form>
                        <!-- formulario -->
                    </div>
                </div>



                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

                <!-- Latest compiled and minified JavaScript -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

                <!-- (Optional) Latest compiled and minified JavaScript translation files -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
                
                <script defer src="{{asset('js/nps/nps.js')}}"></script>
                <!--aqui termina -->


            </div>
        </div>
    </div>
</x-app-layout>