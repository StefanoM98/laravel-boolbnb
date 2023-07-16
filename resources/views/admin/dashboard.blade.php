@extends('layouts.admin')

@section('content')
    @if (Auth::user()->name)
        <h1 class="p-3">Welcome <span class="p_color">{{ Auth::user()->name }}</span></h1>
    @else
        <h1 class="p-3">Welcome <span class="p_color">User</span></h1>
    @endif
    <div class="p-3">
        <h2>Benvenuto nella tua <span class="p_color">area amministratore!</span></h2>
        <p>
            Qui puoi gestire i tuoi appartamenti, sponsorizzarli e gestire i messaggi degli utenti interessati. Ecco cosa
            puoi fare:
        </p>

        <h3 class="p_color">Gestione degli appartamenti:</h3>
        <ul>
            <li>
                Visualizza una lista completa dei tuoi appartamenti presenti sul sito.</li>
            <li>
                Accedi ai dettagli di ciascun appartamento per visualizzare informazioni come descrizione, foto, servizi e
                prezzo.</li>
            <li>
                Modifica i dettagli di ogni singolo appartamento, incluso l'aggiornamento delle informazioni e delle
                immagini.
            </li>
            <li>
                Se necessario, puoi anche eliminare un appartamento.
            </li>
        </ul>

        <h3 class="p_color">Sponsorizzazione degli appartamenti:</h3>
        <ul>
            <li>
                Promuovi i tuoi appartamenti per farli apparire nella lista "Appartamenti in evidenza".
            </li>
            <li>
                Seleziona la durata della sponsorizzazione desiderata e procedi al pagamento tramite carta di credito.
            </li>
            <li>
                Una volta sponsorizzato, il tuo appartamento otterrà maggiore visibilità e potrà raggiungere un pubblico più ampio.
            </li>
        </ul>

        <h3 class="p_color">Gestione dei messaggi:</h3>
        <ul>
            <li>
                Ricevi notifiche degli utenti interessati che ti inviano messaggi.
            </li>
            <li>
                Accedi alla lista dei messaggi ricevuti e visualizzali uno per uno.
            </li>
            <li>
                Rispondi ai messaggi direttamente tramite e-mail per fornire ulteriori informazioni o accordarti sugli affitti.
            </li>
        </ul>

        <p>
            Siamo qui per aiutarti a gestire facilmente i tuoi appartamenti e mantenere una comunicazione diretta con gli utenti interessati. Buon lavoro nell'amministrazione dei tuoi annunci e nell'interazione con i potenziali affittuari!
        </p>
    </div>
@endsection
<style lang="scss" scoped>
    :root {
        --primary-color: #24ADE3
    }

    .p_color {
        color: var(--primary-color)
    }
    ul li::marker {
        color: var(--primary-color)
    }

    .ms_color {
        color: var(--primary-color)
    }
</style>
