@if($message = Session::get('success'))
<div
    class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700"
    role="alert"><strong>{{$message}}</strong>
</div>
@endif

@if($message = Session::get('danger'))
<div
  class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700"
  role="alert">Erro! <strong>{{$message}}</strong>
</div>
@endif

@if($message = Session::get('warning'))
<div
  class="mb-4 rounded-lg bg-warning-100 px-6 py-5 text-base text-warning-700"
  role="alert">Atenção! <strong>{{$message}}</strong>
</div>
@endif

@if($message = Session::get('info'))
<div
  class="mb-4 rounded-lg bg-info-100 px-6 py-5 text-base text-info-700"
  role="alert">Informação! <strong>{{$message}}</strong>
</div>
@endif

@if($errors->any())
<div
  class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700"
  role="alert">Erro!
  @if ($errors->any())
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
@endif
</div>
@endif