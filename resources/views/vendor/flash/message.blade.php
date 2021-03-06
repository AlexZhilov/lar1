@if(session()->has('flash_notification'))

    <div class="container">
        <div class="row">
            <div class="col-12">

                @foreach (session('flash_notification', collect())->toArray() as $message)
                    @if ($message['overlay'])
                        @include('flash::modal', [
                            'modalClass' => 'flash-modal',
                            'title'      => $message['title'],
                            'body'       => $message['message']
                        ])
                    @else
                        <div class="alert
                    alert-{{ $message['level'] }}
                        {{ $message['important'] ? 'alert-important' : '' }}"
                             role="alert"
                        >
                            @if ($message['important'])
                                <button type="button"
                                        class="close"
                                        data-dismiss="alert"
                                        aria-hidden="true"
                                >&times;
                                </button>
                            @endif

                            {!! $message['message'] !!}
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    {{ session()->forget('flash_notification') }}

    @push('script')
        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>
    @endpush

@endif