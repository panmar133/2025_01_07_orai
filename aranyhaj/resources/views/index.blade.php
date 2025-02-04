@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Üdvözlünk!")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->

<main>
        <div id="FirstContentMainPage">
            <h1 id="HeaderLabel"><a href="/about">Aranyhaj</a></h1>
            <p><b>Adj reményt egy tincsnyi szeretettel! </b></p><br> 
            <p>Üdvözlünk a hajadományozás közösségében! Mi, azért hoztuk létre ezt a platformot,
                hogy összekössük azokat, akik segíteni szeretnének azokkal, akiknek igazán szükségük van rá.
                A hajadományozás egy csodálatos módja annak, hogy örömet szerezzünk és önbizalmat adjunk azoknak,
                akik betegség vagy más okok miatt elvesztették hajukat. </p>
            <button>Adományozni szeretnék</button><br>
        </div>
        
        <div id="SecoundontentMainPage">   
            <p>💇‍♀️<b> Miért fontos a hajadományozás?</b> A parókák sokak számára nemcsak esztétikai, hanem érzelmi
            támogatást is jelentenek. </p>
            <p>Egy hajadomány nem csupán fizikai ajándék – ez egy új kezdet és egy mosoly forrása is lehet! </p><br>

        <div id="ListContentMainPage">
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
                <img src="" alt="event">
                <button><a href="events.html">Események</a></button>
            </div>
            <div>
                <img src="" alt="donation">
                <button><a href="donate.html">Adományozok</a></button>
            </div>
            <div>
                <img src="" alt="salon">
                <button><a href="salons.html">Szalonok</a></button>
            </div>
        </div>
    </main>
@endsection
<!-- Lezárás -->