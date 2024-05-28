<?php

use App\Core\Authentication;


(new Authentication)->logout();


redirect("/broodjes_app/");
