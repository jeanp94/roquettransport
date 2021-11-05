<p>Un nuevo lead de código #{{ $lead->id }} ha llegado:</p>

@if($lead->topic)
<p><strong>Asunto:</strong> {{ $lead->topic }}</p>
@endif

@if($lead->lastname)
<p><strong>Apellido, Nombre:</strong> {{ $lead->lastname }}, {{ $lead->name }}</p>
@elseif($lead->name)
<p><strong>Nombre:</strong> {{ $lead->name }}</p>
@endif

@if($lead->phone)
<p><strong>Teléfono:</strong> {{ $lead->phone }}</p>
@endif

@if($lead->email)
<p><strong>Email:</strong> {{ $lead->email }}</p>
@endif

@if($lead->message)
<p><strong>Mensaje:</strong> {{ $lead->message }}</p>
@endif

@if($lead->origin)
<p><strong>Origen:</strong> {{ $lead->origin }}</p>
@endif

@if($lead->destination)
<p><strong>Destino:</strong> {{ $lead->destination }}</p>
@endif

@if($lead->weight)
<p><strong>Peso aprox:</strong> {{ $lead->weight }} kg.</p>
@endif

@if($lead->page)
<p><strong>Página:</strong> {{ $lead->page }}</p>
@endif

Saludos, <br>
{{ config('app.name') }}
