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
            <div id="helpHeader" class="card-header">
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
            <div id="helpHeader" class="card-header">
                <h3>2. Fiók Regisztráció</h3>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Hogyan regisztrálhatok az oldalon?</dt>
                    <dd>A regisztrációhoz kattints a "Regisztráció" gombra, majd kövesd az ott megjelenő utasításokat.</dd>

                    <dt>Elfelejtettem a jelszavam, mit tegyek?</dt>
                    <dd>Ha elfelejtetted a jelszavad, kattints a "Jelszó visszaállítása" linkre, és kövesd az e-mailben
                        küldött utasításokat.
                        Ha segítségre van szükséged, keresd ügyfélszolgálatunkat.</dd>

                    <dt>Hogyan frissíthetem a fiókom adatait?</dt>
                    <dd>Fiókod adatait a "Fiókom" oldalon frissítheted. Itt módosíthatod a lakcímedet, illetve a
                        jelszavadat.</dd>

                    <dt>Miért nem tudok bejelentkezni a fiókomba?</dt>
                    <dd>Győződj meg róla, hogy helyesen adtad meg a felhasználóneved és a jelszavad. Ha továbbra is
                        problémát tapasztalsz,
                        próbáld meg visszaállítani a jelszavad.</dd>

                </dl>
            </div>
        </div>

        <!-- Események / Programok -->
        <div class="card mb-3">
            <div id="helpHeader" class="card-header">
                <h3>3. Események / Programok</h3>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Hogyan jelentkezhetek az eseményekre?</dt>
                    <dd>A jelentkezéshez navigálj az események oldalára, és kattints a "Részvételek" gombra.</dd>

                    <dt>Mi a teendő, ha le szeretném mondani a részvételemet?</dt>
                    <dd>Jelenleg a "Részvétel" gomb csak a rendező számára jelzi, hogy érdeklődsz az esemény iránt,
                        de a lemondásra nincs lehetőség. Ha mégis le szeretnéd mondani, vedd fel a kapcsolatot a rendezővel.
                    </dd>

                    <dt>Mikor lesznek a következő események?</dt>
                    <dd>A legfrissebb eseményekről a "Események" oldalon tájékozódhatsz, ahol mindig naprakész információk
                        találhatók.</dd>

                    <dt>Milyen eszközökre van szükségem az eseményen való részvételhez?</dt>
                    <dd>Minden eseménynél elérhető egy "További információ" gomb, amely részletes leírást ad az adott
                        eseményhez szükséges eszközökről.</dd>

                </dl>
            </div>
        </div>

        <!-- Adatvédelem -->
        <div class="card mb-3">
            <div id="helpHeader" class="card-header">
                <h3>4. Adatvédelem</h3>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Hogyan véditek a személyes adatokat?</dt>
                    <dd>Az Önök személyes adatait szigorúan bizalmasan kezeljük, és minden szükséges technikai és szervezési
                        intézkedést megteszünk annak érdekében,
                        hogy azokat védjük..</dd>

                    <dt>Miért kell megadnom a személyes adataimat?</dt>
                    <dd>A személyes adatok megadása szükséges a fiók létrehozásához, az eseményekhez való hozzáféréshez.
                    </dd>

                    <dt>Hogyan törölhetem a fiókomat?</dt>
                    <dd>Ha törölni szeretnéd a fiókodat, kérjük, vedd fel velünk a kapcsolatot e-mailben vagy az
                        ügyfélszolgálati felületen keresztül.
                        A kérés beérkezése után az adatokat biztonságosan töröljük a rendszerből.</dd>

                    <dt>Milyen adatokat gyűjtötök a felhasználókról?</dt>
                    <dd>A felhasználókról a következő adatokat gyűjtjük: név, e-mail cím, lakcím (amennyiben megadod),
                        valamint a fiók kezeléséhez szükséges további információk.</dd>

                </dl>
            </div>
        </div>

        <!-- Hozzáférhetőség / Ügyfélszolgálat -->
        <div class="card mb-3">
            <div id="helpHeader" class="card-header">
                <h3>5. Hozzáférhetőség / Ügyfélszolgálat</h3>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Hogyan érhetem el a fiókomat, ha elfelejtettem a jelszavamat?</dt>
                    <dd>Ha elfelejtetted a jelszavadat, kattints a "Jelszó visszaállítása" gombra a bejelentkezési oldalon,
                        és kövesd az utasításokat.
                        E-mailben fogsz kapni egy linket, amely segítségével beállíthatod új jelszavadat. Ha további
                        segítségre van szükséged,
                        keresd fel ügyfélszolgálatunkat!</dd>

                    <dt>Hogyan változtathatok a felhasználónevemen?</dt>
                    <dd>Jelenleg a felhasználónevet nem lehet közvetlenül módosítani. Ha más felhasználónevet szeretnél,
                        kérjük,
                        töröld a fiókodat és hozz létre egy új regisztrációt az új felhasználónévvel.</dd>

                    <dt>Mi történik, ha hibásan töltöm ki a regisztrációs űrlapot?</dt>
                    <dd>Ha hibás adatokat adsz meg a regisztráció során, az oldal értesíteni fog róla, hogy javítanod kell
                        azokat.
                        Kérjük, győződj meg arról, hogy minden mezőt helyesen töltöttél ki, mielőtt véglegesítenéd a
                        regisztrációt.</dd>

                    <dt>Mi történik, ha többször is rossz jelszót adok meg?</dt>
                    <dd>Ha többször is hibás jelszót adsz meg, biztonsági okokból ideiglenesen zároljuk a fiókodat.
                        Ilyenkor a "Jelszó visszaállítása" opcióval új jelszót kérhetsz a fiókhoz. Ha problémát tapasztalsz,
                        keresd fel ügyfélszolgálatunkat!</dd>

                </dl>
            </div>
        </div>
    </div>
@endsection
<!-- Lezárás -->