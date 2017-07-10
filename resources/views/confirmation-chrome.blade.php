@extends('template')

@section('content')
    <section class="page-title bottom-divider text-center">
        <div class="container">
            <div class="page-title__holder big">
                <div class="page-title__inner">
                    <div class="page-title__holder">
                        <h1 class="page-title__title">Well done!</h1>
                        <br /><br />
                        <p class="page-title__subtitle lead">
                            Thank you for confirming your email address.<br />
                            <strong>Click the {{ env('APP_NAME') }} extension button to finish the validation process.</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function submitForm() {
            document.bookmarklet.submit();
        }
    </script>
@endsection