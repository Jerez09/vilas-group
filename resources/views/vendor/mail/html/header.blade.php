<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Vilas Group')
                <img src="{{ asset('/images/logo.png') }}" class="logo" alt="Vilas Group Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
