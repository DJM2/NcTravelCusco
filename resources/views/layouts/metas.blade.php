<meta name="keywords" content="{{ $tour->keywords}}"/>
<meta name="description" content="{{$tour->descripcion}}">
<link rel="canonical" href="{{ request()->fullUrl() }}" />

<meta property="og:image" content="{{ asset('img/buscador/' . $tour->img)  }}"/>
<meta property="og:image:secure_url" content="{{ asset('img/buscador/' . $tour->img)  }}"/>

<meta property="og:title" content="{{ $tour->nombre }}"/>
<meta property="og:description" content="{{ $tour->descripcion}}"/>
<meta property="og:locale" content="es" />
<meta property="og:url" content="{{ request()->fullUrl() }}"/>
<meta name="twitter:card" content="summary"/>
<meta name="robots" content="index,follow" />
