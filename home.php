<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="homecss.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="navbar">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">



        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a name="" id="" class="btn btn-primary" href="logout.php" role="button">wyloguj</a>

        </form>
    </div>
</nav>


<!--Koszyk-->


<div class="container" id="cart">
    <div>
        <div class="col-md-12">
            <h2 id="header">Twoje Zakupy</h2>
        </div>

        <div class="col-md-12">
            <table class="table text-center table-bordered" id="shopCart">
                <thead>
                    <tr>
                        <td class="product-image">Zdjęcie</td>
                        <td class="product-details">Nazwa</td>
                        <td class="product-price">Cena w zł</td>
                        <td class="product-quantity">ilość</td>
                        <td class="product-line-price">Total</td>
                        <td class="product-removal"></td>
                    </tr>
                </thead>


                <tr class="product">
                    <td width=""><img src="https://aero7.pl/public/products/197_1346405997wentylator-osiowy-PREM-I-AIR-PDF1215CR.png" height="60"></td>
                    <td style="vertical-align: middle">Wentylator</td>
                    <td class="product-price" style="vertical-align: middle">99,99</td>
                    <td class="product-quantity" style="vertical-align: middle" width="60"><input type="number" value="0" min="0"></td>
                    <td class="product-line-price"></td>
                    <td class="remove-product">
                        <button type="button" class="btn btn-danger">usuń</button>
                    </td>
                </tr>


                <tr class="product">
                    <td width="80"><img src="http://market.ice.pl/environment/cache/images/0_0_productGfx_6d4e00474aca662ae8ac0b17d19563cb.jpg" height="60"></td>
                    <td style="vertical-align: middle">Worek z lodem</td>
                    <td class="product-price" style="vertical-align: middle">10</td>
                    <td class="product-quantity" style="vertical-align: middle" width="60"><input type="number" value="0" min="0"></td>
                    <td class="product-line-price"></td>
                    <td class="remove-product">
                        <button type="button" class="btn btn-danger">usuń</button>
                    </td>
                </tr>

                <tr class="product">
                    <td width="80"><img src="https://pbs.twimg.com/profile_images/1607101060/coca-cola-bottle.jpg" height="60"></td>
                    <td style="vertical-align: middle">Butelka Coli</td>
                    <td class="product-price" style="vertical-align: middle">1,99</td>
                    <td class="product-quantity" style="vertical-align: middle" width="60"><input type="number" value="0" min="0"></td>
                    <td class="product-line-price"></td>
                    <td class="remove-product">
                        <button type="button" class="btn btn-danger">usuń</button>
                    </td>
                </tr>

                <tr class="product">
                    <td width="80"><img src="https://image.ceneo.pl/data/products/44971146/i-bestway-basen-ogrodowy-rozporowy-457x87cm-57313.jpg" height="60"></td>
                    <td style="vertical-align: middle">Basen ogrodowy</td>
                    <td class="product-price" style="vertical-align: middle">769,99</td>
                    <td class="product-quantity" style="vertical-align: middle" width="60"><input type="number" value="0" min="0"></td>
                    <td class="product-line-price"></td>
                    <td class="remove-product">
                        <button type="button" class="btn btn-danger">usuń</button>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>

<!-- podsumowanie cen koszyka-->


<div class="totals container" id="sumup">

    <div class="totals-item">
        <label>Wysyłka: gratis</label>
        <div class="totals-value" id="cart-shipping"></div>
    </div>


    <div class="totals-item totals-item-total">
       <span>ŁĄCZNA KWOTA:</span>
       <span class="totals-value" id="cart-subtotal"></span>
    </div>


<!--    <div class="totals-item totals-item-total">-->
<!--        <label>Do zapłaty:</label>-->
<!--        <div class="totals-value" id="cart-subtotal"></div>-->
<!--    </div>-->

</div>


<!-- zamawiam/pytam -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kontakt" id="przycisk">
    Kontakt z nami
</button>

<!-- Modal -->
<div class="modal fade" id="kontakt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModal">Kontakt z Nami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="container">
                    <form id="contact-form" method="get" novalidate="novalidate" action="#">
                        <fieldset>
                            <legend>Formularz kontaktowy</legend>
                            <p>
                                <label for="cname">Imię</label>
                                <input id="cname" name="name" align="center" class="form-control" >
                            </p>
                            <p>
                                <label for="clastname">Nazwisko</label>
                                <input id="clastname" name="lastname" align="center" class="form-control">
                            </p>

                            <p>
                                <label for="cemail">E-Mail</label>
                                <input id="cemail" name="cemail" align="center" class="form-control">
                            </p>

                            <div class="form-group">
                                <label for="message">Wiadomość</label>
                                <textarea class="form-control" id="message" rows="3" class="form-control"
                                ></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                <button type="submit" class="btn btn-primary" id="submit">Wyślij</button>
                            </div>

                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- formularz-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="validation.js"></script>
<script type="text/javascript">


    $(function () {

        function recalculateCart() {
            $(document).find('.product-quantity input').each(function () {
                calculateRow($(this));
            });

            var subtotal = 0;
            $(".product").each(function () {
                var subprice = parseFloat($(this).find(".product-line-price").html().replace(',', '.'));
                if (subprice > 0) subtotal += subprice;
            });
            $('#cart-subtotal').html(subtotal);
        }

        function calculateRow(inputQuantity) {
            var productRow = inputQuantity.parents('tr');
            var price = parseFloat(productRow.find('.product-price').html().replace(',', '.'));
            var quantity = parseFloat(inputQuantity.val());
            var result = price * quantity;
            productRow.find('.product-line-price').html(result.toString().replace('.', ','));
        }

        $(document).on('change keyup', '.product-quantity input', function () {
            calculateRow($(this));
            recalculateCart();
        });

        recalculateCart();
    });


</script>
</body>
</html>