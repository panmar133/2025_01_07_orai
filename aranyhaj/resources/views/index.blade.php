@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Üdvözlünk!")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->

<main>
    <!-- Felül kép fölött lévő állomás -->
    <div id="firstContentMainPage">
        <h1><a href="/about">Aranyhaj</a></h1>
        <p><b>Adj reményt egy kincsinyli szeretettel! </b></p>
        <button>Adományozok</button>
    </div><br>

    <!-- Gombok az oldalak között. Kinézete: mint a krétán a bejelentkezés eleje ???leírás??? -->
    <div id="SecoundContentMainPage">
        <div>
            <img src="" alt="event">
            <button><a href="/events">Események</a></button>
        </div>
        <div>
            <img src="" alt="donation">
            <button><a href="/donate">Adományozok</a></button>
        </div>
        <div>
            <img src="" alt="salon">
            <button><a href="/salons">Szalonok</a></button>
        </div>
    </div>

    <h1><a href="/about">Aranyhaj</a></h1>
    <p><b>Adj reményt egy tincsnyi szeretettel! </b></p><br> 

    <p>Üdvözlünk a hajadományozás közösségében! Mi, azért hoztuk létre ezt a platformot,
        hogy összekössük azokat, akik segíteni szeretnének azokkal, akiknek igazán szükségük van rá
        A hajadományozás egy csodálatos módja annak, hogy örömet szerezzünk és önbizalmat adjunk azoknak,
        akik betegség vagy más okok miatt elvesztették hajukat. </p><br>

    <p>💇‍♀️<b> Miért fontos a hajadományozás?</b> A parókák sokak számára nemcsak esztétikai, hanem érzelmi
    támogatást is jelentenek. Egy hajadomány nem csupán fizikai ajándék – ez egy új kezdet és egy mosoly forrása
    is lehet! </p><br>

    <p><b>🌟 Hogyan tudsz segíteni? </b></p>
    <ul>
        <li><b>Adományozd le a hajad – </b>Tudj meg többet az adományozás feltételeiről! </li>
        <li><b>Támogasd a kezdeményezést anyagilag –</b> Segítsd a paróka készítés költségeit! </li>
        <li><b>Oszd meg a történetünket –</b> Minél többen tudnak róla, annál több emberhez érhet el a segítség! </li>
    </ul>

    <!-- Dinamikus elemek?->Események -->
</main>
@endsection
<!-- Lezárás -->