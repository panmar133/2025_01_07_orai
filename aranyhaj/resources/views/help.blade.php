@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Adományozok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<div class="container">
    <h1 class="text-center my-4">Gyakori kérdések</h1>

    <!-- Adományozás -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>1. Adományozás</h3>
        </div>
        <div class="card-body">
            <dl>
                <dt>Miért érdemes adományozni?</dt>
                <dd>Adományoddal azoknak tudsz segíteni akiknek tényleg szüksége van rá.</dd>
                <dt>Hogyan működik az adományozás?</dt>
                <dd>Látogasd meg az adományozás oldalunkat, ott részletes válasz érhető el.</dd>
                <dt>Lehet-e adományozni mást hajon kívül?</dt>
                <dd>Egyenlőre még nincs erre mód.</dd>
            </dl>
        </div>
    </div>

    <!-- Fiók Regisztráció -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>2. Fiók Regisztráció</h3>
        </div>
        <div class="card-body">
            <dl>
                <dt>Hogyan regisztrálhatok az oldalon?</dt>
                <dd></dd>
                <dt>Elfelejtettem a jelszavam, mit tegyek?</dt>
                <dd></dd>
                <dt>Hogyan frissíthetem a fiókom adatait?</dt>
                <dd></dd>
                <dt>Miért nem tudok bejelentkezni a fiókomba?</dt>
                <dd></dd>
            </dl>
        </div>
    </div>

    <!-- Események / Programok -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>3. Események / Programok</h3>
        </div>
        <div class="card-body">
            <dl>
                <dt>Hogyan jelentkezhetek az eseményekre?</dt>
                <dd></dd>
                <dt>Mi a teendő, ha le szeretnék mondani a részvételemet?</dt>
                <dd></dd>
                <dt>Mikor lesznek a következő események?</dt>
                <dd></dd>
                <dt>Milyen eszközökre van szükségem az eseményen való részvételhez?</dt>
                <dd></dd>
            </dl>
        </div>
    </div>

    <!-- Adatvédelem -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>4. Adatvédelem</h3>
        </div>
        <div class="card-body">
            <dl>
                <dt>Hogyan véditek a személyes adatokat?</dt>
                <dd></dd>
                <dt>Miért kell megadnom a személyes adataimat?</dt>
                <dd></dd>
                <dt>Hogyan törölhetem a fiókomat?</dt>
                <dd></dd>
                <dt>Milyen adatokat gyűjtötök a felhasználókról?</dt>
                <dd></dd>
            </dl>
        </div>
    </div>

    <!-- Hozzáférhetőség / Ügyfélszolgálat -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>5. Hozzáférhetőség / Ügyfélszolgálat</h3>
        </div>
        <div class="card-body">
            <dl>
                <dt>Hogyan érhetem el az ügyfélszolgálatot?</dt>
                <dd></dd>
                <dt>Van élő chat támogatás?</dt>
                <dd></dd>
                <dt>Milyen napokon érhetők el az ügyfélszolgálatosok?</dt>
                <dd></dd>
                <dt>Mi a teendő, ha sürgős kérdésem van?</dt>
                <dd></dd>
            </dl>
        </div>
    </div>
</div>

@endsection
<!-- Lezárás -->