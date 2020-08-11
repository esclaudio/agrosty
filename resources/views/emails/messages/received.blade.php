Cuerpo

--Mensaje original--

Fecha de carga: {{ $m->date->format('d/m/Y') }}

Nombre: {{ $m->fromName }}
Email: {{ $m->fromEmail }}

Asunto: {{ $m->subject->desc }}
Mensaje:
{!! nl2br(e($m->body)) !!}
