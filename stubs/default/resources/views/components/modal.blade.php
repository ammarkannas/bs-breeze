@props(['header' => false, 'title' => false, 'footer' => false])

<div {{ $attributes->merge(['class' => 'modal fade', 'tabindex' => '-1', 'aria-hidden' => 'true']) }}>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            @if($header || $title)
                <div class="modal-header">
                    @if($title)
                        <h1 class="modal-title fs-5">
                            {{ $title }}
                        </h1>
                    @else
                        {{ $header }}
                    @endif

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
