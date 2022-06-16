<section class="investments">
    @foreach ($contents as $item)
        {!! App::currentLocale() == 'es' ? $item->content : $item->content_translated !!}
    @endforeach
</section>

<script type="text/javascript">
    const invests = document.querySelectorAll('.invest__heading');

    invests.forEach((invest) => {
        invest.addEventListener('click', () => {
            invest.parentElement.classList.toggle('active')

            if (invest.parentElement.classList.contains('active')) {
                invest.innerHTML = invest.innerHTML.replace('plus', 'minus')
            } else {
                invest.innerHTML = invest.innerHTML.replace('minus', 'plus')
            }
        });
    });
</script>
