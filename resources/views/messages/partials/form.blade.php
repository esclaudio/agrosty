<div class="form-group">
    <label for="name">{{ __('Nombre') }}</label>
    <input type="text" id="fromName" name="fromName" class="form-control @error('fromName') is-invalid @enderror" value="{{ old('fromName', $message->fromName) }}" autofocus>
    @error('fromName')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">{{ __('Email') }}</label>
    <input type="email" id="fromEmail" name="fromEmail" class="form-control @error('fromEmail') is-invalid @enderror" value="{{ old('fromEmail', $message->fromEmail) }}" autofocus>
    @error('fromEmail')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">{{ __('Asunto') }}</label>
    <select id="subjectId" name="subjectId" class="custom-select" required>
        <option value=""></option>
        @foreach($subjects as $k => $v)
            <option value="{{ $k }}">
                {{ $v }}
            </option>
        @endforeach
    </select>
    @error('subjectId')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="body">{{ __('Mensaje') }}</label>
    <textarea id="body" name="body" class="form-control" rows="4" required>{{ old('body', $message->body) }}</textarea>
</div>
