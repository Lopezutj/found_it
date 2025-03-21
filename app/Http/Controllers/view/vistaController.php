<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class vistaController extends Controller
{
    //
    public function __invoke(){
        return view('auth.login');
    }

    public function vistaregisterUser(){
        return view('auth.register');
    }

    public function vistaDashborad(){
        return view('dashboard.dashboard');
    }

    public function vista_Gestion(){
        return view('inventory.gestion_embarques');
    }

    public function edit_inventario(){
        return view('inventory.inventory_edit');
    }

    public function surtir_Material(){
        return view('inventory.part_with_material');

    }

    public function salida_material(){
        return view('inventory.pull_out_material');
    }

    public function registrar_material(){
        return view('inventory.register_form');
    }

    public function registrar_localidad(){
        return view('inventory.register_location');
    }

    public function inventario_stock(){
        return view('inventory.stock_view');
    }

    public function registrar_ubicacion(){
        return view('inventory.register_location');
    }



// Nuevo método para la vista de perfil de usuario
public function userProfile(){
    return view('profile.user');
}



//Vistas de modulo producto
public function criticalProducts(){
    return view('products.critical_products');
}

public function totalProducts(){
    return view('products.total_products');
}

public function expensiveproducts(){
    return view('products.expensive_products');
}


//vistas de modulo de workers
public function workers(){
    $users=User::all();
    return view('workers.workers', compact('users'));
}

public function registerworkers(){
    return view('workers.register_workers');
}

public function editworkers(){
    return view('workers.edit_workers');
}

public function reports(){
    return view('reporte.reports');
}

}
