<div class="row py-3">
        <div class="div col-3">
            <a href="?"><img src="/assets/logo.png" alt=""></a>
        </div>
        <div class="col-9">
            <div class="dropdown float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i> ({{ Cart::count() }} Item)
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/shoppingCart">Lihat <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>