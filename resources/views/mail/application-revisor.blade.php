<x-layouts.app>
   
    <div class="container"> 

        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <h1 class="display-3 fw-bold">
                    Vuoi diventare Revisore?
                </h1>
            </div>
            <div class="col-12 text-center py-5">
                Entra a far parte del Team ReVibe e guadagna revisionando gli annunci degli utenti!
            </div>
         
            <div class="col-12 text-center py-5">
                Manda qui la tua candidatura!
                <form action="{{ route('become.revisor') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Diventa Revisore</button>     
                </form>
            </div>
        </div>
                
    </div>


</x-layouts.app>