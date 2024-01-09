{{R3M}}
<section name="main">
    <div class="logo">
        <a href="https://www.r3m.io/" title="https://www.r3m.io"><img src="{{host.url()}}Icon/android-chrome-192x192.png" alt="R3M Logo"></a>
    </div>
    <h1><a href="https://www.r3m.io/" title="https://www.r3m.io/"><strong>{{literal}}{{</strong>R3M<strong>}}{{/literal}}</strong></a></h1>
    <h3>Debug</h3>
    {{if(config('framework.environment') === 'development')}}
    {{d(data())}}
    {{/if}}
</section>

