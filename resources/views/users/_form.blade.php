<div class="mb-3">
    {{ html()->label('ชื่อ-นามสกุล', 'name')->class('form-label') }}
    {{ html()->text('name')->id('name')
        ->class('form-control ' . ($errors->has('name') ? 'is-invalid' : ''))
        ->placeholder('กรอกชื่อ-นามสกุล')
        ->maxlength(250)
        ->required() }}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('อีเมล', 'email')->class('form-label') }}
    {{ html()->email('email')->id('email')
        ->class('form-control ' . ($errors->has('email') ? 'is-invalid' : ''))
        ->placeholder('กรอกอีเมล')
        ->maxlength(250)
        ->required() }}
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('รหัสผ่าน', 'password')->class('form-label') }}
    {{ html()->password('password')->id('password')
        ->class('form-control ' . ($errors->has('password') ? 'is-invalid' : ''))
        ->placeholder('กรอกรหัสผ่าน')
        ->maxlength(30)
        ->required(!$isEdit) }}
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('ยืนยันรหัสผ่าน', 'password_confirmation')->class('form-label') }}
    {{ html()->password('password_confirmation')->id('password_confirmation')
        ->class('form-control ' . ($errors->has('password_confirmation') ? 'is-invalid' : ''))
        ->placeholder('กรอกรหัสผ่านอีกครั้ง')
        ->maxlength(30)
        ->required(!$isEdit) }}
    @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
