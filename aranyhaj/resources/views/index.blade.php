@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Üdvözlünk!")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
        <div id="FirstContentMainPage" class="px-3 px-md-5">
            <h1 id="HeaderLabel"><a href="/about">Aranyhaj</a></h1>
            <p><b>Adj reményt egy kis szeretettel! </b></p><br> 
            <p>Üdvözlünk a hajadományozás közösségében! Mi, azért hoztuk létre ezt a platformot,
                hogy összekössük azokat, akik segíteni szeretnének azokkal, akiknek igazán szükségük van rá.
                A hajadományozás egy csodálatos módja annak, hogy örömet szerezzünk és önbizalmat adjunk azoknak,
                akik betegség vagy más okok miatt elvesztették hajukat. </p>
            <button>Adományozni szeretnék</button><br>
        </div>
        
        <div id="SecoundontentMainPage" class="px-3 px-md-5">   
            <p>💇‍♀️<b> Miért fontos a hajadományozás?</b> A parókák sokak számára nemcsak esztétikai, hanem érzelmi
            támogatást is jelentenek. </p>
            <p>Egy hajadomány nem csupán fizikai ajándék – ez egy új kezdet és egy mosoly forrása is lehet! </p><br>

        <div id="ListContentMainPage" class="px-3 px-md-5">
            <p><b>🌟 Hogyan tudsz segíteni? </b></p>
            <ul>
                <li><b>Adományozd le a hajad – </b>Tudj meg többet az adományozás feltételeiről! </li>
                <li><b>Támogasd a kezdeményezést anyagilag –</b> Segítsd a paróka készítés költségeit! </li>
                <li><b>Oszd meg a történetünket –</b> Minél többen tudnak róla, annál több emberhez érhet el a segítség! </li>
            </ul>
        </div>
        </div>

        <div id="ThirdContentMainPage">
            <div>
            <a href="/events"><img src="{{ asset('images/event.png') }}" alt="event"></a>
                <button id="darkBrownButton" class="text-black"><a href="/events">Események</a></button>
            </div>
            <div>
                <a href="/salons"><img src="{{ asset('images/salon.png') }}" alt="salon"></a>
                <button id="darkBrownButton" class="text-black"><a href="/salons">Szalonok</a></button>
            </div><div>
                <a href="/events"><img src="{{ asset('images/donate.png') }}" alt="donation"></a>
                <button id="darkBrownButton"class="text-black"><a href="/donate">Adományozok</a></button>
            </div>

        </div>
    </main>
@endsection
<!-- Lezárás -->