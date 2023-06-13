@section('title') Henna Tatoo @endsection @extends('layouts.app')
@section('content')
<div class="container">
    <div class="contact">
        <span class="book">To book an appointment, please contact:</span> <br />
        <span class="">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            mikaelsdotterellen@gmail.com
        </span>

        <br />
        <span class="">
            <i class="fa fa-phone" aria-hidden="true"></i>
            0049 0176 70958 196
        </span>
    </div>
    <div class="row justify-content-center">
        <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/4wu24xdcPls"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
        ></iframe>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="tatoo-description">
                <p>
                    Henna tattoos in Berlin. Henna tattoos are, besides being
                    trendy and beautiful, an ancient ritual to embrace the
                    feminine essence of beauty and feminine power. I offer home
                    visits with an added fee of 6 euro for transport. If you
                    wish to book an appointment and visit my studio it is
                    located in Weissensee, Berlin. Please PM for full address.
                    Simply message, email or call me to book an appointment. I
                    can make almost any desired design, you are kindly requested
                    to send a picture in advance, if possible.

                    <br />
                    <br />
                    <span class="bold">
                        Henna tattoos, made by artist Ellen Ra Linde, who
                        besides her artistic work has been creating henna
                        tattoos since 2015. As a returning customer, you get 10
                        % discount on your second appointment.

                        <br />
                        <br />
                        When to get a henna tattoo? - For any celebrational
                        event like birthdays, feasts, parties, and other events.
                        - Henna also enhances your feeling of beauty in your
                        everyday life - If you want to try out a tattoo in
                        henna, before making it a permanent decision - For your
                        wedding, I offer full body henna tattoos (made 2 days
                        before the wedding) You can also book me for festivals
                        or marketing campaigns. If you wish to know more about
                        previous marketing experiences in regards to including
                        free henna tattoos for brands and companies, for guests,
                        or your employees, feel free to contact me.
                        <br />
                        <br />
                        Benefits: - Temporary tattoo which lasts a limited
                        amount of time. If you are restricted by work reasons
                        from wearing tattoos, this is a temporary solution for
                        you to try. - SAFE.All-natural with top quality and
                        organic ingredients, homemade henna paste from scratch.
                        This means there are no toxic chemicals in the henna
                        paste, which eliminates the potential dangers of a bad
                        reaction. If you wish to make a patch test before making
                        the henna, this is possible. A patch test can be made 1
                        day ahead of the appointment. The natural ingredients
                        give the finished henna stain a dark red-brown color. -
                        Last approximately 1,5 weeks. Aftercare: - Before you
                        leave the appointment and the henna tattoo is dried, a
                        natural sugary lemon liquid is placed on the henna to
                        ensure the paste stays long enough to leave the desired
                        darkest stain.
                        <br />
                        <br />
                        - Leave the paste until the next day preferably (if made
                        during the evening) then scrape it off with the help of
                        some oil. - Avoid water directly on the tattoo. Apply
                        natural oil on the tattoo before washing hands, dishes,
                        or going in the shower to ensure a long-lasting stain. -
                        I recommend coconut oil or any other natural oil like
                        almond or another nut oil. Avoid body lotions and other
                        creams due to the chemical ingredients. Enjoy your
                        temporary artwork and embrace your beauty!
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($galleries as $gallery)
        <div class="col-sm-4">
            <a
                href="/images/{{$gallery->image}}"
                title="{{  $gallery->image_title }}"
                class="swipebox"
            >
                <img src="/images/{{$gallery->image}}" class="img-fluid tatoo"
            /></a>
        </div>
        @endforeach
    </div>
</div>
@endsection @section('js')
<script type="text/javascript">
    $(".swipebox").swipebox({
        hideBarsDelay: 0,
    });
</script>

@endsection
