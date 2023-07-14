@extends('layouts.app')
@section('content')

<div class="text-center mt-5"><h2>Con Boolbnb Start , mettere casa su BoolBnB è facile</h2></div>
<div class="container-fluid text-center  mt-5 mb-5">
    <img src="../" alt="catt_boolbnb.png">
</div>
<div class="container text-center">
    <div class="row">
        <div class="col-md-4">
            <h5>Ricevi supporto individuale da un Superhost</h5>
            <p>Ti metteremo in contatto con un Superhost della tua zona, che ti guiderà dalla prima domanda al primo ospite tramite telefono, videochiamata o chat.</p>
        </div>
        <div class="col-md-4">
            <h5>Un ospite esperto per la tua prima prenotazione</h5>
            <p>Per la tua prima prenotazione, puoi decidere di accogliere un ospite esperto che vanta almeno tre soggiorni e una serie di recensioni positive su Airbnb.</p>
        </div>
        <div class="col-md-4">
            <h5>Supporto Airbnb specializzato</h5>
            <p>In caso di problemi, ad esempio con l'account o la fatturazione, i nuovi host possono accedere con un solo clic agli agenti del Community support, che sono stati appositamente formati per aiutarti.</p>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center mt-5 ">
    <h3 class=" text-danger">Bool</h3>
    <h3>BnB</h3>
</div>

<div class="container mt-3">
    <h2>Pubblica il tuo annuncio su BoolBnB e aprofitta di una protezione completa</h2>
</div>
<table class="table container ">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">BoolBnB</th>
        <th scope="col">Concorrenti</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <tr>
        <th scope="row"></th>
        <td>
            <h5>Verifica dell'identità dell'ospite</h5>
            <p>Il nostro sistema di verifica completo esamina dettagli quali nome, <br>indirizzo, documento identificativo e altro per confermare<br> l'identità degli ospiti che prenotano su Airbnb.</p>
        </td>
        <td>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#00A506;stroke-width:5.333333333333333;overflow:visible" aria-label="Airbnb inclusa" role="img" focusable="false"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg>
        </td>
        <td>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#00A506;stroke-width:5.333333333333333;overflow:visible" aria-label="Airbnb inclusa" role="img" focusable="false"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg>
        </td>


        <tr>
            <th scope="row"></th>
            <td>
                <h5>Protezione dai danni fino a 3.000.000 USD</h5>
                <p>Airbnb ti rimborsa per i danni causati dagli ospiti al tuo alloggio e ai tuoi effetti personali, <br>e include queste protezioni specifiche:.</p>
            </td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#00A506;stroke-width:5.333333333333333;overflow:visible" aria-label="Airbnb inclusa" role="img" focusable="false"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg>
            </td>
            <td>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#E12C32;stroke-width:5.333333333333333;overflow:visible" aria-label="Concorrenti non inclusi" role="img" focusable="false"><path d="m6 6 20 20M26 6 6 26"></path></svg>
            </td>
        </tr>


        <tr>
            <th scope="row"></th>
            <td>
                <h5>Supporto sicurezza H24</h5>
                <p>Se non ti senti al sicuro, puoi contattare direttamente dall'app<br> i nostri operatori di sicurezza appositamente formati, disponibili sia di giorno che di notte.</p>
            </td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#00A506;stroke-width:5.333333333333333;overflow:visible" aria-label="Airbnb inclusa" role="img" focusable="false"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg>
            </td>
            <td>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#E12C32;stroke-width:5.333333333333333;overflow:visible" aria-label="Concorrenti non inclusi" role="img" focusable="false"><path d="m6 6 20 20M26 6 6 26"></path></svg>
            </td>
        </tr>


        <tr> 
            <th scope="row"></th>
            <td>
                <h5>Assicurazione di responsabilità civile fino a 1.000.000 USD</h5>
                <p>Ti proteggiamo nel raro caso in cui un ospite si faccia male o i suoi<br> effetti personali vengano danneggiati o rubati.</p>
            </td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#00A506;stroke-width:5.333333333333333;overflow:visible" aria-label="Airbnb inclusa" role="img" focusable="false"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg>
            </td>
            <td>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display:block;fill:none;height:24px;width:24px;stroke:#E12C32;stroke-width:5.333333333333333;overflow:visible" aria-label="Concorrenti non inclusi" role="img" focusable="false"><path d="m6 6 20 20M26 6 6 26"></path></svg>
            </td>
        </tr>

    </tbody>
    
  </table>
  <div class="container mt-2">
    <p>Il confronto si basa sulle informazioni disponibili al pubblico e sulle offerte gratuite dei principali concorrenti<br>nel mese di ottobre 2022. Per scoprire dettagli ed eccezioni clicca <a href="#">qui</a>
    </p>
  </div>
  <div class="container text-center">
    <button type="button" class="btn btn-outline-dark btn-transparent m-3">Scopri di più</button>
  </div>
  <div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Le Risposte<br> alle tue domande</h2>
            </div>
            <div class="col-lg-6">
                <div id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <h5 class="mb-0">Il mio alloggio è adatto a BoolBnB? <i class="fa-solid fa-chevron-down"></i></h5>
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse mt-3" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Gli ospiti Airbnb sono interessati a tutti i tipi di alloggi. Abbiamo annunci<br> per minicase, baite, case sull'albero e altro ancora. Anche una stanza<br> in più può essere un'ottima soluzione per un soggiorno.
                            </div>
                        </div>
                    </div>
        
                    <hr class="my-3">
        
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <h5 class="mb-0">La disponibilità del mio alloggio deve essere costante? <i class="fa-solid fa-chevron-down"></i></i></h5>
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse mt-3" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Assolutamente no: hai tu il controllo totale sul tuo calendario. Puoi<br> affittare il tuo spazio una volta all'anno, qualche notte al mese o più<br> spesso.
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-3">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                <h5 class="mb-0">Quanto dovrei interagiere con gli ospiti <i class="fa-solid fa-chevron-down"></i></h5>
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse mt-3" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sei tu a decidere. Alcuni host scelgono di inviare messaggi agli ospiti<br>solo nei momenti importanti, e ricorrono ad esempio a una breve nota al<br>check-in, mentre altri preferiscono incontrare di persona chi accolgono.<br>Troverai certamente uno stile che si adatti sia a te che agli ospiti
                            </div>
                        </div>
                    </div>
                    
                    {{-- altre domande vanno aggiunte dopo questo div --}}
        
                </div>
            </div>
        </div>
        <div class="container bg-white py-4 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="path_to_your_image.jpg" alt="catt_boolbnb.png" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3>Hai altre domande ?</h3>
                    <p>Ricevi le risposte da un SuperHost vicino a te </p>
                    <button type="button" class="btn btn-outline-dark btn-transparent m-3">Trova un SuperHost</button>
                </div>
            </div>
        </div>
        
    
    </div>
    <hr class="my-3 mt-5">
    <footer class="footer bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Assistenza</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="link-black">Centro Assistenza</a></li>
                        <li><a href="#" class="link-black">Air Cover</a></li>
                        <li><a href="#" class="link-black">Accessibilità</a></li>
                        <li><a href="#" class="link-black">Opzioni di cancellazione</a></li>
                        <li><a href="#" class="link-black">Covid-19</a></li>
                        <li><a href="#" class="link-black">Segnala Bug</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Community</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="link-black">BoolBnB.org</a></li>
                        <li><a href="#" class="link-black">Contro la discriminazione</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Ospitare</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="link-black">Apri un BnB</a></li>
                        <li><a href="#" class="link-black">BoolCover</a></li>
                        <li><a href="#" class="link-black">Esplora ovunque</a></li>
                        <li><a href="#" class="link-black">Vai al forum</a></li>
                        <li><a href="#" class="link-black">Come ospitare</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>BoolBnB</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class=" link link-black">Newsroom</a></li>
                        <li><a href="#" class="link-black">Scopri le funzionalità</a></li>
                        <li><a href="#" class="link-black">Lettere dai fondatori</a></li>
                        <li><a href="#" class="link-black">Opportunità di lavoro</a></li>
                        <li><a href="#" class="link-black">Investitori</a></li>
                        <li><a href="#" class="link-black">Gift Card</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <hr class="my-3 mt-5">
            <div class="row">
                <div class="col-md-12 ">
                        <p class="text-muted">
                            &copy; 2023 BoolBnB, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Termini</a> &middot; <a href="#">Mappa del  sito</a> &middot; <a href="#">Dettagli dell'azienda</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>












    <style lang="scss" scoped>
        .social-links,.flex-center {
  display: flex;
  justify-content: center;
  align-items: center;
}
 a{
    text-decoration: none;
    color: inherit
 }
.social-btn {
  cursor: pointer;
  height: 50px;
  width: 50px;
  font-family: 'Titillium Web', sans-serif;
  color: #333;
  border-radius: 10px;
  box-shadow: 0px 10px 10px rgba(0,0,0,0.1);
  background: white;
  margin: 5px;
  transition: 0.3s;
  justify-content: center;
}

.social-btn svg {
  height: 24px;
  width: 24px;
}

.social-btn span {
  width: 0px;
  overflow: hidden;
  transition: 0.3s;
  text-align: center;
  margin-left: 5px;
}

.social-btn:hover {
  width: 150px;
  border-radius: 5px;
}

.social-btn:hover span {
  padding: 2px;
  width: 80px;
}

#twitter svg {
  fill: #1da1f2;
}

#linkedin svg {
  fill: #0e76a8;
}

#github {
  fill: #333;
}
.link-black {
    color: #000000;
    list-style: none;
    text-decoration: none;
  }
</style>
@endsection
