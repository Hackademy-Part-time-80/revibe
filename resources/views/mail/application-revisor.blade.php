<x-layout>
   
    <div class="container"> 

        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <h1 class="display-3 fw-bold">
                    Vuoi diventare Revisore?
                </h1>
        <div class="col-12 text-center py-5">
            Entra a far parte del Team ReVibe e guadagna revisionando gli annunci degli utenti!
        </div>
         <form action="become.revisor" method="POST">
        @csrf
        <div class="col-12 text-center py-5">
            Manda qui la tua candidatura!
            <a href="{{ route('become.revisor') }}" class="btn btn-outline-primary rounded-pill px-4">Diventa Revisore</a>     
        </div>
                
    </div>
    </form>

</x-layout.app>