<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiket</title>
    <!-- font icons -->
    <link rel="stylesheet" href="/assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="/assets/css/steller.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="/assets/imgs/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="components.html">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="- btn btn-primary rounded ml-4" href="components.html">Contac Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of page navibation -->

    <!-- Page Header -->
    <header class="header" id="home">
        <div class="container">
            <div class="infos">
                <h6 class="subtitle">Grab Your Ticket</h6>
                <h6 class="title">NOW!!!</h6>


                <div class="socials mt-4">

                </div>
            </div>
            <div class="img-holder">
                <img src="/assets/imgs/concert.png" alt="" />
            </div>
        </div>
    </header>
    <!-- End of Page Header -->

    <!-- About section -->
    <section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="sub text-center">
                <h6 class="subtitle"></h6>
                <h6 class="section-title mb-4">Ticket</h6>
                <p class="mb-5 pb-4">
                </p>
            </div>
            <form method="POST" action="/data/send" class="mb-5">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label>No KTP / ID Number</label>
                    <input type="text" name="id_number" class="form-control" placeholder="ID Number">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tgl Lahir</label>
                        <input type="date" name="ttl" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">No HP</label>
                        <input type="text" name="no_hp" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Ticket ticket</label>
                        <select id="tiket" class="form-control" name="tiket">
                            <option value="">Nama Tiket</option>
                            @foreach ($tickets as $ticket)
                                <option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>
        </div>
    </section>

    <section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="sub text-center">
                <h6 class="subtitle"></h6>
                @if (isset($data))
                    <h6 class="section-title mb-4">Kode Booking : {{ $data }}</h6>
                @else
                @endif

                <p class="mb-5 pb-4">
                </p>
            </div>

        </div>
    </section>



    <!-- Page Footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </footer>
    <!-- End of page footer -->

    <!-- core  -->
    <script src="/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
    <script src="/assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- steller js -->
    <script src="/assets/js/steller.js"></script>

    <script>
        $('#tiket').change(function() {
            var id = $(this).val();
            var url = '{{ route('getDetails', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#price').val(response.price);
                    }
                    if (response.qty == 0 || response.qty == null) {
                        document.getElementById("submit").disabled = true;
                    } else {
                        document.getElementById("submit").disabled = false;
                    }
                }
            });
        });
    </script>

</body>

</html>
