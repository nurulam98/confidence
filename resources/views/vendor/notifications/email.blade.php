@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
    @if ($level === 'error')
    # @lang('Whoops!')
    @else
        @if ($actionText == "Reset Password")
            # @lang('Reset Password')
        @else
            # @lang('Verifikasi Email')
        @endif
    @endif
@endif

{{-- Intro Lines --}}
{{-- @foreach ($introLines as $line)
{{ $line }}

@endforeach --}}

@if ($actionText == "Reset Password")
            @lang("Silahkan membuat kata sandi baru dengan mengklik tautan dibawah ini")
        @else
            @lang("Silahkan verifikasi email anda melalui tautan dibawah\n untuk dapat login ke sistem")
        @endif
{{-- @lang(
    "Silahkan verifikasi email anda melalui tautan dibawah\n untuk dapat login ke sistem"
) --}}

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
{{-- @foreach ($outroLines as $line)
{{ $line }}

@endforeach --}}
@lang(
    "Jika anda tidak mendaftar, abaikan pesan ini\n"
)

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Terima Kasih'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Jika terdapat masalah dalam mengklik tombol \":actionText\", copy dan paste UTL dibawah ini\n".
    'ke browser anda:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
