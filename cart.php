


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
</div>


<!--    <div class="totals-item totals-item-total">-->
<!--        <label>Do zapłaty:</label>-->
<!--        <div class="totals-value" id="cart-subtotal"></div>-->
<!--    </div>-->
