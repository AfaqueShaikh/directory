@extends('layouts.default')
@section('title')
    Invite a friend
@endsection
@section('content')
    <style>
        .box {
            position: relative;
        }
        .box .text {
            position: absolute;
            z-index: 999;
            text-align: center;
            bottom: 50%;
            left: 0;
            /*background: rgba(178, 0, 0, 0.8);*/
            background: linear-gradient(to bottom,rgba(9,52,116,.1),rgba(255,255,255,.5) 40%,rgba(255,255,255,.6) 50%,rgba(255,255,255,.5) 60%,rgba(9,52,116,.1));
            font-family: Arial,sans-serif;
            color: #fff;
            width: 100%; /* Set the width of the positioned div */
            height: 10%;
            color: #093474;
        }
        .page.referrals .socials {
            grid-column: 1/-1;
            display: flex;
            margin: 0 auto 1rem;
            padding-left: 0;
        }
        .page.referrals .socials li {
            list-style: none;
            margin: 1.5rem 2rem 1.5rem 0;
        }

        .page.referrals .input-group {
            min-width: 50%;
        }
        .page.referrals .input-group {
            display: flex;
            min-width: 100%;
            flex-direction: column;
            margin: 0 auto 1.5rem;
        }
        .page.referrals .input-group .label {
            display: block;
            margin-bottom: 1rem;
            font-size: 20px;

        }
        .page.referrals .card {
            grid-column: 1/-1;
            width: unset;
            max-width: unset;
            margin-bottom: 2rem;
            text-align: center;
        }
        .page.referrals .input-group .input.invite {
            margin-bottom: 1.5rem;
        }
        .page.referrals .input-group .input {
            font-size: .875rem;
            line-height: 1.57;
            font-family: DMSans-Regular,sans-serif;
            width: 100%;
            color: #6d85ab;
            padding: 0.5rem 1rem;
        }
        .button {
            font-size: 1rem;
            line-height: 1.4;
            font-family: DMSans-Bold,sans-serif;
            height: 3.375rem;
        }
        .button.primary {
            background-color: #093474;
            color: #fff;
        }
        .page.referrals .disclaimer {
            max-width: 29.6875rem;
            margin: 0 auto;
            font-style: italic;
        }

        .steps {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-column-gap: 1.875rem;
            -moz-column-gap: 1.875rem;
            column-gap: 1.875rem;
        }
        .steps {
            display: grid;
            grid-template-columns: 1fr;
        }
        .step {
            position: relative;
            margin-bottom: 2rem;
        }
        /*.step:after {
            content: "";
            display: block;
            position: absolute;
            border-top: 5px dotted #105ac9;
            width: 50%;
            height: 0;
            top: 30px;
            left: 85%;
        }*/

        .step .icon {
            margin: 0 auto;
            height: 4.0625rem;
            width: 4.0625rem;
        }
        .icon svg {
            margin: 0 auto;
            height: unset;
            width: unset;
        }
    </style>
    <section class="section section--marketplace page referrals">
        <section class="section section--product">
            <div class="container-fluid section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center mt-4 mb-1">
                                    <h3>Invite a friend and earn</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center mt-2 m-3">
                                    <p>You receive a bonus of <strong>50 points</strong> when your first friend signs up and 10 points for every friend after that. (Your friend gets <strong>10 points</strong> for using your link too)</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center mt-2 mb-1">
                                    <ul class="socials">
                                        <li>
                                            <a
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                aria-label="Share on Facebook"
                                                title="Share on Facebook"
                                                hreflang="en"
                                                href="https://www.facebook.com/dialog/share?app_id=1657336614377887&amp;display=page&amp;redirect_uri=https%3A%2F%2Fgener8ads.com%2Fdashboard%2Freferrals&amp;href=https%3A%2F%2Frefer.gener8ads.com%2Fr%2FPJSfXV"
                                            >
                                                <i class="fas fa-facebook">
                                                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="lg">
                                                        <path
                                                            d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.093 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.563V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10Z"
                                                            fill="currentColor"
                                                        ></path>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                aria-label="Send via Facebook Messenger"
                                                title="Send via Facebook Messenger"
                                                hreflang="en"
                                                href="https://www.facebook.com/dialog/send?app_id=1657336614377887&amp;display=page&amp;redirect_uri=https%3A%2F%2Fgener8ads.com%2Fdashboard%2Freferrals&amp;link=https%3A%2F%2Frefer.gener8ads.com%2Fr%2FPJSfXV"
                                            >
                                                <i class="fas fa-facebook-messenger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="lg">
                                                        <defs>
                                                            <radialGradient id="messenger_svg__a" gradientUnits="userSpaceOnUse" cx="0" cy="0" fx="0" fy="0" r="1" gradientTransform="matrix(26.4 0 0 26.4 4.02 24)">
                                                                <stop offset="0" style="stop-color: rgb(0, 153, 255); stop-opacity: 1;"></stop>
                                                                <stop offset="0.6" style="stop-color: rgb(160, 51, 255); stop-opacity: 1;"></stop>
                                                                <stop offset="0.9" style="stop-color: rgb(255, 82, 128); stop-opacity: 1;"></stop>
                                                                <stop offset="1" style="stop-color: rgb(255, 112, 97); stop-opacity: 1;"></stop>
                                                            </radialGradient>
                                                        </defs>
                                                        <path
                                                            d="M12 0C5.242 0 0 4.953 0 11.64c0 3.497 1.434 6.52 3.77 8.61a.96.96 0 0 1 .32.684l.066 2.136a.944.944 0 0 0 .125.446.943.943 0 0 0 .32.336.944.944 0 0 0 .903.066l2.379-1.05a.987.987 0 0 1 .644-.048c1.094.301 2.258.461 3.473.461 6.758 0 12-4.953 12-11.636C24 4.957 18.758 0 12 0Zm0 0"
                                                            style="stroke: none; fill-rule: nonzero; fill: url('#messenger_svg__a');"
                                                        ></path>
                                                        <path
                                                            d="M4.793 15.047 8.32 9.453a1.793 1.793 0 0 1 2.602-.48l2.805 2.101a.723.723 0 0 0 .867 0L18.383 8.2c.504-.383 1.164.223.828.758l-3.531 5.59a1.793 1.793 0 0 1-2.602.48l-2.805-2.101a.723.723 0 0 0-.867 0L5.617 15.8c-.504.383-1.164-.219-.824-.754Zm0 0"
                                                            style="stroke: none; fill-rule: nonzero; fill: rgb(255, 255, 255); fill-opacity: 1;"
                                                        ></path>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                aria-label="Share Tweet"
                                                title="Share Tweet"
                                                hreflang="en"
                                                href="https://twitter.com/intent/tweet?url=https%3A%2F%2Frefer.gener8ads.com%2Fr%2FPJSfXV&amp;text=Check+out+Gener8%2C+I+use+it+to+earn+real-world+rewards+for+browsing+the+Internet+as+usual%21+It+also+blocks+ads%2C+declines+cookies+and+stops+big+tech+from+tracking+you.+And+it%E2%80%99s+free%21+Install+Gener8+on+your+computer+and+register%2C+we%E2%80%99ll+both+get+bonus+points%3A"
                                            >
                                                <i class="fas fa-twitter">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 28 20" width="24" height="24" class="lg">
                                                        <path
                                                            fill="currentColor"
                                                            d="M28 2.37c-1.03.4-2.14.67-3.3.8a5.24 5.24 0 0 0 2.53-2.8c-1.13.59-2.36 1-3.65 1.22A6.13 6.13 0 0 0 19.38 0c-3.17 0-5.74 2.26-5.74 5.05 0 .4.05.78.15 1.15-4.77-.21-9-2.22-11.84-5.28-.5.75-.78 1.62-.78 2.54 0 1.75 1.02 3.3 2.56 4.2a6.33 6.33 0 0 1-2.6-.63v.07c0 2.44 1.97 4.48 4.6 4.95a6.5 6.5 0 0 1-2.6.08c.74 2.01 2.86 3.47 5.37 3.51a12.57 12.57 0 0 1-8.5 2.1A17.92 17.92 0 0 0 8.8 20c10.57 0 16.35-7.7 16.35-14.37 0-.21 0-.43-.02-.65A11 11 0 0 0 28 2.37Z"
                                                        ></path>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                aria-label="Share via email"
                                                title="Share via email"
                                                hreflang="en"
                                                href="mailto:?subject=Join%20me%20on%20Gener8%20-%20control%20%26%20be%20rewarded%20from%20your%20data%20(open%20on%20your%20computer)&amp;body=Check%20out%20Gener8%2C%20I%20use%20it%20to%20earn%20real-world%20rewards%20for%20browsing%20the%20Internet%20as%20usual!%0A%0AOn%20top%20of%20that%20it%20helps%20to%3A%0A-%20block%20annoying%20ads%0A-%20decline%20cookie%20pop-ups%0A-%20stop%20Big%20Tech%20from%20tracking%20you%0AAnd%20it%E2%80%99s%20free%20-%20no%20brainer!%20That%E2%80%99s%20why%20Gener8%20got%20BBC%20Dragons'%20Den%20backing.%0A%0AHow%20to%20join%3A%0A1.%20Install%20Gener8%20on%20your%20computer%20following%20this%20link%3A%20https%3A%2F%2Frefer.gener8ads.com%2Fr%2FPJSfXV%0A2.%20Register%20your%20own%20account%0A3.%20Get%20bonus%20points%20from%20my%20invite%20and%20start%20earning%20more%20from%20surfing%20the%20Internet!%0A4.%20Spend%20points%20on%20special%20offers%2C%20experiences%2C%20gift%20cards%2C%20mystery%20boxes%20and%20more!%20Or%20donate%20to%20a%20charity.%0A%0AThank%20me%20later."
                                            >
                                                <i class="icon email">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="lg">
                                                        <rect width="16" height="12" x="2" y="4" stroke="currentColor" stroke-width="2" rx="2"></rect>
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3 5 5.7 4.88a2 2 0 0 0 2.6 0L17 5"></path>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="input-group">
                                    <label class="label" for="invite">Invite link</label>
                                    <input type="text" id="invite" class="input invite" value="https://refer.gener8ads.com/r/PJSfXV">
                                    <button class="button primary" type="button">Copy<!-- --></button>
                                </div>
                                <p class="disclaimer">Psst, some items in our marketplace are only open to UK users right now. If you live outside of the UK, you'll still earn points but will have limited access to Rewards until we launch in your country 🚀</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--product">
            <div class="container-fluid section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center mt-2 mb-1">
                                    <h3>How it works</h3>
                                </div>
                            </div>

                            <div class="row m-2">
                                <div class="steps">
                                    <div class="step">
                                        <i class="icon chat-plus">
                                            <svg fill="none" height="63" width="66" xmlns="http://www.w3.org/2000/svg" class="sm">
                                                <linearGradient id="chat-plus_svg__a" gradientUnits="userSpaceOnUse" x1="49.257" x2="28.193" y1="56.704" y2="16.2">
                                                    <stop offset="0.254" stop-color="#061347"></stop>
                                                    <stop offset="1" stop-color="#2a47b5"></stop>
                                                </linearGradient>
                                                <linearGradient id="chat-plus_svg__b" gradientUnits="userSpaceOnUse" x1="27.5" x2="27.5" y1="9" y2="26">
                                                    <stop offset="0" stop-color="#e24fd9"></stop>
                                                    <stop offset="1" stop-color="#8a72f9"></stop>
                                                </linearGradient>
                                                <linearGradient id="chat-plus_svg__c" gradientUnits="userSpaceOnUse" x1="11" x2="19.5" y1="-4.5" y2="56.5">
                                                    <stop offset="0" stop-color="#8a72f9"></stop>
                                                    <stop offset="0.635" stop-color="#e24fd9"></stop>
                                                    <stop offset="1" stop-color="#e24fd9" stop-opacity="0"></stop>
                                                </linearGradient>
                                                <path d="M55.357 8.77h-2.214V6.576C53.14 2.946 50.167.003 46.5 0H6.643C2.975.003.003 2.946 0 6.577V28.5c.003 3.631 2.975 6.574 6.643 6.577h2.214V46.04c0 .888.54 1.685 1.368 2.025.827.34 1.78.15 2.413-.474l12.635-12.513H46.5c3.667-.003 6.64-2.946 6.643-6.577V13.154h2.214c1.224 0 2.214.98 2.214 2.192V37.27c0 1.212-.99 2.193-2.214 2.193H50.93a2.203 2.203 0 0 0-2.215 2.192v7.862l-9.505-9.413a2.227 2.227 0 0 0-1.566-.641H26.57c-1.223 0-2.214.98-2.214 2.192s.991 2.192 2.214 2.192h10.156L49.365 56.36h-.003a2.234 2.234 0 0 0 2.414.474 2.191 2.191 0 0 0 1.367-2.025V43.846h2.214c3.668-.002 6.64-2.946 6.643-6.577V15.346c-.003-3.63-2.975-6.574-6.643-6.577zM48.714 28.5c0 1.211-.99 2.192-2.214 2.192H24.357c-.587 0-1.151.23-1.566.642l-9.505 9.413v-14.44c0-1.21-.991-2.191-2.215-2.191a2.203 2.203 0 0 0-2.214 2.192v4.385H6.643A2.203 2.203 0 0 1 4.429 28.5V6.577c0-1.211.99-2.192 2.214-2.192H46.5c1.224 0 2.214.98 2.214 2.192z" fill="url(#chat-plus_svg__a)"></path>
                                                <path clip-rule="evenodd" d="M27.5 9a2.5 2.5 0 0 0-2.5 2.5V15h-3.5a2.5 2.5 0 0 0 0 5H25v3.5a2.5 2.5 0 0 0 5 0V20h3.5a2.5 2.5 0 0 0 0-5H30v-3.5A2.5 2.5 0 0 0 27.5 9z" fill="url(#chat-plus_svg__b)" fill-rule="evenodd"></path>
                                                <path d="M16 40.048v12l6-3.5h21l14 13.5v-13.5c6.4 0 8.333-3.666 8.5-5.5v-18c0-7.2-6.333-8-9.5-7.5 0-7.6-4.667-8.833-7-8.5H14c-5.6 0-7 5.667-7 8.5v16.5c0 5.6 6 6.334 9 6z" fill="url(#chat-plus_svg__c)" opacity="0.2"></path>
                                            </svg>
                                        </i>
                                        <h3>Invite your friends</h3>
                                        <p>Send the above link to one, or more, friends.</p>
                                    </div>
                                    <div class="step">
                                        <i class="icon add-friend">
                                            <svg width="58" height="64" fill="none" xmlns="http://www.w3.org/2000/svg" class="sm">
                                                <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M33.5 64C47.031 64 58 53.031 58 39.5S47.031 15 33.5 15 9 25.969 9 39.5 19.969 64 33.5 64Z" fill="url(#add-friend_svg__a)"></path>
                                                <path d="M39.875 39.875v1.813h-1.813a1.812 1.812 0 1 0 0 3.624h1.813v1.813a1.812 1.812 0 1 0 3.625 0v-1.813h1.813a1.812 1.812 0 1 0 0-3.624H43.5v-1.813a1.812 1.812 0 1 0-3.625 0Z" fill="url(#add-friend_svg__b)"></path>
                                                <path d="M9.438 56.419h18.125a1.812 1.812 0 1 0 0-3.625H9.438a1.812 1.812 0 0 1-1.813-1.813v-3.625a16.339 16.339 0 0 1 4.783-11.53 16.338 16.338 0 0 1 11.53-4.783h5.437a14.524 14.524 0 0 0 13.916-18.74A14.523 14.523 0 1 0 20.224 27.78 19.965 19.965 0 0 0 4 47.356v3.625a5.439 5.439 0 0 0 5.438 5.438ZM18.5 16.544a10.876 10.876 0 1 1 10.875 10.875A10.883 10.883 0 0 1 18.5 16.544Z" fill="url(#add-friend_svg__c)"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M41.055 25.178a14.524 14.524 0 0 1-11.68 5.865h-5.437a16.338 16.338 0 0 0-11.53 4.783 16.339 16.339 0 0 0-4.783 11.53v3.625c0 1.001.811 1.813 1.813 1.813h18.125a1.812 1.812 0 1 1 0 3.625H9.438A5.439 5.439 0 0 1 4 50.98v-3.625A19.957 19.957 0 0 1 20.224 27.78a14.523 14.523 0 1 1 20.83-2.603ZM34.607 1.9a15.523 15.523 0 0 1-5.232 30.142H23.94a15.338 15.338 0 0 0-10.824 4.49 15.339 15.339 0 0 0-4.49 10.824v3.624c0 .45.363.813.813.813h18.125a2.812 2.812 0 1 1 0 5.625H9.438A6.439 6.439 0 0 1 3 50.98v-3.627a20.958 20.958 0 0 1 15.172-20.11A15.523 15.523 0 0 1 34.606 1.9ZM22.393 9.56a9.876 9.876 0 0 0-2.893 6.982 9.882 9.882 0 0 0 9.876 9.876A9.876 9.876 0 1 0 22.393 9.56Zm-.707-.707a10.876 10.876 0 0 0-3.186 7.69 10.883 10.883 0 0 0 10.875 10.875 10.876 10.876 0 1 0-7.69-18.565Z" fill="url(#add-friend_svg__d)"></path>
                                                <path d="M29 43.5a12.69 12.69 0 1 0 21.66-8.972 12.69 12.69 0 0 0-8.972-3.716A12.704 12.704 0 0 0 29 43.5Zm21.75 0a9.052 9.052 0 0 1-2.655 6.407 9.052 9.052 0 0 1-6.408 2.656 9.052 9.052 0 0 1-6.407-2.656 9.052 9.052 0 0 1-2.655-6.407c0-2.404.954-4.708 2.655-6.407a9.052 9.052 0 0 1 12.812.002A9.072 9.072 0 0 1 50.75 43.5Z" fill="url(#add-friend_svg__e)"></path>
                                                <defs>
                                                    <linearGradient id="add-friend_svg__a" x1="18.188" y1="15" x2="44.175" y2="57.963" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#8A72F9"></stop>
                                                        <stop offset="0.693" stop-color="#E24FD9"></stop>
                                                        <stop offset="1" stop-color="#E24FD9" stop-opacity="0"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="add-friend_svg__b" x1="41.657" y1="35.616" x2="45.747" y2="37.007" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#E24FD9"></stop>
                                                        <stop offset="1" stop-color="#8A72F9"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="add-friend_svg__c" x1="36.301" y1="57.125" x2="11.753" y2="24.883" gradientUnits="userSpaceOnUse">
                                                        <stop offset="0.254" stop-color="#061347"></stop>
                                                        <stop offset="1" stop-color="#2A47B5"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="add-friend_svg__d" x1="35.713" y1="56.136" x2="11.956" y2="25.329" gradientUnits="userSpaceOnUse">
                                                        <stop offset="0.254" stop-color="#061347"></stop>
                                                        <stop offset="1" stop-color="#2A47B5"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="add-friend_svg__e" x1="41.617" y1="25.103" x2="51.16" y2="28.35" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#E24FD9"></stop>
                                                        <stop offset="1" stop-color="#8A72F9"></stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </i>
                                        <h3>One signs up</h3>
                                        <p>Earn 50 points once they're verified. They earn 10 points.</p>
                                    </div>
                                    <div class="step">
                                        <i class="icon two-friends">
                                            <svg fill="none" height="51" width="52" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="sm">
                                                <linearGradient id="two-friends_svg__d" gradientUnits="userSpaceOnUse" x1="40.251" x2="21.049" y1="14.378" y2="38.843">
                                                    <stop offset="0" stop-color="#8a72f9"></stop>
                                                    <stop offset="0.635" stop-color="#e24fd9"></stop>
                                                    <stop offset="1" stop-color="#e24fd9" stop-opacity="0"></stop>
                                                </linearGradient>
                                                <linearGradient id="two-friends_svg__a">
                                                    <stop offset="0.254" stop-color="#061347"></stop>
                                                    <stop offset="1" stop-color="#2a47b5"></stop>
                                                </linearGradient>
                                                <linearGradient id="two-friends_svg__e" gradientUnits="userSpaceOnUse" x1="19.792" x2="4.868" xlink:href="#two-friends_svg__a" y1="33.964" y2="14.711"></linearGradient>
                                                <linearGradient id="two-friends_svg__b">
                                                    <stop offset="0" stop-color="#e24fd9"></stop>
                                                    <stop offset="1" stop-color="#8a72f9"></stop>
                                                </linearGradient>
                                                <linearGradient id="two-friends_svg__f" gradientUnits="userSpaceOnUse" x1="43.999" x2="43.999" xlink:href="#two-friends_svg__b" y1="32.237" y2="38.961"></linearGradient>
                                                <linearGradient id="two-friends_svg__g" gradientUnits="userSpaceOnUse" x1="40.26" x2="25.335" xlink:href="#two-friends_svg__a" y1="43.516" y2="24.264"></linearGradient>
                                                <linearGradient id="two-friends_svg__h" gradientUnits="userSpaceOnUse" x1="43.999" x2="43.999" xlink:href="#two-friends_svg__b" y1="27.755" y2="43.444"></linearGradient>
                                                <clipPath id="two-friends_svg__c">
                                                    <path d="M0 0h51.76v50.026H0z"></path>
                                                </clipPath>
                                                <g clip-path="url(#two-friends_svg__c)">
                                                    <path clip-rule="evenodd" d="M24.474 43.323c2.957 6.146 10.337 8.731 16.483 5.773s8.731-10.337 5.773-16.483c-2.87-5.965-9.907-8.576-15.938-6.02-1.27-7.31-8.074-12.409-15.517-11.485-7.673.953-13.12 7.946-12.167 15.62s7.946 13.12 15.62 12.166a13.967 13.967 0 0 0 4.98-1.6c.192.687.447 1.365.766 2.03z" fill="url(#two-friends_svg__d)" fill-rule="evenodd" opacity="0.2"></path>
                                                    <path d="M24.522 6.544c-.838-2.787-2.958-5.035-5.671-6.012a9.089 9.089 0 0 0-8.157 1.03c-2.392 1.622-3.9 4.327-4.033 7.236a9.32 9.32 0 0 0 2.972 7.248 12.476 12.476 0 0 0-6.767 4.229A12.694 12.694 0 0 0 0 28.289v2.241c0 1.991 1.604 3.611 3.576 3.611h11.086c.75 0 1.359-.614 1.359-1.37s-.609-1.371-1.359-1.371H3.576a.866.866 0 0 1-.859-.87v-2.241a9.84 9.84 0 0 1 2.854-6.953 9.63 9.63 0 0 1 6.875-2.883h3.339a9.142 9.142 0 0 0 7.333-3.729 9.347 9.347 0 0 0 1.404-8.18zm-2.349 2.694a6.471 6.471 0 0 1-1.876 4.579 6.327 6.327 0 0 1-4.526 1.896 6.326 6.326 0 0 1-4.524-1.897 6.478 6.478 0 0 1-1.878-4.577 6.56 6.56 0 0 1 1.876-4.579 6.408 6.408 0 0 1 4.526-1.896c1.709 0 3.316.673 4.526 1.896s1.876 2.849 1.876 4.578z" fill="url(#two-friends_svg__e)"></path>
                                                    <path d="M42.891 33.358v1.121h-1.109c-.613 0-1.109.501-1.109 1.121 0 .619.496 1.121 1.109 1.121h1.109v1.121c0 .619.496 1.121 1.109 1.121s1.109-.502 1.109-1.121V36.72h1.109c.613 0 1.109-.501 1.109-1.121 0-.619-.496-1.121-1.109-1.121h-1.109v-1.121c0-.619-.496-1.121-1.109-1.121a1.116 1.116 0 0 0-1.109 1.122z" fill="url(#two-friends_svg__f)"></path>
                                                    <path d="M44.99 16.095c-.839-2.787-2.959-5.034-5.671-6.012a9.09 9.09 0 0 0-8.158 1.03c-2.392 1.622-3.899 4.327-4.033 7.236a9.318 9.318 0 0 0 2.973 7.248 12.467 12.467 0 0 0-6.767 4.229 12.697 12.697 0 0 0-2.866 8.015v2.241c0 1.991 1.604 3.611 3.576 3.611H35.13c.749 0 1.358-.614 1.358-1.37s-.609-1.371-1.358-1.371H24.043a.866.866 0 0 1-.858-.87v-2.241a9.838 9.838 0 0 1 2.853-6.953 9.627 9.627 0 0 1 6.875-2.883h3.34a9.137 9.137 0 0 0 7.332-3.729 9.35 9.35 0 0 0 1.405-8.181zm-2.349 2.695a6.471 6.471 0 0 1-1.876 4.579 6.328 6.328 0 0 1-4.526 1.895 6.329 6.329 0 0 1-4.524-1.896 6.478 6.478 0 0 1-1.878-4.577c0-1.729.667-3.355 1.877-4.579a6.41 6.41 0 0 1 4.525-1.895c1.709 0 3.316.673 4.526 1.895s1.876 2.848 1.876 4.578z" fill="url(#two-friends_svg__g)"></path>
                                                    <path d="M36.239 35.599c0 2.08.818 4.076 2.273 5.547s3.43 2.297 5.488 2.297 4.033-.826 5.488-2.297 2.273-3.467 2.273-5.547-.818-4.076-2.273-5.547-3.43-2.297-5.488-2.297a7.728 7.728 0 0 0-5.485 2.3 7.895 7.895 0 0 0-2.276 5.544zm13.304 0a5.625 5.625 0 0 1-1.624 3.961C46.88 40.612 45.47 41.202 44 41.202s-2.88-.59-3.919-1.642c-1.041-1.051-1.624-2.475-1.624-3.961s.583-2.911 1.624-3.962A5.507 5.507 0 0 1 44 29.995a5.517 5.517 0 0 1 3.918 1.643 5.652 5.652 0 0 1 1.625 3.961z" fill="url(#two-friends_svg__h)"></path>
                                                </g>
                                            </svg>
                                        </i>
                                        <h3>Two or more sign up</h3>
                                        <p>You earn 10 points for each additional verified signup.</p>
                                    </div>
                                    <div class="step">
                                        <i class="icon success">
                                            <svg fill="none" height="58" width="50" xmlns="http://www.w3.org/2000/svg" class="sm">
                                                <linearGradient id="success_svg__a" gradientUnits="userSpaceOnUse" x1="19.87" x2="36.016" y1="19.333" y2="55.847">
                                                    <stop offset="0" stop-color="#8a72f9"></stop>
                                                    <stop offset="0.635" stop-color="#e24fd9"></stop>
                                                    <stop offset="1" stop-color="#e24fd9" stop-opacity="0"></stop>
                                                </linearGradient>
                                                <linearGradient id="success_svg__b" gradientUnits="userSpaceOnUse" x1="35.609" x2="16.532" y1="46.594" y2="17.063">
                                                    <stop offset="0.254" stop-color="#061347"></stop>
                                                    <stop offset="1" stop-color="#2a47b5"></stop>
                                                </linearGradient>
                                                <linearGradient id="success_svg__c" gradientUnits="userSpaceOnUse" x1="24.167" x2="24.167" y1="20.407" y2="31.148">
                                                    <stop offset="0" stop-color="#e24fd9"></stop>
                                                    <stop offset="1" stop-color="#8a72f9"></stop>
                                                </linearGradient>
                                                <path d="M13.963 19.333h35.444V53a5 5 0 0 1-5 5H18.963a5 5 0 0 1-5-5z" fill="url(#success_svg__a)" opacity="0.2"></path>
                                                <path d="M38.091 6.286v34.736H9.167V6.285H3.356V41.02c0 3.166 2.6 5.814 5.813 5.814h28.97c3.167 0 5.814-2.6 5.814-5.814l-.002-34.735zm-8.649 0v-2.93A2.865 2.865 0 0 0 26.56.473h-5.813a2.865 2.865 0 0 0-2.884 2.883V6.24l-5.811-.002v5.813h23.157V6.286zm-2.93 0h-5.766v-2.93h5.813v2.93z" fill="url(#success_svg__b)"></path>
                                                <path d="m16.111 25.778 4.94 5.37 11.171-10.74" stroke="url(#success_svg__c)" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                                            </svg>
                                        </i>
                                        <h3>Redeem Rewards</h3>
                                        <p>Refer 2 or more friends and get full access to the marketplace!</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--product">
            <div class="container-fluid section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center mt-2 mb-1">
                                    <h3>Your referrals</h3>
                                </div>
                            </div>

                            <div class="row mt-1 mb-3">
                                <label for="referralsTable" class="text">See who you have referred and whether they have completed the process.</label>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>


    </section>
@endsection

