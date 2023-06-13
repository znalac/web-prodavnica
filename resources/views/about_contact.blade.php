@section('title') About & contact @endsection @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
            <div class="contact">
                <span class="email">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    mikaelsdotterellen@gmail.com
                </span>
                <span class="phone">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    0049 0176 70958 196
                </span>
            </div>
            <div class="social">
                <a href="https://www.facebook.com/EllenRaLinde/"
                    ><i class="fa fa-facebook-official" aria-hidden="true"></i>
                </a>
                <a
                    href="https://www.instagram.com/accounts/login/?next=/p/BGcwV62waR1/"
                    ><i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a
                    href="https://www.youtube.com/channel/UCDAu36uYgIsGSpvH0zl7aRQ/videos"
                    ><i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
                <a href="https://soundcloud.com/user-943156241"
                    ><i class="fa fa-soundcloud" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <img
                src="/images/pictures/ellen.jpg"
                alt="Ellen"
                class="img-fluid ellen"
            />
        </div>
        <div class="col-sm-8">
            <div class="about">
                <p>
                    Ellen Ra Linde was born in Åland ilsands at the centre of
                    Scandinavia, and uses various genres to explore the full
                    aspects of creating . As a child constantly drawing and
                    writing, and later on an interest for dancing occupying her
                    during the school-years. In teenage years, the passion for
                    painting took over her complete devotion.
                    <br />
                    <br />
                    One year after starting painting, her first solo exhibition
                    was held in London, which included around 40 artworks and 20
                    art designs on clothes. Ellen continued her artistical
                    development when moving to Denmark and Sweden for various
                    artistic schools and courses such as screenprinting and
                    other printing techniques, old school photo development, and
                    weekly practise with live sketching.
                    <br />
                    <br />
                    In Sweden 2014 two solo exhibitions were held in two parts,
                    including around 50 artworks together. From 2016 while
                    residing in Malta, Ellen were involved in electronic music
                    event managing alongside of her continous artistic career
                    and exhibitions.
                    <br />
                    <br />
                    In collaboration with well-known brands such as RayBan and
                    Jägermeister, touring to various musical festivals while
                    marketing and promoting their brands by making henna tattos.
                    Appart from festivals or events henna tattoos can also be
                    made privately for customers.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="printings">
                <h1>The paintings and illustrations</h1>
                <p>
                    are typically portraits in an almost realistic modern or pop
                    style, with a psychedelic explosion of colors and a touch of
                    surrealism, much like the designs that are created for the
                    Techno Viking clothing label.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="solo-art">
                <h1>Solo art exhibitions</h1>
                <p>
                    held in London, Copenhagen, Karlslunde (Denmark), Gothenburg
                    (Sweden Malta and Åland Islands (Finland) between 2010-2021
                    Techno Viking is a brand wich offers a unique selection of
                    clothing, exclusevly created with each piece being original,
                    besides the prints that are offered. All clothes are signed
                    by the artist, and the clothing is fully wearable and
                    washable. Your own idea or wish for a jacket or clothing,
                    can be created upon request. Plea
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="henna-tatoo">
                <h1>Henna tattoo</h1>
                <p>
                    Henna tattoo and designing tattoos, collaborations with
                    well-known brands like RayBan & Jägermesiter, by making
                    henna tattoos for their brands promotional campaign at
                    festivals.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="dj-producer">
                <h1>DJ & Producer</h1>
                <p>
                    Since 2015 Ellen has been Djing as well as producing
                    electronic music. Techno is a great daily inspiration and is
                    the style of choice performed as well as produced. With
                    previous engagement in the event managing and promotion of
                    techno events.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-10 offset-sm-1">
        <div class="mail-box">
            <h1>Get in touch with us</h1>
            <p>
                Please inform us about your postal address in your email, if
                your question is regarding orders, shipping, or another topic
                where your address would be come relevant. <br />
                I will be looking forward to your message.
            </p>
            <br />
            <form
                action="/about-contact"
                method="post"
                enctype="multipart/form-data"
            >
                @csrf

                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" />
                <label for="email">E-mail</label>
                <input type="email" name="email" />
                <label for="subject">Subject</label>
                <input type="text" name="subject" />
                <label for="message">Message</label>
                <textarea name="message" cols="30" rows="10"></textarea>
                <input type="file" name="attachment" />
                <button type="submit">Send Email</button>
            </form>
        </div>
    </div>
</div>
@endsection
