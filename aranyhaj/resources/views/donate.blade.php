@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Adományozok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <div class="container">
        <div class="row justify-content-center flex-column align-items-center">
            <!-- First Card: Adományozás menete -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h1>Adományozás menete:</h1>
                        <div id="aboutAlignLeft">
                            <ol>
                                <li>Ellenőrizd a hajhosszúságot – A minimális hossz 35cm</li>
                                <li>Válassz egy szalont – Keresd meg a hozzád legközelebb esőt.</li>
                                <li>Lépj kapcsolatba velük – Egyeztess időpontot a hajvágásra és az adományozás részleteiről.</li>
                                <li>Tiszta, száraz, összefogott hajjal érkezz a vágásra!</li>
                            </ol>
                        </div>
                        <img id="donationImage" src="{{ asset('images/donation.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- Second Card: További információ -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p>Ha bizonytalan vagy, érdemes tudnod, hogy a hajadományozással valódi segítséget
                            nyújthatsz azoknak, akiknek szükségük van rá. Minden egyes adomány számít, és
                            akár egy frizura is mosolyt csalhat valaki arcára. Ha kérdésed van, bátran
                            keresd a kiválasztott szalont vagy minket – segítünk!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><br>

@endsection
<!-- Lezárás -->