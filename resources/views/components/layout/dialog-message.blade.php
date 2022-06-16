<div class="dialog" id="dialog">
    <div class="dialog__container">
        <button class="dialog__close" onclick="closeDialog()">
            <i class="fa fa-times fa-lg"></i>
        </button>
        <div class="dialog__icon dialog__icon">
            @if ($status == 'success')
                <i class="fas fa-check-circle fa-5x"></i>
            @elseif ($status == 'info')
                <i class="fas fa-info-circle fa-5x"></i>
            @else
                <i class="fa fa-times fa-5x"></i>
            @endif
        </div>
        <div class="dialog__message">
            <p>
                {{ $message }}
            </p>
        </div>
    </div>
</div>

<script type="application/javascript">
    const dialog = document.querySelector('#dialog');

    document.addEventListener('DOMContentLoaded', () => {
        dialog.classList.add('active');
    });

    const closeDialog = () => {
        dialog.classList.remove('active');

        setTimeout(() => {
            dialog.style.display = 'none';
        }, 500);

    }
</script>
