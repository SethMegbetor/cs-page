<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Imaginons Digi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div class="container">
        <div class="logo">
            <div class="logoIcon"><img src="{{ asset('assets/image/logo.png') }}" alt="" /></div>
            <p class="logoText">Imaginons Digi!</p>
        </div>
        <div class="heroText">
            <h1>We're Cooking Our Website<span>.</span></h1>
            <h3 class="ht2">We are launching soon. Signup and</h3>
            <h3 class="ht3">Get Notified</h3>
        </div>
        <div class="form">
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <input name="email" class="email" type="email" placeholder="Email" />
                <input class="button" type="submit" value="Notify Me" />
            </form>
        </div>
        <footer>
            <p>Copyright &copy; <span class="ftBold">Imaginons Digi! </span> 2022</p>
        </footer>
    </div>

    {{-- javascripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.all.min.js"></script>
    @if (session()->has('message'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            let type = "{{ Session::get('status', 'success') }}";
            switch (type) {
                case 'info':
                    Toast.fire({
                        icon: 'info',
                        title: "{{ Session::get('message') }}"
                    })
                    break;
                case 'success':
                    Toast.fire({
                        icon: 'success',
                        title: "{{ Session::get('message') }}"
                    })
                    break;
                case 'error':
                    Toast.fire({
                        icon: 'error',
                        title: "{{ Session::get('message') }}"
                    })
                    break;
                case 'warning':
                    Toast.fire({
                        icon: 'warning',
                        title: "{{ Session::get('message') }}"
                    })
                    break;
            }
        </script>
    @endif
</body>

</html>
