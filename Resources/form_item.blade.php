@php
/* ตัวอย่างการใช้งาน
#text
@include('components.forms.form_item', [
    'type' => 'text', 'label' => 'ทดสอบ', 'showLabel'=>true, 'inline'=>false, 'id' => '', 'name' => 'testName', 'formGroup'=>true,
    'value' => '', 'class' => '', 'icon' => '', 'col' => 'col-lg-6','required' => true,
    'attr' => [],
    'option' => []
])

# signature แสกนไลน์นิ้วมือ
@include('components.forms.form_item', [
    'type' => 'signature', 'label' => 'ทดสอบ', 'showLabel'=>true, 'inline'=>false, 'id' => '', 'name' => 'testName', 'formGroup'=>true,
    'value' => '', 'class' => '', 'icon' => '', 'col' => 'col-lg-6','required' => true,
    'attr' => [], 'option' => [] , 'width'=>'', 'height'=>'', timestamp="top|bottom|left|right"
])

#select
@include('components.forms.form_item', [
    'type' => 'select', 'label' => 'ประเภทลูกค้า', 'showLabel'=>true, 'inline'=>false, 'id' => 'customerType', 'name' => 'customerType', 'formGroup'=>true,
    'value' => Request::get('customerType'), 'class' => '', 'icon' => '', 'col' => 'col-lg-4','required' => false,
    'attr' => [],
    'option' => $customerTypes->mapWithOptions(function($item,$index) {
        return [$item->LookupName => $item->LookupID];
    })->all()
])

*/

// ประเภทที่สามารถใช้งานได้
// hidden, text, number, email, password, date, month, time,rangedate file, textarea, editor, checkbox, radio, select, signature ,
    $type = $type ?? '';
    $id = $id ?? \Illuminate\Support\Str::random(5);
    $name = $name ?? '';
    $formGroup = $formGroup ?? true;
    $value = $value ?? '';
    $label = $label ?? '';
    $showLabel = $showLabel ?? true;
    $attr = isset($attr) && is_array($attr) ? $attr : [];
    $class = $class ?? '';
    $icon = $icon ?? '';
    $inline = $inline ?? false;
    $col = $col ?? 'col-lg-12';
    $select2 = $select2 ?? true;
    $icheck = $icheck ?? true;
    $required = $required ?? false;
    $option = isset($option) && is_array($option) ? $option : '';

    // signature only
    $width = $width ?? '';
    $height = $height ?? '';
    $timestamp = $timestamp ?? 'bottom';
    if(!in_array($timestamp,['top','bottom','left','right'])){
        $timestamp = 'bottom';
    }

    $attr_text = '';
    foreach ($attr as $key => $val) {
        if($val !== false){
            $attr_text .= $key.'="'.$val.'" ';
        }
    }
@endphp

@switch($type)
    @case('hidden')
        <input type="hidden" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
        @break
    @case('text')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="text" class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('number')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="number" class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('email')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="email" class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('password')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="password" class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('date')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="text" autocomplete="off" class="form-control {{ $inline ? "form-control-inline" : "" }} datepicker {{ $class ?? '' }}"  id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('month')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="text" autocomplete="off" class="form-control {{ $inline ? "form-control-inline" : "" }} monthpicker {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('datetime')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="text" autocomplete="off" class="form-control {{ $inline ? "form-control-inline" : "" }} datetimepicker {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('rangedate')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="text" autocomplete="off" class="form-control {{ $inline ? "form-control-inline" : "" }} daterangepicker {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('time')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="text" autocomplete="off" class="form-control {{ $inline ? "form-control-inline" : "" }} timepicker {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('file')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <input type="file" class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('textarea')
        <div class="{{ $col }}">
            <div class="form-group-textarea {{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <textarea class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!}  rows="3" {{ $required ? 'required' : '' }} style="resize:none">{!! $value ?? '' !!}</textarea>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break
    @case('editor')
        <div class="{{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <textarea class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" placeholder="{{ $label ?? '' }}" {!! $attr_text !!}  rows="3" {{ $required ? 'required' : '' }} style="resize:none;display:none">{!! $value ?? '' !!}</textarea>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
            @if($id)
            <script>
                setTimeout(() => {
                    CKEDITOR.replace( '{{ $id }}',{
                        toolbar: $('#{{ $id }}').attr('toolbar') ? $('#{{ $id }}').attr('toolbar') : "Full"
                    });
                }, 600);
            </script>
            @endif
        </div>
        @break
    @case('checkbox')
        <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
            <label class="control-label {{ $label ? 'mr-2' : '' }} {{$col ?? ''}}">
            {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
              <input type="checkbox" class="{{ $icheck ? 'minimal' : ''}} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
              {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}
            </label>
            @if ($errors->has($name))
                <span class="help-block">
                    {{ $errors->first($name) }}
                </span>
            @endif
        </div>
        @break
    @case('radio')
        <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
            @if($showLabel)
            <label> {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!} {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }} :</label>
            @endif
            @foreach ($option as $key=>$val)
            <label class="control-label label-radio mr-2 {{$col ?? ''}} {{$formGroup ? 'd-block' : ''}}">
              <input type="radio" class="{{ $icheck ? 'minimal' : ''}} {{ $class ?? '' }}" id="{{ $id.$val }}" name="{{ $name ?? '' }}" {{ $val == $value ? 'checked' : '' }} value="{{ $val ?? '' }}" {!! $attr_text !!} {{ $required ? 'required' : '' }}>
              {{ preg_replace('/<!--(.*)--!>/','',$key ?? '') }}
            </label>
            @endforeach
            @if ($errors->has($name))
                <span class="help-block">
                    {{ $errors->first($name) }}
                </span>
            @endif
        </div>
        @break
    @case('select')
        <div class="{{ $col }}">
           <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                @php
                    $valueArr = is_array($value) ? $value : [$value];
                @endphp
                <select class="form-control {{ $inline ? "form-control-inline" : "" }} {{ ($select2 == true && count($option) > 10) ? 'select2' : ''}} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" {!! $attr_text !!} data-name="{{ $name ?? '' }}" data-value="{{ is_array($value) ? "[".implode(",",$value)."]" : $value }}" {{ $required ? 'required' : '' }}>
                <option value="" {{ in_array("",$valueArr) ? "selected" : "" }}>-- {{ is_array($value) ? "ทุก" : "" }}{{ $label ?? '' }} --</option>
                @foreach ($option as $key=>$val)
                    @if(is_array($val))
                        @php
                            $data_txt = '';
                            foreach ($val as $key_key => $val_val) {
                                if($key_key != 'value'){
                                    $data_txt .= $key_key.'="'.$val_val.'" ';
                                }
                            }
                        @endphp
                        <option value="{{ $val['value'] }}" {{ in_array($val['value'],$valueArr) ? 'selected' : ''  }} {!! $data_txt !!}>{{ preg_replace('/<!--(.*)--!>/','',$key) }}</option>
                    @else
                    <option value="{{ $val }}" {{ in_array($val,$valueArr) ? 'selected' : ''  }}>{{ preg_replace('/<!--(.*)--!>/','',$key) }}</option>
                    @endif

                @endforeach
                </select>
                @if($icon)
                    <label for="{{ $id }}" class="mb-0 input-group-append">
                        <i class="{{ $icon }}"></i>
                    </label>
                @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
            <!-- /.form-group -->
        </div>
        @break
    @case('signature')
        <div class="signature-pad-set {{ $col }}">
            <div class="{{$formGroup ? 'form-group' : ''}} {{ $errors->has($name) ? ' has-error' : '' }}">
                @if($showLabel && $inline == false)
                <label for="{{ $id }}" class="control-label">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                {!!  $icon || $inline ? '<div class="input-group input-group-inline">' : '' !!}
                @if($showLabel && $inline)
                <label for="{{ $id }}" class="input-group-append form-item-inline">
                    {!! $errors->has($name) ? '<i class="bi bi-exclamation-circle"></i>' : '' !!}
                    {!! $required ? '<span class="text-danger required-text">*</span>' : '' !!}{{ $label ?? '' }}:
                </label>
                @endif
                <textarea class="form-control {{ $inline ? "form-control-inline" : "" }} {{ $class ?? '' }}" id="{{ $id }}" name="{{ $name ?? '' }}" placeholder="{{ $label ?? '' }}" rows="3" {!! $attr_text !!} {{ $required ? 'required' : '' }} style="resize:none; {{ $required ? 'display: block;height: 0px;opacity: 0;padding: 0px;' : 'display: none;' }}">{!! $value ?? '' !!}</textarea>
                <div class="signature-pad-main" style="{{ $width ? "width:{$width};" : "" }}">
                    <div class="signature-pad-box" style="{{ $width ? "width:{$width};" : "" }}{{ $height ? "height:{$height};" : "" }}">
                        <canvas class="signature-pad-canvase"
                            data-ref="{{ $id }}"
                            data-timestamp="{{ $timestamp }}">
                        </canvas>
                    </div>
                    <button type="button" class="signature-pad-clear btn btn-sm btn-default btn-block" data-ref="{{ $id }}"> <i class="bi bi-eraser" aria-hidden="true"></i> ลบเขียนใหม่</button>
                </div>
                    @if($icon)
                        <label for="{{ $id }}" class="mb-0 input-group-append">
                            <div class="input-group-text">
                                <i class="{{ $icon }}"></i>
                            </div>
                        </label>
                    @endif
                {!!  $icon || $inline ? '</div>' : '' !!}
                @if ($errors->has($name))
                    <span class="help-block">
                        {{ $errors->first($name) }}
                    </span>
                @endif
            </div>
        </div>
        @break

    @default

@endswitch

