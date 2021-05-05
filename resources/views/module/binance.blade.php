@if(\Illuminate\Support\Facades\App::getLocale() == 'ua')
    <div class="row" style="padding-left: 50px; margin-bottom: 25px">
        <a href="https://www.binance.com/uk-UA/register?ref=36104746" target="_blank">
            <img width="300" height="300" src="/binance.jpeg" >
        </a>
    </div>
@elseif(\Illuminate\Support\Facades\App::getLocale() == 'ru')
    <div class="row" style="padding-left: 50px; margin-bottom: 25px">
        <a href="https://www.binance.com/uk-UA/register?ref=36104746" target="_blank">
            <img width="300" height="300" src="/binance_ru.jpeg" >
        </a>
    </div>
@endif