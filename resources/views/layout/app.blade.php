<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #toastBox {
            position: absolute;
            bottom: 30px;
            right: 30px;
            display: flex;
            align-items: flex-end;
            flex-direction: column;
            overflow: hidden;
            padding: 20px;
        }

        .toast {
            background: #fff;
            width: 400px;
            height: 80px;
            font-weight: 500;
            margin: 15px 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    {{-- <header>This is a header</header> --}}
    <section style="margin-top: 50px">
        @yield('content')
    </section>
    <footer class="page-footer fixed-bottom font-small bg-dark pt-5" style="color: white; text-align: center;">
        <p>Please Refer README.md file for the User Guide</p>
    </footer>
    <div id="toastBox" style="display: none">
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
            <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-delay="3000" id="toastMessage">
                <div class="d-flex">
                    <div class="toast-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="module">
    $(document).ready(function () {
        var toastEl = document.getElementById('toastMessage');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }

        $("#viewEdit").click(function () {
            let $original = $('#viewEdit');
            $('#cardName').removeAttr('readonly');
            $('#tags').removeAttr('readonly');
            $('#description').removeAttr('readonly');
            $('#checkDefault').removeAttr('disabled');
            let $button = $('<button>', {
                text: 'Save',
                id: 'viewSave',
                class: 'btn btn-primary',
                type: 'button'
            });

            $original.replaceWith($button);
            $button.on('click', function () {
                let cardId = $('#cardId').val();
                let cardName = $('#cardName').val();
                let tags = $('#tags').val();
                let description = $('#description').val();
                let isHighlight = 0;
                if ($('#checkDefault').is(':checked')) {
                    isHighlight = 1;
                }
                $.ajax({
                    url: '{{ route("ajax.submit") }}', // Laravel route
                    type: 'POST',
                    data: {
                        id: cardId,
                        cardName: cardName,
                        tags: tags,
                        description: description,
                        isHighlight: isHighlight,
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function (response) {
                        // alert(response.message);
                        setTimeout(() => {
                            window.location.href = '/';
                        }, "500");
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });

            });

        });

        $("#viewDelete").click(function () {
            let cardId = $('#cardId').val();
            if (cardId !== undefined) {
                $.ajax({
                    url: '{{ route("ajax.delete") }}', // Laravel route
                    type: 'POST',
                    data: {
                        id: cardId,
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function (response) {
                        $(".toast-body").html("Card deleted successfully.");
                        $("#toastBox").show();
                        setTimeout(() => {
                            window.location.href = '/';
                        }, "3000");
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }

        });

    });
</script>

</html>