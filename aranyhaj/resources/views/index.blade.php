@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Üdvözlünk!")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
        <div id="FirstContentMainPage" class="card px-3 px-md-5 mt-5 mx-auto" style="max-width: 90%;">
            <h3><b>Adj reményt egy kis szeretettel! </b></h3><br> 
            <p>Üdvözlünk a hajadományozás közösségében! Mi, azért hoztuk létre ezt a platformot,
                hogy összekössük  azokat, akik segíteni szeretnének azokkal, akiknek igazán szükségük van rá.
                A hajadományozás egy csodálatos módja annak, hogy örömet szerezzünk és önbizalmat adjunk azoknak,
                akik betegség vagy más okok miatt elvesztették hajukat. </p>
            <a href="/donate" class="btn btn-dark btn-sm d-block mx-auto">Adományozni szeretnék</a> <br>
        </div>
        
        <div id="SecondContentMainPage" class="card px-3 px-md-5 mt-5 mb-5 mx-auto" style="max-width: 90%;">   
            <h3>💇‍♀️<b>Miért fontos a hajadományozás?</b></h3>
            <p> A parókák sokak számára nemcsak esztétikai, hanem érzelmi támogatást is jelentenek. <br>
                Egy hajadomány nem csupán fizikai ajándék – ez egy új kezdet és egy mosoly forrása is lehet! </p>
            <h3><b>🌟 Hogyan tudsz segíteni? </b></h3>
            <ul>
                <li><b>Adományozd le a hajad – </b>Tudj meg többet az adományozás feltételeiről! </li>
                <li><b>Támogasd a kezdeményezést anyagilag –</b> Segítsd a paróka készítés költségeit! </li>
                <li><b>Oszd meg a történetünket –</b> Minél többen tudnak róla, annál több emberhez érhet el a segítség! </li>
            </ul>
        </div>
        
        <div id="ThirdContentMainPage" class="d-flex justify-content-center gap-3 flex-wrap">
            <div class="card text-center" style="width: 18rem;">
                <a href="/events"><img src="{{ asset('images/event.png') }}" class="card-img-top" alt="events"></a>
                <div class="card-body">
                    <a href="/events" class="btn btn-dark">Események</a>
                </div>
            </div>
        
            <div class="card text-center" style="width: 18rem;">
                <a href="/salons"><img src="{{ asset('images/salons.png') }}" class="card-img-top" alt="salons"></a>
                <div class="card-body">
                    <a href="/salons" class="btn btn-dark">Szalonok</a>
                </div>
            </div>
        
            <div class="card text-center" style="width: 18rem;">
                <a href="/donate"><img src="{{ asset('images/donate.png') }}" class="card-img-top" alt="donations"></a>
                <div class="card-body">
                    <a href="/donate" class="btn btn-dark">Adományozok</a>
                </div>
            </div>
        </div>
    </main>
@endsection
<!-- Lezárás -->