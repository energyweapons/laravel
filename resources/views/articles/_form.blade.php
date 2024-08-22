<div class="mb-3">
    {{ html()->label('เรื่อง', 'title')->class('form-label') }}
    {{ html()->text('title')->id('title')
        ->class('form-control ' . ($errors->has('title') ? 'is-invalid' : ''))
        ->placeholder('กรอกชื่อเรื่อง')
        ->maxlength(250)
        ->required() }}
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    {{ html()->textarea('body')->id('body')
        ->class('form-control ' . ($errors->has('body') ? 'is-invalid' : ''))
        ->placeholder('เขียนบทความใหม่')
        ->maxlength(5000)
        ->rows(8)
        ->required() }}
    @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('Tags', 'tags')->class('form-label') }}
    {{ html()->select('tags', $tags)->id('tags')
        ->class('form-control ' . ($errors->has('tags') ? 'is-invalid' : ''))
        ->placeholder('select tag')
        ->multiple()
        ->required() }}
    @error('tags')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('เผยแพร่', 'published_at')->class('form-label') }}
    {{ html()->date('published_at', now()->format('Y-m-d'))->id('published_at')
        ->class('form-control ' . ($errors->has('published_at') ? 'is-invalid' : ''))
        ->placeholder('กรอกชื่อเรื่อง')
        ->required() }}
    @error('published_at')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
